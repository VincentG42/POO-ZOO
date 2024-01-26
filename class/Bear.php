<?php


class Bear extends Animal{

    public function move(){
        return $this -> getName()." vaque à ses occupations";
    }

    public function cry(){
        return $this -> getName()." grogne! ";
    }
}


?>