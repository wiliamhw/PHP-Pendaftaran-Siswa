<?php
$title = "Admin registration"; // define title addon
require "../assets/admin-reg.asset.php"; // backend
require "partials/head.php"; // front end template
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="login100-form validate-form">
    <span class="login100-form-title">
        Admin Sign Up
    </span>

    <div class="wrap-input100 validate-input" data-validate="Username is required">
        <input class="input100" type="text" name="username" placeholder="Username" value="<?php echo $username; ?>">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-user" aria-hidden="true"></i>
        </span>
    </div>
    <div class="help-block">
        <p><?php echo $username_err; ?></p>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>
    <div class="help-block">
        <p><?php echo $password_err; ?></p>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Confirm password is required">
        <input class="input100" type="password" name="confirm_password" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-check" aria-hidden="true"></i>
        </span>
    </div>
    <div class="help-block">
        <p><?php echo $confirm_password_err; ?></p>
    </div>

    <div class="container-login100-form-btn">
        <button class="login100-form-btn" type="submit">
            Sign Up
        </button>
    </div>

    <div class="text-center p-t-136">
        <a class="txt2" href="index.view.php">
            Sudah punya akun? Login disini
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</form>

<?php require "partials/footer.php"; ?>