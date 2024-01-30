<?php


class Dolphin extends Animal{



    public function cry(){
        return $this -> getSpecies()." cliquette! ";
    }

    public function move(){
        return $this -> getSpecies(). "nage";
    }
}


?>