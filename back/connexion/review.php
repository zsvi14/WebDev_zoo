<?php
    if ($stmt->execute()) {
        // Review added successfully
        header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?success=true");
        exit();
      } else {
        // Error adding review
        header("Location: ../../front/HTML/Enclo/enclosur_review/enclosure_review.html?error=true");
        exit();
      }




$conn->close();
?>