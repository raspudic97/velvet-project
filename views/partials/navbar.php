<div class="upper-header">
    <nav>
        <a href="index.php" class="nav-brand">Velvet</a>

        <?php if (isset($_SESSION['user'])) : ?>
            <div class="icons-container">
                <div class="search-bar">
                       <a href="search.php"> <button name="search-bar-btn" class="search-bar-btn"><i class="fas fa-search search-bar-btn-icon"></i></button></a>
                </div>

                <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                <a href="#"><i class="fas fa-envelope icons-container-item"></i></a>
                <a href="#"><i class="fas fa-bell icons-container-item"></i></a>
                <a href="user_profile.php?id=<?php echo $_SESSION['user'] -> id?>"><img src="views/assets/images<?php echo $user -> getUserById($_SESSION['user'] -> id) -> profile_picture_url; ?>" class="upper-header-profile-picture icons-container-item"></a>
            </div>
        <?php else : ?>
            <a href="login_register.php" class="nav-brand ltp-msg">Login to proceed!</a>
        <?php endif; ?>
    </nav>
</div>
<div class="lower-header">
    <div class="lower-navigation">
        <a href="<?php if (isset($_SESSION['user'])) echo "index.php" ?>"><i class="fas fa-home"></i> Home</a>
        <a href="#"><i class="fas fa-newspaper"></i> News</a>
        <a href="#"><i class="fas fa-envelope"></i> Messages</a>
        <a href="#"><i class="fas fa-user-friends"></i> Friends</a>
    </div>
</div>