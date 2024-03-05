<?php

class Database{
    //กำหนดตัวแปร class
    var $condb;
    var $sql;
    var $field = "*";
    var $table;
    var $condition;
    var $value;
    

    public function __construct(){
    $this->condb = mysqli_connect(
                    "localhost",
                    "root",
                    "",
                    "103_db");
        if( !$this->condb ){
            die('Cannot Connect DB : '. mysqli_connect_errno());
    }

        date_default_timezone_set('Asia/Bangkok');
    }
    
    public function select(){
        $this->sql = "SELECT {$this->field} FROM {$this->table} {$this->condition}";
        $query = mysqli_query($this->condb, $this->sql) ;
        return $query;
    }
    public function delete(){
        $this->sql = "DELETE FROM {$this->table} {$this->condition}";
        $query = mysqli_query($this->condb, $this->sql) ;
        return $query;
    }
    public function insert(){
            $this->sql = "INSERT INTO {$this->table} ({$this->field}) VALUES ({$this->value})";
            $query = mysqli_query($this->condb, $this->sql) ;
            return $query;
    }
    public function update(){
            $this->sql = "UPDATE {$this->table} SET {$this->value} {$this->condition}";
            $query = mysqli_query($this->condb, $this->sql) ;
            return $query;
    }

}
?>