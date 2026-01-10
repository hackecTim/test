<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Discoverly</title>

  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/index.css">

  <script src="Scripts/index.js" defer></script>
  <script src="Scripts/base.js" defer></script>

  <script>
    function confirmLogout() {
      if (confirm("Are you sure you want to log out?")) {
        window.location.href = "Scripts/logout.php";
      }
    }

    let inactivityTime = 0;

    document.onmousemove = document.onkeypress = () => {
      inactivityTime = 0;
    };

    setInterval(() => {
      inactivityTime++;

      if (inactivityTime >= 15) {
        alert("You were automatically logged out due to inactivity.");
        window.location.href = "Scripts/logout.php";
      }
    }, 60000);
  </script>
</head>

<body>
  <div class="site-wrapper">
    <?php
      $current = "home";
      $pill = "Home";
      include __DIR__ . "/partials/header_root.php";
    ?>
    <?php if (isset($_SESSION['userID'])): ?>
      <div class="create-experience-container">
        <a href="Sites/createExp.php" class="create-experience-btn">
          + Create Your Own Experience
        </a>
      </div>
    <?php endif; ?>

    <main>
      <?php
        if (isset($_GET['login']) && $_GET['login'] === "success") {
          echo '<p class="success-msg">Successfully logged in!</p>';
        }
      ?>

      <h2 class="home-title">Discover Hidden Gems in your town</h2>
      <p class="home-subtitle">
        Explore the best of your town with our guide to lesser-known attractions, cozy spots, and local favorites.
      </p>

      <button class="btn-primary" id="getStartedBtn" type="button">Get Started</button>

      <div class="card-container">
        <div class="card">
          <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470" alt="Quaint Café">
          <div class="card-content">
            <h3>Quaint Café</h3>
            <p>A cozy spot known for its artisanal coffee and homemade pastries.</p>
          </div>
        </div>

        <div class="card">
          <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470" alt="Hidden Park">
          <div class="card-content">
            <h3>Hidden Park</h3>
            <p>A tranquil park with shaded trails and hidden benches.</p>
          </div>
        </div>

        <div class="card">
          <img src="https://images.unsplash.com/photo-1501785888041-af3ef285b470" alt="Historic Site">
          <div class="card-content">
            <h3>Historic Site</h3>
            <p>A lesser-known landmark with rich history and architectural beauty.</p>
          </div>
        </div>
      </div>
    </main>
    <?php include __DIR__ . "/partials/footer.php"; ?>

  </div>
</body>
</html>
