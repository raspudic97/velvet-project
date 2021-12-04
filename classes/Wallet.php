<?php

class Wallet extends QueryBuilder
{

    public $deposit_error = "";
    public $send_money_error = "";

    public function isWallet($id)
    {
        $user_id = $id;

        $sql = "SELECT * FROM wallet WHERE user_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$user_id]);
        $result = $query->fetchColumn();

        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function createUserWallet($id)
    {
        $user_id = $id;
        $total_balance = 0;

        $sql = "INSERT INTO wallet VALUES(NULL,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$user_id, $total_balance]);
    }

    public function getWallet($id)
    {
        $user_id = $id;

        $sql = "SELECT * FROM wallet WHERE user_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$user_id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function getCurrentBalance($id)
    {
        $user_id = $id;

        $sql = "SELECT total_balance FROM wallet WHERE user_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$user_id]);
        $result = $query->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public function depositMoney($id)
    {
        $user_id = $id;
        $current_balance = (int) $this->getCurrentBalance($user_id)->total_balance;
        $deposit = (int) $_POST['deposit-amount'];
        $deposit_amount = $current_balance + $deposit;

        $sql = "UPDATE wallet SET total_balance = ? WHERE user_id = ?";
        $query = $this->db->prepare($sql);
        $query->execute([$deposit_amount, $user_id]);


        $sender_id = $id;
        $reciever_id = $id;
        $value = $deposit;
        $created_at = date('Y-m-d H:i:s');

        $sql_2 = "INSERT INTO wallet_transactions VALUES(NULL,?,?,?,?)";
        $query_2 = $this->db->prepare($sql_2);
        $query_2->execute([$sender_id, $reciever_id, $value, $created_at]);

        if ($query->rowCount() > 0 && $query_2->rowCount() > 0) {
            $this->deposit_error = "false";
        } else {
            $this->deposit_error = "true";
        }
    }

    public function getTransactions($id)
    {
        $user_id = $id;

        $sql = "SELECT * FROM wallet_transactions WHERE sender_id = ? OR reciever_id = ? ORDER BY id DESC";
        $query = $this->db->prepare($sql);
        $query->execute([$user_id, $user_id]);
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        return $results;
    }

    public function sendMoney($id)
    {
        $reciever_id = $id;
        $sender_id = $_SESSION['user']->id;
        $value =  $_POST['send-amount'];

        // Oduzmi pare posiljatelju
        $user_balance = $this->getCurrentBalance($sender_id)->total_balance;
        $new_balance = (int) $user_balance - (int) $value;

        // Dodaj pare primatelju
        $user_balance_2 = $this->getCurrentBalance($reciever_id)->total_balance;
        $new_balance_2 = (int) $user_balance_2 + (int) $value;

        // Odradi transakciju ukoliko posiljatelj ima dovoljno nova na racunu
        if ($user_balance >= $value) {
            $sql = "UPDATE wallet SET total_balance = ? WHERE user_id = ?";
            $query = $this->db->prepare($sql);
            $query->execute([$new_balance, $sender_id]);

            $sql_2 = "UPDATE wallet SET total_balance = ? WHERE user_id = ?";
            $query_2 = $this->db->prepare($sql_2);
            $query_2->execute([$new_balance_2, $reciever_id]);

            // Dodaj u transakcije
            $created_at = date('Y-m-d H:i:s');

            $sql_3 = "INSERT INTO wallet_transactions VALUES(NULL,?,?,?,?)";
            $query_3 = $this->db->prepare($sql_3);
            $query_3->execute([$sender_id, $reciever_id, $value, $created_at]);
        } else {
            $this->send_money_error = "Sorry, you dont have enough money on your account.";
        }
    }
}
