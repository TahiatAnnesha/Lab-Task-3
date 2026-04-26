<?php

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $age = $_POST['age'];
    $gender = $_POST['gender'] ?? "";
    $course = $_POST['course'];
    $terms = isset($_POST['terms']);

    $errors = [];

    // Validations
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirm) || empty($age)) {
        $errors[] = "All fields are required";
    }

    if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "Name must contain only letters";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email";
    }

    if (strlen($username) < 5) {
        $errors[] = "Username must be at least 5 characters";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    if ($password != $confirm) {
        $errors[] = "Passwords do not match";
    }

    if ($age < 18) {
        $errors[] = "Age must be 18 or above";
    }

    if ($gender == "") {
        $errors[] = "Select gender";
    }

    if ($course == "") {
        $errors[] = "Select course";
    }

    if (!$terms) {
        $errors[] = "Accept terms first";
    }

    // Output
    if (!empty($errors)) {
        foreach ($errors as $e) {
            echo $e . "<br>";
        }
    } else {
        echo "<h3>Registration Successful!</h3>";
        echo "Name: $name <br>";
        echo "Email: $email <br>";
        echo "Username: $username <br>";
        echo "Age: $age <br>";
        echo "Gender: $gender <br>";
        echo "Course: $course <br>";
    }
}
?>