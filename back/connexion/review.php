<?php
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
$conn->close();