<?php


class Dolphin extends Animal{



    public function cry(){
        return $this -> getName()." cliquette! ";
    }

    public function move(){
        return $this -> getName(). "nage";
    }
}


?>