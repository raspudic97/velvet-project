<?php require 'partials/top.php' ?>
<?php require 'partials/navbar.php' ?>

<div class="login-register-forms">
    <div class="login-container">
        <h3 class="login-register-title">Login</h3>

        <div class="login-form-container">
            <form action="login_register.php" method="POST">
                <input type="text" name="login_username" placeholder="Username" required><br>
                <input type="password" name="login_password" placeholder="Password" required><br>
                <button name="login-btn">Login</button>
            </form>
        </div>
        <?php if ($user->login_status == true) : ?>
            <div class="error-msg">
                <p>Oops! Something went wrong. Try again!</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="register-container">
        <h3 class="login-register-title">Register</h3>

        <div class="register-form-container">
            <form action="login_register.php" method="POST" autocomplete="off">
                <input type="text" name="register_username" placeholder="Username" required><br>
                <input type="text" name="register_fullname" placeholder="Full Name" required><br>
                <input type="email" name="register_email" placeholder="Email" required><br>
                <input type="password" name="register_password" placeholder="Password" required><br>

                <button name="register-btn">Register</button>
            </form>
        </div>
        <?php if ($user->register_status == true) : ?>
            <div class="success-msg">
                <p>Success ! You can now proceed to Login. Enjoy!</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require 'partials/bottom.php' ?>