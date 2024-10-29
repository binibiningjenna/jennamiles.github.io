<?php
include('connect.php');

// Query to fetch posts
$query = "SELECT 
    c.username,
    p.content,
    p.isDeleted,
    p.attachment,
    pr.name AS province_name,
    ci.name AS city_name
FROM 
    posts p
JOIN 
    clients c ON p.userID = c.userID
JOIN 
    provinces pr ON p.provinceID = pr.provinceID
JOIN 
    cities ci ON p.cityID = ci.cityID
WHERE 
    p.isDeleted = 0";

$result = mysqli_query($conn, $query);

// Query to fetch user profile information
$userInfoQuery = "SELECT * FROM userinfo WHERE userInfoID = 1";
$userInfoResult = mysqli_query($conn, $userInfoQuery);

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Social Hub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Source+Sans+Pro&family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>

  <!-- Navigation Bar -->
  <?php include('assets/header.php') ?>

  <!-- Video Cover Section -->
  <div id="home" class="main-cover">
    <video autoplay loop muted class="background">
      <source src="videos/video.mp4" type="video/mp4">
    </video>
  </div>

  <!-- About Section -->
  <div class="px-4 py-3 text-center" id="about">
  <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-send-plus my-2"
      viewBox="0 0 16 16">
      <path
        d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372zm-2.54 1.183L5.93 9.363 1.591 6.602z" />
      <path
        d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
    </svg>
    <h1 class="header fw-bold display-3 py-2">ABOUT US</h1>
    <div class="col-lg-6 mx-auto">
      <p class="subheader mb-4 mb-5">
        Welcome to Postify—your one-stop platform to share life’s moments through images, videos, and status updates.
        Whether it’s capturing a breathtaking view, sharing a special event, or expressing your thoughts, Postify allows
        you to connect with the world in real-time.<br><br>
        Our mission is to provide a simple, seamless experience for users to showcase their stories, engage with a
        community, and explore content from around the globe. With powerful sharing tools and a vibrant, diverse
        community, Postify is more than just a platform—it's where your moments come to life.
      </p>
    </div>
  </div>

  <!-- Feed Section -->
  <div id="feed">
    <img src="videos/feed-video.gif" alt="Feed GIF" class="background" style="width: 100%; height: auto;">
  </div>

  <div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 d-flex justify-content-center">
            <button type="button" class="btn btn-warning w-50 w-md-auto fw-bold regular-text" id="categoryButton" disabled>Create Post</button>
        </div>
    </div>
  </div>

  <?php
  if (mysqli_num_rows($result) > 0) {
      while ($post = mysqli_fetch_assoc($result)) {
  ?>

      <div class="container mt-3">
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-6 col-sm-10">
            <div class="card m-1">
              <div class="card-header d-flex align-items-center">
                <img src="https://icon-library.com/images/profile-picture-icon/profile-picture-icon-0.jpg" alt="Profile Picture" class="profile-pic" style="width: 40px; height: 40px;">
                <h5 class="ml-3 px-2"><?php echo $post['username']; ?></h5>
              </div>
              <div class="card-body p-0">
                <p class="card-text pt-3 px-3"><?php echo $post['content']; ?></p>
                <p class="location px-3"><i class="fas fa-map-marker-alt"></i> <?php echo $post['city_name'] . ', ' . $post['province_name']; ?></p>
              </div>
              <div class="card-footer text-right">
              <div class="d-flex justify-content-between">
              <div>
                <span class="reaction-icons" title="Like"><i class="fas fa-thumbs-up"></i></span>
                <span class="reaction-icons" title="Love"><i class="fas fa-heart"></i></span>
                <span class="reaction-icons" title="Wow"><i class="fas fa-surprise"></i></span>
                <span class="reaction-icons" title="Sad"><i class="fas fa-sad-tear"></i></span>
                <span class="reaction-icons" title="Care"><i class="fas fa-laugh-beam"></i></span>
              </div>
              <div>
                <button class="btn btn-dark btn-edit fw-bold regular-text" disabled>Edit</button>
                <button class="btn btn-dark btn-delete fw-bold regular-text" disabled>Delete</button>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php
      }
  }
  ?>

  <?php
  if (mysqli_num_rows($userInfoResult) > 0) {
      while ($userInfo = mysqli_fetch_assoc($userInfoResult)) {
  ?>
      <div class="container-fluid d-flex justify-content-center align-items-center pt-5" id="account">
        <div class="row w-100">
          <div class="col-lg-8 col-md-10 col-sm-12 mx-auto">
            <div class="profile-card shadow-sm rounded bg-light">
              <div class="wrapper px-4 py-4 text-center">
                <h1 class="header fw-bold display-6 py-2">User Profile</h1>
                <div class="profile-info text-center pt-4">
                  <img src="https://icon-library.com/images/profile-picture-icon/profile-picture-icon-0.jpg" class="rounded-circle border" alt="Profile Picture" width="200" height="200">
                  <h1 id="first-name" class="first-name subheader display-4 mt-3 mb-0 fw-bold"><?php echo $userInfo['firstName']; ?></h1>
                  <h3 id="last-name" class="last-name mb-2 subheader display-5"><?php echo $userInfo['lastName']; ?></h3>
                  <p id="birthday" class="birthday regular-text">Birthday: <?php echo $userInfo['birthDay']; ?></p>
                  <button class="btn btn-dark me-2 fw-bold regular-text" disabled>Edit</button>
                  <button class="btn btn-dark me-2 fw-bold regular-text" disabled>Logout</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  <?php
      }
  }
  ?>

  <!-- Footer -->
  <?php include('assets/footer.php') ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
