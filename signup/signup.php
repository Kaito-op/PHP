<?php
// Initialize an empty array to store error messages
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled out
    if (empty($_POST['firstname'])) {
        $errors[] = "First Name is required.";
    } else {
        $firstname = htmlspecialchars($_POST['firstname']);
    }

    if (empty($_POST['lastname'])) {
        $errors[] = "Last Name is required.";
    } else {
        $lastname = htmlspecialchars($_POST['lastname']);
    }

    if (empty($_POST['email'])) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    } else {
        $email = htmlspecialchars($_POST['email']);
    }

    if (empty($_POST['password'])) {
        $errors[] = "Password is required.";
    } else {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    // If there are no errors, proceed to save the data
    if (empty($errors)) {
        $data = "First Name: $firstname\nLast Name: $lastname\nEmail: $email\nPassword: $password\n\n";
        $file = 'users.txt';

        if (file_put_contents($file, $data, FILE_APPEND) !== false) {
            echo "Sign-up successful! Your data has been saved.";
        } else {
            echo "An error occurred while saving your data. Please try again.";
        }
    } else {
        // Display the errors
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<p><a href='signup.html'>Go back to the sign-up form</a></p>";
    }
}
?>
