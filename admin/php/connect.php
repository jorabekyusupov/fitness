
<?php

class DB {

    public $connect;
    public $host = 'n4m3x5ti89xl6czh.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
    public $user = 'maj8e644lc25sir4';
    public $pass = 'qi8yta938yuozyyw';
    public $db = 'ywbegp6ywjvdgajv';

    public function __construct()

    {
        $this->connect = new mysqli($this->host,$this->user,$this->pass,$this->db);
    }


    public function getConnect(){

        if($this->connect->connect_error){
            die('Connection failed: ' .$this->connect->connect_error);

        }else return $this->connect;
    }





}
