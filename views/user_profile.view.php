<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div class="profile-container">
    <div class="user-info-container">
        <img src="views/assets/images<?php echo $user -> getUserById($_SESSION['user'] -> id) -> profile_picture_url; ?>" class="info-profile-picture">

        <div class="user-info">
            <div class="info-name">
                <p class="user-info-name"><?php echo $this_user->fullname ?></p>

                <?php if ($this_user->id == $_SESSION['user']->id) : ?>
                    <a href="edit_profile.php?id=<?php echo $this_user->id?>" class="user-edit-profile">Edit Profile</a>
                <?php else : ?>
                    <a href="chat.php?id=<?php echo $this_user -> id?>" class="add-friend-btn">Message</a>
                    <?php if ($is_friend != false) : ?>
                        <a id="<?php echo $this_user->id ?>-add-friend-btn" class="add-friend-btn" value="true" onclick="addFriend(<?php echo $this_user -> id?>)">Friend</a>
                    <?php else : ?>
                        <a id="<?php echo $this_user->id ?>-add-friend-btn" class="add-friend-btn" value="false" onclick="addFriend(<?php echo $this_user -> id?>)">Add friend</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

            <?php if ($this_user->user_description != "/") : ?>
                <p class="user-description"><?php echo $this_user->user_description ?></p>
            <?php else : ?>
                <p class="user-description">User did not provide any informations yet.</p>
            <?php endif; ?>
            <div class="user-stats">
                <p class="user-posts-number">3120 Posts</p>
                <p class="user-friends-number">296K Friends</p>
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

        <div class="user-friends">
            <div class="user-friends-header">
                <p class="user-friends-title">Friends</p>
                <a href="#" class="user-all-friends">All</a>
            </div>

            <div class="user-friend">
                <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
                <p class="user-friend-name">Ime Prezime</p>
            </div>

            <div class="user-friend">
                <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
                <p class="user-friend-name">Ime Prezime</p>
            </div>

            <div class="user-friend">
                <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
                <p class="user-friend-name">Ime Prezime</p>
            </div>

            <div class="user-friend">
                <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
                <p class="user-friend-name">Ime Prezime</p>
            </div>
        </div>
    </div>

<?php else : ?>
    <?php foreach ($user_posts as $single_post) : ?>
        <div class="user-post-container" id="<?php echo $single_post->id ?>">
            <div onclick="window.location='single_post.php?post_id=<?php echo $single_post->id ?>'">
                <div class="post-header">
                    <div class="post-publisher">
                        <img src="views/assets/images<?php echo $user -> getUserById($single_post -> user_id) -> profile_picture_url; ?>">
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
                    <a href="#"><i class="fas fa-share"></i></a>
                    <?php if ($_SESSION['user']->account_status == "admin" || $_SESSION['user']->id == $single_post->user_id) : ?>
                        <a onclick="deletePost()" class="remove-post-a"><i id="<?php echo $single_post->id ?>-remove" class="remove-post fas fa-trash-alt"></i></a>
                    <?php endif; ?>
                </form>

            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="user-friends">
    <div class="user-friends-header">
        <p class="user-friends-title">Friends</p>
        <a href="#" class="user-all-friends">All</a>
    </div>

    <div class="user-friend">
        <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
        <p class="user-friend-name">Ime Prezime</p>
    </div>

    <div class="user-friend">
        <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
        <p class="user-friend-name">Ime Prezime</p>
    </div>

    <div class="user-friend">
        <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
        <p class="user-friend-name">Ime Prezime</p>
    </div>

    <div class="user-friend">
        <img class="user-friend-profile-picture" src="views/assets/images/jinx.jpg">
        <p class="user-friend-name">Ime Prezime</p>
    </div>
</div>
</div>
<?php endif; ?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/addFriend.js"></script>
<script src="js/likePost.js"></script>
<script src="js/deletePost.js"></script>
<?php require_once 'views/partials/bottom.php' ?>