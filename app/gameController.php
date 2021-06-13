<?php
include_once "app.php";

class GameController{
    public function token(){
        return $_SESSION['token'];
    }
}
