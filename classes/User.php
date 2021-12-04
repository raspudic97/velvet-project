<?php
class User extends QueryBuilder
{

    public $register_status = NULL;
    public $login_status = NULL;
    public $error_message = "";

    public function registerUser()
    {
        $username = $_POST['register_username'];
        $fullname = $_POST['register_fullname'];
        $email = $_POST['register_email'];
        $password = $_POST['register_password'];
        $account_status = 'user';
        $profile_picture_url = '/default.png';
        $user_description = '/';

        $sql = "INSERT INTO user VALUES(NULL,?,?,?,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$username, $fullname, $email, $password, $account_status, $profile_picture_url, $user_description]);
        
        if ($query) {
            $this->register_status = true;
        }
    }

    public function logUser()
    {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        $sql = "SELECT * FROM user WHERE username = ? AND password = ?";

        $query = $this->db->prepare($sql);
        $query->execute([$username, $password]);
        $loggedUser = $query->fetch(PDO::FETCH_OBJ);

        if ($loggedUser) {
            session_start();
            $_SESSION['user'] = $loggedUser;

            header("Location: index.php");
        } else {
            header("Location: login_register.php");
        }
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM user WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $result = $query->fetch(PDO::FETCH_OBJ);
        
        return $result;
    }

    public function editProfile()
    {
        $loggedUser = $_SESSION['user']->id;
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $profile_picture = "";

        if($_POST['new-password'] != "") {
            $new_password = $_POST['new-password'];
        } else {
            $new_password = $this -> getUserById($loggedUser) -> password;
        }

        if ($_POST['profile-description'] == "") {
            $user_description = "/";
        } else {
            $user_description = $_POST['profile-description'];
        }

        if ($_FILES['image']['name'] != "") {
            $currentDirectory = getcwd();
            $uploadDirectory = "/views/assets/images/";

            $fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed 

            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileTmpName  = $_FILES['image']['tmp_name'];
            $tmp = explode('.', $fileName);
            $fileExtension = strtolower(end($tmp));

            $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

            if (isset($_POST['edit-profile'])) {

                if (!in_array($fileExtension, $fileExtensionsAllowed)) {
                    $this->error_message = "Not supported file format!";
                }

                if ($fileSize > 4000000) {
                    $this->error_message = "File to large!";
                }   

                if (empty($errors)) {
                    $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                    $profile_picture = '/' . $fileName;

                    if ($didUpload) {
                        $this->error_message = "Success!";
                    } else {
                        $this->error_message = "Something went wrong!";
                    }
                } else {
                    $this->error_message = "Something went wrong";
                }
            }
        } else {
            $profile_picture = $this -> getUserById($loggedUser) -> profile_picture_url;
        }

        if (isset($_POST['new-password'])) {
            $sql = "UPDATE user SET username = ?, fullname = ?, password = ?, profile_picture_url = ?, user_description = ? WHERE id = '$loggedUser'";
            $query = $this->db->prepare($sql);
            $query->execute([$username, $fullname, $new_password, $profile_picture, $user_description]);

            if ($query) {
                $this->error_message = "Success! Account updated.";
            }
        } else {
            $sql = "UPDATE user
            SET username = ?, fullname = ?, profile_picture_url = ?, user_description = ? WHERE id = '$loggedUser'";

            $query = $this->db->prepare($sql);
            $query->execute([$username, $fullname, $profile_picture, $user_description]);

            if ($query) {
                $this->error_message = "Success! Account updated.";
            }
        }
    }
}
