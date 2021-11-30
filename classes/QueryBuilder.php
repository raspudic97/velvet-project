<?php
    class QueryBuilder {

        protected $db;

        public function __construct($db)
        {
            $this -> db = $db;
        }

        public function selectAll($table) {
            $sql = "SELECT * FROM {$table} ORDER BY id DESC";
            $query = $this -> db -> prepare($sql);
            $query -> execute();
            return $query -> fetchAll(PDO::FETCH_OBJ);
        }

    }