<?php
include('connect.php');

$postID = $_GET['id'];

if (isset($_POST['btnEditPost'])) {
    $username = $_POST['username'];
    $caption = $_POST['caption'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $birthDay = $_POST['birthDay'];

    // Update Clients Table
    $clientEditQuery = "UPDATE clients SET username='$username' WHERE userID=(SELECT userID FROM posts WHERE postID='$postID')";
    executeQuery($clientEditQuery);

    // Update Posts Table
    $postsEditQuery = "UPDATE posts SET content='$caption' WHERE postID='$postID'";
    executeQuery($postsEditQuery);

    // Update Cities Table
    $cityEditQuery = "UPDATE cities SET name='$city' WHERE cityID=(SELECT cityID FROM posts WHERE postID='$postID')";
    executeQuery($cityEditQuery);

    // Update Provinces Table
    $provinceEditQuery = "UPDATE provinces SET name='$province' WHERE provinceID=(SELECT provinceID FROM posts WHERE postID='$postID')";
    executeQuery($provinceEditQuery);

    // Update UserInfo Table
    $userInfoEditQuery = "UPDATE userinfo SET firstName='$firstName', lastName='$lastName', birthDay='$birthDay' WHERE userInfoID=(SELECT userInfoID FROM clients WHERE userID=(SELECT userID FROM posts WHERE postID='$postID'))";
    executeQuery($userInfoEditQuery);

    header('Location: ./');
}

$query = "SELECT 
    p.postID,
    c.username,
    p.content,
    pr.name AS province_name,
    ci.name AS city_name,
    ui.firstName,
    ui.lastName,
    ui.birthDay
FROM 
    posts p
JOIN 
    clients c ON p.userID = c.userID
JOIN 
    provinces pr ON p.provinceID = pr.provinceID
JOIN 
    cities ci ON p.cityID = ci.cityID
JOIN
    userinfo ui ON c.userInfoID = ui.userInfoID
WHERE postID = '$postID'";

$result = mysqli_query($conn, $query);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald&family=Source+Sans+Pro&family=Poppins:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>

<body>

    <!-- Navigation Bar -->
    <?php include('assets/header.php') ?>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($post = mysqli_fetch_assoc($result)) {
            ?>
            <div class="container-fluid mt-5 pt-5">
                <h1 class="text-center p-2 my-3 mb-4 display-6 header">Edit Your Post: What's on Your Mind?</h1>

                <form method="POST">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-8">
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input value="<?php echo $post['firstName'] ?>" class="form-control" name="firstName">
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input value="<?php echo $post['lastName'] ?>" class="form-control" name="lastName">
                            </div>
                            <div class="mb-3">
                                <label for="birthDay" class="form-label">Birthday</label>
                                <input value="<?php echo $post['birthDay'] ?>" class="form-control" name="birthDay">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input value="<?php echo $post['username'] ?>" class="form-control" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <textarea class="form-control" name="caption"
                                    rows="3"><?php echo $post['content']; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input value="<?php echo $post['city_name'] ?>" class="form-control" name="city">
                            </div>
                            <div class="mb-3">
                                <label for="province" class="form-label">Province</label>
                                <input value="<?php echo $post['province_name'] ?>" class="form-control" name="province">
                            </div>
                            <button type="submit" class="btn btn-warning mb-2 w-25 w-sm-auto fw-bold" name="btnEditPost"
                                id="categoryButton">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>

    <!-- Footer -->
    <?php include('assets/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>