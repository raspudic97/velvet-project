<?php 
    class User extends QueryBuilder {

        public $register_status = NULL;
        public $login_status = NULL;
        
        public function registerUser() {
            $username = $_POST['register_username'];
            $fullname = $_POST['register_fullname'];
            $email = $_POST['register_email'];
            $password = $_POST['register_password'];
            $account_status = 'user';
            $profile_picture_url = '/';
            $user_description = '/';

            $sql = "INSERT INTO user VALUES(NULL,?,?,?,?,?,?,?)";
            $query = $this -> db -> prepare($sql);
            $query -> execute([$username, $fullname, $email, $password, $account_status, $profile_picture_url, $user_description]);

            if($query) {
                $this -> register_status = true;
            }
        }

        public function logUser() {
            $username = $_POST['login_username'];
            $password = $_POST['login_password'];

            $sql = "SELECT * FROM user WHERE
                    username = ? AND password = ?
            ";

            $query = $this -> db -> prepare($sql);
            $query -> execute([$username, $password]);
            $loggedUser = $query -> fetch(PDO::FETCH_OBJ);

            if(true) {
                session_start();
                $_SESSION['user'] = $loggedUser;
                header("Location: index.php");
            } else {
                $this -> login_status = true;
            }
        }

        public function getUserById($id) {
            $sql = "SELECT * FROM user WHERE id = ?";
            $query = $this -> db -> prepare($sql);
            $query -> execute([$id]);
            $result = $query -> fetch(PDO::FETCH_OBJ);
            return $result;
        }
    }
?>