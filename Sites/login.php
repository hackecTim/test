<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In - Discoverly</title>

  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/login.css">

  <script src="../Scripts/login.js" defer></script>
  <script src="../Scripts/base.js" defer></script>
</head>

<body>
  <div class="site-wrapper">

    
    <?php
      $current = 'Login';
      $pill = 'Login';
      include __DIR__ . "/../partials/header_sites.php";
    ?>

    <main class="auth-main">
      <div class="login-container">

        <h2>Welcome Back</h2>
        <p class="subtitle">Log in to save your favorite places and leave reviews</p>

        <?php
            if (isset($_GET['registered=1'])) { 
                echo '<p class="success-msg">Registration successful! Please log in.</p>';
            }
        ?>

        <form id="loginForm" action="../Scripts/loginhandler.php" method="POST">
          <div class="form-group">
            <label for="login-identifier">Email or Username</label>
            <input type="text" id="login-identifier" name="identifier">
            <span id="login-identifier-error" class="error-message"></span>
          </div>

          <div class="form-group">
            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password">
            <span id="login-password-error" class="error-message"></span>
          </div>

          <button type="submit" name="login" class="btn-login">Log In</button>
        </form>

        <div class="divider">
          <span>or</span>
        </div>

        <div class="signup-link">
          Don't have an account? <a href="signup.php">Sign up</a>
        </div>

      </div>
    </main>
<?php include __DIR__ . "/../partials/footer.php"; ?>

  </div>
</body>
</html>
