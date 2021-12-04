<?php require_once 'views/partials/top.php' ?>
<?php require 'views/partials/navbar.php' ?>

<div class="single-post-container">
    <?php if ($single_post->description_media_url != "/") : ?>
        <img src="views/assets/images<?php echo $single_post->description_media_url ?>" class="single-post-img">
    <?php endif; ?>

    <div class="post-header">
        <a href="user_profile.php?id=<?php echo $single_post->user_id ?>">
            <div class="post-publisher">
                <img src="views/assets/images<?php echo $user->getUserById($single_post->user_id)->profile_picture_url; ?>">
                <div class="post-publisher-info">
                    <p class="pp-name"><?php echo $user->getUserById($single_post->user_id)->fullname; ?></p>
                    <p class="pp-createdAt"><?php echo $single_post->createdAt ?></p>
                </div>
            </div>
        </a>
    </div>

    <div class="post">
        <p><?php echo $single_post->description ?></p>
    </div>

    <div class="post-actions sp-pa">

        <form method="POST" onsubmit="return likePost();">

            <?php if ($post->getLikedPostById($single_post->id)) : ?>
                <button id="<?php echo $single_post->id ?>-post" type="submit" value="true"><i class="fas fa-heart"></i></button>
            <?php else : ?>
                <button id="<?php echo $single_post->id ?>-post" type="submit" value="false"><i class="far fa-heart"></i></button>
            <?php endif; ?>
        </form>

    </div>

    <hr .class="sp-hr">

    <div class="add-comment">
        <form action="single_post.php" method="POST">
            <input type="hidden" name="comment_post_id" value="<?php echo $single_post->id ?>">
            <input type="text" class="post-comment" placeholder="Add a comment..." name="comment_description" required>
            <button type="submit" name="add-comment-btn" class="add-comment-btn"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>

    <?php foreach ($comments as $single_comment) : ?>
        <div id="<?php echo $single_comment->id ?>" class="comment-section">
            <div class="comment">
                <div class="comment-left-side">
                    <img src="views/assets/images<?php echo $user->getUserById($single_comment->user_id)->profile_picture_url; ?>" alt="" class="comment-profile-picture">

                    <div class="comment-info">
                        <a href="user_profile.php?id=<?php echo $single_comment->user_id ?>">
                            <p class="comment-username"><?php echo $user->getUserById($single_comment->user_id)->fullname ?></p>
                        </a>
                        <p class="comment-description"><?php echo $single_comment->description ?></p>
                    </div>
                </div>
                <form id="goHere" method="POST" onsubmit="return likeComment();">

                    <?php if ($comment->getLikedCommentById($single_comment->id)) : ?>
                        <button id="<?php echo $single_comment->id ?>-comment" class="comment-like-btn" type="submit" value="true"><i class="fas fa-heart"></i></button>
                    <?php else : ?>
                        <button id="<?php echo $single_comment->id ?>-comment" class="comment-like-btn" type="submit" value="false"><i class="far fa-heart"></i></button>
                    <?php endif; ?>

                    <?php if ($_SESSION['user']->account_status == "admin" || $_SESSION['user']->id == $single_comment->user_id || $single_post->user_id == $_SESSION['user']->id) : ?>
                        <a onclick="deleteComment()" class="remove-post-a"><i id="<?php echo $single_comment->id ?>-remove" class="remove-comment fas fa-trash-alt"></i></a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/likePost.js"></script>
<script src="js/likeComment.js"></script>
<script src="js/deletePost.js"></script>
<script src="js/deleteComment.js"></script>
<?php require_once 'views/partials/bottom.php' ?>