<?php/*
// Assuming you have a database connection established

// Get the form data
$rating = $_POST['rating'];
$review = $_POST['review'];
$enclosureId = $_POST['enclosureId'];

// Insert the review into the database
$sql = "INSERT INTO reviews (rating, review, enclosure_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isi", $rating, $review, $enclosureId);

if ($stmt->execute()) {
    // Review added successfully
    header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?success=true");
    exit();
} else {
    // Error adding review
    header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?error=true");
    exit();
}

$stmt->close();
$conn->close(); */






// Assuming you have a database connection established

// Get the form data
$rating = $_POST['rating'];
$review = $_POST['review'];
$enclosureId = $_POST['enclosureId'];

// Validate and sanitize data (optional)
// ...

// Insert the review into the database
$sql = "INSERT INTO reviews (rating, review, enclosure_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) { // Check if the statement is prepared successfully
    $stmt->bind_param("isi", $rating, $review, $enclosureId);

    if ($stmt->execute()) {
        // Review added successfully
        header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?success=true");
        exit();
    } else {
        // Error adding review
        $error_message = $stmt->error; // Get the specific error message
        error_log("Error adding review: $error_message", 0); // Log the error
        header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?error=true&message=" . urlencode($error_message)); // Pass the error message in the URL
        exit();
    }
} else {
    // Error preparing the statement
    $error_message = $conn->error;
    error_log("Error preparing statement: $error_message", 0); // Log the error
    header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?error=true&message=" . urlencode($error_message)); // Pass the error message in the URL
    exit();
}

$stmt->close();
$conn->close();