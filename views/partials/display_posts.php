<?php foreach ($posts as $single_post) : ?>
   <?php if($_SESSION['user'] -> account_status == 'admin' || $friend -> isFriend($user->getUserById($single_post->user_id)->id) != false ): ?>
    <div class="post-container" id="<?php echo $single_post->id ?>">
        <div onclick="window.location='single_post.php?post_id=<?php echo $single_post -> id?>'">
            <div class="post-header">
                <div class="post-publisher">
                    <img src="views/assets/images/jinx.jpg">
                    <div class="post-publisher-info">
                        <p class="pp-name"><?php echo $user->getUserById($single_post->user_id)->fullname; ?></p>
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

                <a href="<?php echo "single_post.php?post_id=".$single_post -> id?>"><i class="far fa-comment"></i></a>
                <a href="#"><i class="fas fa-share"></i></a>
                <?php if ($_SESSION['user']->account_status == "admin" || $_SESSION['user']->id == $single_post->user_id) : ?>
                    <a onclick="deletePost()" class="remove-post-a"><i id="<?php echo $single_post->id ?>-remove" class="remove-post fas fa-trash-alt"></i></a>
                <?php endif; ?>
            </form>

        </div>
    </div>
    <?php endif; ?>
<?php endforeach; ?>