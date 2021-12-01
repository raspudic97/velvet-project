<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div class="messages-container">
    <div class="chat-users-container">
        <h3 class="chat-users-title">Conversations</h3>
        <?php foreach ($friends as $friend) : ?>

            <?php

            $friend_id = "";

            if ($friend->user_id == $_SESSION['user']->id) {
                $friend_id = $friend->user_id2;
            } else {
                $friend_id = $friend->user_id;
            }

            ?>

            <a class="chat-user-wrapper" href="chat.php?id=<?php echo $friend_id ?>">
                <div id="<?php echo $friend_id; ?>-user-to-chat" class="user-to-chat-container">
                    <img class="user-to-chat-profile-picture" src="views/assets/images<?php echo $user->getUserById($friend_id)->profile_picture_url; ?>">
                    <p class="user-to-chat-name"><?php echo $user->getUserById($friend_id)->fullname; ?></p>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="chat-container">
        <div class="chat-box">
            <h3 class="chat-box-user-info"><?php echo $user->getUserById($_GET['id'])->fullname ?></h3>
            <?php foreach ($all_messages as $message) : ?>
                <?php if ($message->sender_id == $_SESSION['user']->id) : ?>
                    <div class="message-sent-container">
                        <div class="message-sent">
                            <p class="message-sent-text"><?php echo $message->message ?></p>
                            <p class="message-sent-at">23-12-2021 16:03:45</p>
                        </div>
                    </div>
                <?php elseif ($message->reciever_id == $_SESSION['user']->id) : ?>
                    <div class="message-recieved-container">
                        <div class="message-recieved">
                            <p class="message-recieved-text"><?php echo $message->message ?></p>
                            <p class="message-recieved-at">23-12-2021 16:03:45</p>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <div class="type-message-container">
            <div class="type-message">
                <form action="chat.php?id=<?php echo $_GET['id'] ?>" method="post">
                    <input class="type-message-input" name="send-message-input" type="text" id="type-message-input" autocomplete="off">
                    <button type="submit" name="send-message-btn"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>

    <a class="update-posts" href="chat.php?id=<?php echo $_GET['id']?>"><i class="fas fa-sync"></i></a>
</div>
<script>
    let message_input = document.getElementById('type-message-input');

    window.onload = () => {
        message_input.focus();
    }
</script>
<?php require_once 'views/partials/bottom.php' ?>