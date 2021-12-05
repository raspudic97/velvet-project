<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div id="send-money-popup" class="send-money-popup">
    <div class="input-container">
        <h3>Send money to <?php echo explode(" ", $user -> getUserById($_GET['id']) -> fullname)[0] ?></h3>

        <form action="user_profile.php?id=<?php echo $_GET['id'] ?>" method="POST">
            <input class="send-amount-input" type="number" name="send-amount" placeholder="Amount of money" min="1" required autocomplete="off">
            <input class="send-money-btn" type="submit" name="send-money-btn">
        </form>
    </div>

    <button id="hide-popup" class="close-popup-btn">X</button>
</div>

<div class="profile-container">

    <?php if($wallet -> send_money_error == "false"): ?>
        <span class="send-success">Transfer successful. You can check your transactions in wallet.</span>
    <?php elseif($wallet -> send_money_error == "true"): ?>
        <span class="send-error">Something went wrong. Check your balance and try again.</span>
    <?php endif; ?>

    <div class="user-info-container">
        <img src="views/assets/images<?php echo $user->getUserById($_GET['id'])->profile_picture_url; ?>" class="info-profile-picture">

        <div class="user-info">
            <div class="info-name">
                <p class="user-info-name"><?php echo $this_user->fullname ?></p>

                <?php if ($this_user->id == $_SESSION['user']->id) : ?>
                    <a href="edit_profile.php?id=<?php echo $this_user->id ?>" class="user-edit-profile">Edit Profile</a>
                <?php else : ?>
                    <a href="chat.php?id=<?php echo $this_user->id ?>" class="add-friend-btn">Message</a>
                    <a id="show-popup" class="add-friend-btn">Send money</a>
                    <?php if ($is_friend != false) : ?>
                        <a id="<?php echo $this_user->id ?>-add-friend-btn" class="add-friend-btn" value="true" onclick="addFriend(<?php echo $this_user->id ?>)">Friend</a>
                    <?php else : ?>
                        <a id="<?php echo $this_user->id ?>-add-friend-btn" class="add-friend-btn" value="false" onclick="addFriend(<?php echo $this_user->id ?>)">Add friend</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if ($this_user->user_description != "/") : ?>
                <p class="user-description"><?php echo $this_user->user_description ?></p>
            <?php else : ?>
                <p class="user-description">User did not provide any informations yet.</p>
            <?php endif; ?>
            <div class="user-stats">
                <p class="user-posts-number"><?php echo count($post -> getPostsByUserId($_GET['id'])) ?> Posts</p>
                <a href="friends.php?id=<?php echo $_GET['id']?>"><p class="user-friends-number"><?php echo count($friend -> getFriendsById($_GET['id'])) ?> Friends</p></a>
            </div>
        </div>
    </div>

    <div class="user-posts-container">
        <div class="user-posts">
            <?php if (count($user_posts) == 0) : ?>
                <div class="user-post-container">
                    <div class="post no-post-msg">
                        <p>No posts yet.</p>
                    </div>
                </div>
        </div>
    </div>

<?php else : ?>
    <?php foreach ($user_posts as $single_post) : ?>
        <div class="user-post-container" id="<?php echo $single_post->id ?>">
            <div onclick="window.location='single_post.php?post_id=<?php echo $single_post->id ?>'">
                <div class="post-header">
                    <div class="post-publisher">
                        <img src="views/assets/images<?php echo $user->getUserById($single_post->user_id)->profile_picture_url; ?>">
                        <div class="post-publisher-info">
                            <p class="pp-name"><?php echo $this_user->fullname; ?></p>
                            <p class="pp-createdAt"><?php echo $single_post->createdAt ?></p>
                        </div>
                    </div>
                </div>

                <div class="post">
                    <p><?php echo $single_post->description ?></p>

                    <?php if ($single_post->description_media_url != "/") : ?>
                        <img src="views/assets/images<?php echo $single_post->description_media_url ?>">
                    <?php endif; ?>
                </div>
            </div>
            <hr>

            <div class="post-actions">

                <form method="POST" onsubmit="return likePost();">

                    <?php if ($post->getLikedPostById($single_post->id)) : ?>
                        <button id="<?php echo $single_post->id ?>-post" type="submit" value="true"><i class="fas fa-heart"></i></button>
                    <?php else : ?>
                        <button id="<?php echo $single_post->id ?>-post" type="submit" value="false"><i class="far fa-heart"></i></button>
                    <?php endif; ?>

                    <a href="<?php echo "single_post.php?post_id=" . $single_post->id ?>"><i class="far fa-comment"></i></a>
                    <?php if ($_SESSION['user']->account_status == "admin" || $_SESSION['user']->id == $single_post->user_id) : ?>
                        <a onclick="deletePost()" class="remove-post-a"><i id="<?php echo $single_post->id ?>-remove" class="remove-post fas fa-trash-alt"></i></a>
                    <?php endif; ?>
                </form>

            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
<?php endif; ?>
</div>
<script>
    popup = document.getElementById("send-money-popup");
    show_btn = document.getElementById("show-popup");
    hide_btn = document.getElementById("hide-popup");

    show_btn.addEventListener('click', function() {
        popup.classList.add("show");
    });

    hide_btn.addEventListener("click", function() {
        popup.classList.remove("show");
    })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/addFriend.js"></script>
<script src="js/likePost.js"></script>
<script src="js/deletePost.js"></script>
<?php require_once 'views/partials/bottom.php' ?>