<?php

class Friend extends QueryBuilder
{
    public function isFriend($id)
    {
        $user_id = $id;
        $user_id2 = $_SESSION['user']->id;

        $sql = "SELECT is_friend FROM `friends` WHERE (user_id = $user_id OR user_id2 = $user_id) AND (user_id = $user_id2 OR user_id2 = $user_id2)";

        $query = $this->db->prepare($sql);
        $query->execute();
        $result = $query->fetch();

        return $result;
    }

    public function getFriends() {
        $user_id = $_SESSION['user'] -> id;

        $sql = "SELECT * FROM friends WHERE user_id = ? OR user_id2 = ?";

        $query = $this -> db -> prepare($sql);
        $query -> execute([$user_id, $user_id]);
        $result = $query -> fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getFriendsById($id) {
        $user_id = $id;

        $sql = "SELECT * FROM friends WHERE user_id = ? OR user_id2 = ?";

        $query = $this -> db -> prepare($sql);
        $query -> execute([$user_id, $user_id]);
        $result = $query -> fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
