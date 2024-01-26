<?php


class Tiger extends Animal{



    public function cry(){
        return $this -> getName(). " feule ";
    }

    public function move(){
        return  $this -> getName() ." vagabonde dans sa cage";
    }
}


?>