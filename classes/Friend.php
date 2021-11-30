<?php

class Friend extends QueryBuilder
{
    public function isFriend($id)
    {
        $user_id = $id;
        $user_id2 = $_SESSION['user']->id;

        $sql = "SELECT is_friend FROM `friends` WHERE (user_id = $user_id OR user_id2 = $user_id) AND (user_id = $user_id2 OR user_id2 = $user_id2)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();

        return $result;
    }
}
