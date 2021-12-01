<?php require_once 'views/partials/top.php' ?>
<?php require_once 'views/partials/navbar.php' ?>

<div class="edit-profile-container">
    <h3 class="edit-profile-title">Edit profile</h3>

    <form action="edit_profile.php?id=<?php echo $_GET['id'] ?>" method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Username" value="<?php echo $user->getUserById($_GET['id'])->username ?>" required>
        <input type="text" name="fullname" placeholder="Full name" value="<?php echo $user->getUserById($_GET['id'])->fullname ?>" required>
        <input type="password" name="old-password" placeholder="Enter your current password" value="">
        <hr>
        <input type="password" name="new-password" placeholder="Enter your new password" value="">
        <input type="password" name="confirm-new-password" placeholder="Confirm your new password" value="">

        <label for="profile-picture-upload">New profile picture</label>
        <input type="file" name="image">


        <textarea name="profile-description" cols="30" rows="10" placeholder="Profile description"><?php echo $user -> getUserById($_GET['id']) -> user_description ?></textarea>

        <button name="edit-profile" class="submit-form">Save changes</button>

        <?php if ($message != "") : ?>
            <button name="edit-profile" class="error-message"><?php echo $message; ?></button>
        <?php endif; ?>
    </form>
</div>

<?php require_once 'views/partials/bottom.php' ?>