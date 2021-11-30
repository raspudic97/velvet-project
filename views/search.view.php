<?php require_once 'views/partials/top.php' ?>
<div class="upper-header">
    <nav>
        <a href="index.php" class="nav-brand">Velvet</a>

        <?php if (isset($_SESSION['user'])) : ?>
            <div class="icons-container">
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
                <a href="#"><i class="fas fa-envelope icons-container-item"></i></a>
                <a href="#"><i class="fas fa-bell icons-container-item"></i></a>
                <a href="#"><img src="views/assets/images/jinx.jpg" class="upper-header-profile-picture icons-container-item"></a>
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


<div class="search-user-form">
    <form onsubmit="return ajsearch(<?php echo $_SESSION['user'] -> id ?>);">
        <h1 class="search-user-title">Search for users</h1>
        <input class="search-user-input" type="text" id="search" placeholder="Search..." required autocomplete="off"/>
        <input class="search-user-btn" type="submit" value="Search" />
    </form>
</div>

<div class="search-results-container" id="results"></div>

<script src="js/liveSearch.js"></script>
<?php require_once 'views/partials/bottom.php' ?>