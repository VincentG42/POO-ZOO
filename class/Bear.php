<?php


class Bear extends Animal{

    public function move(){
        return $this -> getSpecies()." vaque à ses occupations";
    }

    public function cry(){
        return $this -> getSpecies()." grogne! ";
    }
}


?>