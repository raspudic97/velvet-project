<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>


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