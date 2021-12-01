<?php require 'views/partials/top.php' ?>
<?php require 'views/partials/navbar.php' ?>

<div class="home-content-container">
    <div class="home-create-post">
        <img src="views/assets/images<?php echo $user -> getUserById($_SESSION['user'] -> id) -> profile_picture_url; ?>" alt="">
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input class="post-description" type="text" name="post-description" placeholder="Create new post" autocomplete="off" required>
            <input type="file" name="image">
            <button type="submit" name="createPostBtn"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>
</div>

<?php require_once 'views/partials/display_posts.php' ?>

<a class="update-posts" href="index.php"><i class="fas fa-sync"></i></a>

<script src="js/likePost.js"></script>
<script src="js/deletePost.js"></script>
<?php require 'views/partials/bottom.php' ?>