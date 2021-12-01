<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div class="messages-container">
    <div class="chat-users-container">
        <h3 class="chat-users-title">Conversations</h3>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
        <div class="user-to-chat-container">
            <img class="user-to-chat-profile-picture" src="views/assets/images/jinx.jpg">
            <p class="user-to-chat-name">Mile Raspudic</p>
        </div>
    </div>
    <div class="chat-container">
        <div class="chat-box">
            <h3 class="chat-box-user-info">Mile Raspudic</h3>
            <div class="message-sent-container">
                <div class="message-sent">
                    <p class="message-sent-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis atque obcaecati consequatur debitis officia placeat quisquam distinctio dignissimos in, a labore vel deserunt minus, eum nisi, rerum molestiae at ea!</p>
                    <p class="message-sent-at">23-12-2021 16:03:45</p>
                </div>
            </div>
            <div class="message-recieved-container">
                <div class="message-recieved">
                    <p class="message-recieved-text">Hello</p>
                    <p class="message-recieved-at">23-12-2021 16:03:45</p>
                </div>
            </div>
            <div class="message-sent-container">
                <div class="message-sent">
                    <p class="message-sent-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis atque obcaecati consequatur debitis officia placeat quisquam distinctio dignissimos in, a labore vel deserunt minus, eum nisi, rerum molestiae at ea!</p>
                    <p class="message-sent-at">23-12-2021 16:03:45</p>
                </div>
            </div>
            <div class="message-recieved-container">
                <div class="message-recieved">
                    <p class="message-recieved-text">Hello</p>
                    <p class="message-recieved-at">23-12-2021 16:03:45</p>
                </div>
            </div>
            <div class="message-sent-container">
                <div class="message-sent">
                    <p class="message-sent-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis atque obcaecati consequatur debitis officia placeat quisquam distinctio dignissimos in, a labore vel deserunt minus, eum nisi, rerum molestiae at ea!</p>
                    <p class="message-sent-at">23-12-2021 16:03:45</p>
                </div>
            </div>
        </div>
        <div class="type-message">
            <input class="type-message-input" type="text" id="type-message-input">
            <button type="submit" name="createPostBtn"><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
</div>
<script>
    let message_input = document.getElementById('type-message-input');

    window.onload = () => {
        message_input.focus();
    }
</script>
<?php require_once 'views/partials/bottom.php' ?>