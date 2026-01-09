<?php
session_start();
include "../Scripts/Config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plan Your Trip - Discoverly</title>

  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/page1.css">
  <script src="../Scripts/base.js" defer></script>

</head>

<body>
  <div class="site-wrapper">

   
    <?php
      $current = 'Home';
      $pill = 'Home';
      include __DIR__ . "/../partials/header_sites.php";
    ?>

    <?php if (isset($_SESSION['userID'])): ?>
      <div class="create-experience-container">
        <a href="createExp.php" class="create-experience-btn">
          + Create Your Own Experience
        </a>
      </div>
    <?php endif; ?>

    <main>
      <div class="hero-title">
        <h2>Plan Your Visit</h2>
        <p>Choose how you'd like to explore</p>
      </div>

      <section class="section">
        <h3 class="section-title">Day Trips</h3>
        <div class="scroll-container">
          <a href="../day-trips/1_day_trip.php" class="card">
            <img src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?w=600" alt="1 Day Trip" class="card-image">
            <div class="card-content">
              <h3>1-Day Trip</h3>
              <p>Experience the highlights in one perfect day</p>
            </div>
          </a>

          <a href="../day-trips/3_day_trip.php" class="card">
            <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?w=600" alt="3 Day Trip" class="card-image">
            <div class="card-content">
              <h3>3-Day Adventure</h3>
              <p>Explore deeper with a long weekend</p>
            </div>
          </a>

          <a href="../day-trips/5_day_trip.php" class="card">
            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=600" alt="5 Day Trip" class="card-image">
            <div class="card-content">
              <h3>5-Day Deep Dive</h3>
              <p>Live like a local for five unforgettable days</p>
            </div>
          </a>
        </div>
      </section>

      <section class="section">
        <div class="section-header">
          <a href="places.php" class="section-title-link">
            <h3 class="section-title no-margin">Places to Visit</h3>
          </a>
          <a href="places.php" class="see-all-link">
            See All <span>→</span>
          </a>
        </div>

        <div class="scroll-container">
          <a href="places.php?filter=restaurants" class="card">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600" alt="Restaurants" class="card-image">
            <div class="card-content">
              <h3>Restaurants</h3>
              <p>From traditional taverns to modern cuisine</p>
            </div>
          </a>

          <a href="places.php?filter=cafes" class="card">
            <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=600" alt="Cafés" class="card-image">
            <div class="card-content">
              <h3>Cafés</h3>
              <p>Cozy spots for coffee and pastries</p>
            </div>
          </a>

          <a href="places.php?filter=historic-sights" class="card">
            <img src="https://images.unsplash.com/photo-1464207687429-7505649dae38?w=600" alt="Historic Sights" class="card-image">
            <div class="card-content">
              <h3>Historic Sights</h3>
              <p>Castles, bridges, and architectural landmarks</p>
            </div>
          </a>

          <a href="places.php?filter=museums" class="card">
            <img src="https://images.unsplash.com/photo-1565098772267-60af42b81ef2?w=600" alt="Museums" class="card-image">
            <div class="card-content">
              <h3>Museums</h3>
              <p>Art, history, and cultural exhibitions</p>
            </div>
          </a>

          <a href="places.php?filter=parks" class="card">
            <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600" alt="Parks" class="card-image">
            <div class="card-content">
              <h3>Parks</h3>
              <p>Gardens, green spaces, and nature escapes</p>
            </div>
          </a>
        </div>
      </section>

      <section class="section">
        <div class="section-header">
          <a href="activities.php" class="section-title-link">
            <h3 class="section-title no-margin">Activities</h3>
          </a>
          <a href="activities.php" class="see-all-link">
            See All <span>→</span>
          </a>
        </div>

        <div class="scroll-container">
          <?php
          $sql = "SELECT placeID, name, about, photos FROM Place WHERE type = 'Activity' ORDER BY RAND() LIMIT 4";
          $result = $conn->query($sql);

          if ($result && $result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  $placeID = htmlspecialchars($row['placeID']);
                  $name = htmlspecialchars($row['name']);
                  $about = htmlspecialchars($row['about']);
                  
                  $photos = $row['photos'];
                  $photoArray = !empty($photos) ? explode(',', $photos) : [];
                  $firstPhoto = !empty($photoArray[0]) ? $photoArray[0] : 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=600';

                  $shortAbout = strlen($about) > 100 ? substr($about, 0, 100) . '...' : $about;
                  
                  echo "
                  <a href=\"../pages-layout/page_layout.php?placeID={$placeID}\" class=\"card\">
                    <img src=\"{$firstPhoto}\" alt=\"{$name}\" class=\"card-image\">
                    <div class=\"card-content\">
                      <h3>{$name}</h3>
                      <p>{$shortAbout}</p>
                    </div>
                  </a>
                  ";
              }
          }
          ?>
        </div>
      </section>
    </main>
<?php
    $conn->close();
    include __DIR__ . "/../partials/footer.php";
?>

  </div>

  <script src="../filter-search.js"></script>
</body>
</html>
