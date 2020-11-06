<?php
// Include config file
require_once "database/connection.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = $old_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get old password
    // New password must differ from old password
    $sql;
    if ($_SESSION["role"] == "admin") {
        $sql = "SELECT password FROM admins WHERE username = ?";
    } else {
        $sql = "SELECT password FROM users WHERE username = ?";
    }
    
    if ($stmt = $mysqli->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);
        // Set parameters
        $param_username = $_SESSION["username"];

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            // Store result
            $stmt->store_result();

            // Check if username exists, if yes then verify password
            if ($stmt->num_rows == 1) {
                // Bind result variables
                $stmt->bind_result($old_password);
                $stmt->fetch();
            }
        }
    }

    // Validate new password
    if (empty(trim($_POST["new_password"]))) {
        $new_password_err = "Please enter the new password.";
    } elseif (strlen(trim($_POST["new_password"])) < 6) {
        $new_password_err = "Password must have atleast 6 characters.";
    } elseif (password_verify($_POST["new_password"], $old_password)) {
        $new_password_err = "New password must differ from old password.";
    } else {
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm the password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($new_password_err) && ($new_password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if (empty($new_password_err) && empty($confirm_password_err)) {
        // Prepare an update statement
        if ($_SESSION["role"] == "admin") {
            $sql = "UPDATE admins SET password = ? WHERE id = ?";
        } else {
            $sql = "UPDATE users SET password = ? WHERE id = ?";
        }

        if ($stmt = $mysqli->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Password updated successfully. Destroy the session, and redirect to login page
                header("location: logout");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $mysqli->close();
}
?>