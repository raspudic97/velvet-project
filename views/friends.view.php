<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>
<?php $current_user = $user->getUserById($_GET['id']) ?>

<div class="friends-container">
    <div class="display-friends">
        <h3>Friends of <?php echo explode(" ", $current_user->fullname)[0] ?></h3>
        <?php foreach ($user_friends as $user_friend) : ?>
            <?php

            if ($_GET['id'] == $user_friend->user_id) {
                $friend_id = $user_friend->user_id2;
            } else {
                $friend_id = $user_friend->user_id;
            }

            $friend = $user->getUserById($friend_id);

            ?>


            <div class="friend">
                <a href="user_profile.php?id=<?php echo $friend_id ?>">
                    <img src="views/assets/images<?php echo $friend->profile_picture_url ?>">

                    <div class="friend-info">
                        <div class="friend-name"><?php echo $friend->fullname . "-" . $friend->username; ?></div>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php require_once 'views/partials/bottom.php' ?>