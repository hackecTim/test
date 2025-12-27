<?php
session_start();
include "../Scripts/Config.php";

if (!isset($_SESSION['userID'])) {
    header("Location: login.php?error=notloggedin");
    exit();
}

$user_id = $_SESSION['userID'];

$sql = "SELECT username, email FROM Users WHERE userID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$initials = strtoupper(substr($user['username'], 0, 2));

$sql_places = "SELECT * FROM Place WHERE userID = ?";
$stmt_places = $conn->prepare($sql_places);
$stmt_places->bind_param("i", $user_id);
$stmt_places->execute();
$result_places = $stmt_places->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Profile - Discoverly</title>

  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/user-profile.css">

  <script src="../Scripts/user-profile.js" defer></script>
  <script src="../Scripts/base.js" defer></script>

</head>

<body>
  <div class="site-wrapper">
    <?php
      $current = 'profile';
      $pill = 'Profile';
      include __DIR__ . "/../partials/header_sites.php";
    ?>

    <main class="page">
      <section class="profile-hero">
        <div class="profile-header">
          <div class="profile-pic"><?php echo $initials; ?></div>

          <div class="profile-info">
            <h2><?php echo htmlspecialchars($user['username']); ?></h2>
            <p><?php echo htmlspecialchars($user['email']); ?></p>

            <div class="profile-stats">
              <div class="stat">
                <span class="stat-number">5</span>
                <span class="stat-label">Saved Places</span>
              </div>
              <div class="stat">
                <span class="stat-number">3</span>
                <span class="stat-label">Reviews</span>
              </div>
              <div class="stat">
                <span class="stat-number">2</span>
                <span class="stat-label">Visited</span>
              </div>
            </div>

            <div class="profile-actions">
              <a class="btn-edit" href="edituser.php">Edit Profile</a>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="section-header">
          <div>
            <h3 class="section-title">My Added Places</h3>
            <p class="section-subtitle">Your saved spots for future trips.</p>
          </div>
        </div>

        <div class="saved-grid">
          <?php if ($result_places->num_rows === 0): ?>
            <div class="empty-state">
              <h4>No places yet</h4>
              <p>Start exploring and add places to your list.</p>
              <a href="../index.php" class="btn-primary">Explore Places</a>
            </div>
          <?php endif; ?>

          <?php while ($place = $result_places->fetch_assoc()): ?>
            <article class="saved-card">
              <div class="saved-media">
              <?php
                $photosRaw = $place['photos'] ?? '';
                $firstPhoto = '';
                if (!empty($photosRaw)) {
                  $parts = array_map('trim', explode(',', $photosRaw));
                  $firstPhoto = $parts[0] ?? '';
                }
                if (empty($firstPhoto)) {
                  $firstPhoto = '../uploads_places/placeholder.jpg';
                }
                ?>

                <img
                  class="saved-image"
                  src="<?php echo htmlspecialchars($firstPhoto); ?>"
                  alt=""
                  loading="lazy"
                >

                <span class="tag"><?php echo ucfirst($place['type']); ?></span>
              </div>

              <div class="saved-content">
                <h3><?php echo htmlspecialchars($place['name']); ?></h3>
                <p><?php echo htmlspecialchars(substr($place['about'], 0, 110)); ?>...</p>

                <div class="card-actions">
                  <!-- Optional: make card open details page if you have one -->
                  <!-- <a class="btn-link" href="place_layout.php?id=<?php echo (int)$place['placeID']; ?>">View details →</a> -->
                  <span class="meta">Saved</span>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      </section>
    </main>

    <?php include __DIR__ . "/../partials/footer.php"; ?>

  </div>
</body>
</html>
