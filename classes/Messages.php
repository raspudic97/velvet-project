<?php

    class Messages extends QueryBuilder {

        public function getMessages($id) {
            $user_id = $_SESSION['user'] -> id;
            $user_id2 = $id;

            $sql = "SELECT * FROM messages WHERE (sender_id = ? AND reciever_id = ?) OR (sender_id = ? AND reciever_id = ?)";
            $query = $this -> db -> prepare($sql);
            $query -> execute([$user_id, $user_id2, $user_id2, $user_id]);
            $results = $query -> fetchAll(PDO::FETCH_OBJ);
            
            return $results;
        }

        public function sendMessage($reciever_id) {
            $sender_id = $_SESSION['user'] -> id;
            $message = $_POST['send-message-input'];
            $message_media_url = "/";

            $sql = "INSERT INTO messages VALUES(NULL, ?, ?, ?, ?)";
            $query = $this -> db -> prepare($sql);
            $query -> execute([$sender_id, $reciever_id, $message, $message_media_url]);
        }

    }