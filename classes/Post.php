<?php
class Post extends QueryBuilder
{

    public $post_created_status = NULL;
    public $error_message = "false";

    public function addPost()
    {
        $post_description = $_POST['post-description'];
        $user_id = $_SESSION['user']->id;
        $post_media_url = "/";
        $createdAt = date('Y-m-d H:i:s');

        $currentDirectory = getcwd();
        $uploadDirectory = "/views/assets/images/";

        $fileExtensionsAllowed = ['jpeg', 'jpg', 'png']; // These will be the only file extensions allowed 

        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileTmpName  = $_FILES['image']['tmp_name'];
        $tmp = explode('.', $fileName);
        $fileExtension = strtolower(end($tmp));

        $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);

        if (isset($_POST['createPostBtn']) && $fileName != NULL) {

            if (!in_array($fileExtension, $fileExtensionsAllowed)) {
                $this->error_message = "File type not allowed. File types allowed : jpeg, jpg, png.";
            }

            if ($fileSize > 4000000) {
                $this->error_message = "File is too large.";
            }

            if ($this -> error_message == "false") {
                $didUpload = move_uploaded_file($fileTmpName, $uploadPath);
                $post_media_url = '/' . $fileName;

                if ($didUpload) {
                    $this->error_message = "false";
                } else {
                    $this->error_message = "Something went wrong! Try again.";
                }
            } else {
                $this->error_message = "Something went wrong! Try again.";
            }
        }

        if ($this -> error_message == "false") {
            $sql = "INSERT INTO post VALUES(NULL,?,?,?,?)";
            $query = $this->db->prepare($sql);
            $query->execute([$post_description, $post_media_url, $user_id, $createdAt]);

            if ($query) {
                $this->post_created_status = true;
            } else {
                $this->post_created_status = false;
            }
        }
    }

    public function getLikedPostById($id)
    {
        $sql = "SELECT * FROM post_likes WHERE post_id = ? AND user_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id, $_SESSION['user']->id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getSinglePost($id)
    {
        $post_id = $id;

        $sql = "SELECT * FROM post WHERE id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$post_id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function getPostsByUserId($id)
    {
        $user_id = $id;

        $sql = "SELECT * FROM post WHERE user_id = ? ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute([$user_id]);

        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
