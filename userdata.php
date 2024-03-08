<?php
require_once 'Class/User.php';

$user = new User();

// Example of fetching all users
$users = $user->getAllUsers();
foreach ($users as $user) {
    echo "Name: " . $user['name'] . ", Email: " . $user['email'] . "<br>";
}

// Example of fetching a user by ID
$userId = 1;
$userData = $user->getUserById($userId);
echo "Name: " . $userData['name'] . ", Email: " . $userData['email'];

//Example of form submit    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Create a new User object
    $user = new User();

    // Call the createUser method to insert the user into the database
    $userId = $user->createUser($username, $email, $password);

    // Check if user was successfully created
    if ($userId) {
        echo "User created successfully with ID: " . $userId;
    } else {
        echo "Error creating user.";
    }
}


// Assume these are the updated values obtained from a form or elsewhere
$id = 1;
$username = "new_username";
$email = "new_email@example.com";
$result = $user->updateUser($id, $username, $email);
if ($result) {
    echo "User updated successfully.";
} else {
    echo "Error updating user.";
}
