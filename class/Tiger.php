<?php


class Tiger extends Animal{



    public function cry(){
        return $this -> getSpecies(). " feule ";
    }

    public function move(){
        return  $this -> getSpecies() ." vagabonde dans sa cage";
    }
}


?>