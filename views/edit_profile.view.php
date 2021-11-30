<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div class="edit-profile-container">
    <h3 class="edit-profile-title">Edit profile</h3>

    <form action="#" method="post">
        <input type="text" name="username" placeholder="Username" value=" <?php echo $user -> getUserById($_GET['id']) -> username ?> ">
        <input type="text" name="fullname" placeholder="Full name" value=" <?php echo $user -> getUserById($_GET['id']) -> fullname ?> ">
        <input type="password" name="old-password" placeholder="Enter your current password">
        <hr>
        <input type="password" name="new-password" placeholder="Enter your new    password">
        <input type="password" name="confirm-new-password" placeholder="Confirm your new password">

        <label for="profile-picture-upload">New profile picture</label>
        <input id="profile-picture-upload" type="file" name="profile-picture">
        

        <textarea name="profile-description" cols="30" rows="10" placeholder="Profile description"></textarea>

        <button class="submit-form">Save changes</button>
    </form>
</div>

<?php require_once 'views/partials/bottom.php' ?>