<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign Up - Discoverly</title>

  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/signup.css">

  <script src="../Scripts/signup.js" defer></script>
    <script src="../Scripts/base.js" defer></script>

</head>

<body>
  <div class="site-wrapper">

    <?php
      $current = 'Sign Up';
      $pill = 'Sign Up';
      include __DIR__ . "/../partials/header_sites.php";
    ?>

    <main class="auth-main">
      <div class="signup-container">
        <h2>Create Account</h2>
        <p class="subtitle">Join us to save your favorite places and share reviews</p>

        <form id="signupID" method="POST" action="../Scripts/signuphandler.php">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Choose a username" required>
            <span class="error-message" id="username-error"></span>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="your@email.com" required>
            <span class="error-message" id="email-error"></span>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required>
            <span class="error-message" id="password-error"></span>
          </div>

          <div class="form-group">
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm your password" required>
            <span class="error-message" id="confirm-password-error"></span>
          </div>

          <button name="signup" type="submit" class="btn-signup">Sign Up</button>
        </form>

        <div class="divider"><span>or</span></div>

        <div class="login-link">
          Already have an account? <a href="login.php">Log in</a>
        </div>
      </div>
    </main>
<?php include __DIR__ . "/../partials/footer.php"; ?>

  </div>
</body>
</html>
