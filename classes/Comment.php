<?php

class Comment extends QueryBuilder
{
    public function getAll($id)
    {
        $post_id = $id;

        $sql = "SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute([$post_id]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function addComment($id)
    {
        $description = $_POST['comment_description'];
        $description_media_url = "/";
        $user_id = $_SESSION['user']->id;
        $post_id = $id;

        $sql = "INSERT INTO comments VALUES(NULL,?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$description, $description_media_url, $user_id, $post_id]);
        
    }

    public function getLikedCommentById($id)
    {
        $sql = "SELECT * FROM comment_likes WHERE comment_id = ? AND user_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$id, $_SESSION['user']->id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
