<?php


class Dolphin extends Animal{

    private string $type = 'swimming';


    
    public function setType($type = 'swimming') : void{
        $this -> type = $type;
    }

    public function cry(){
        return $this -> getSpecies()." cliquette! ";
    }

    public function move(){
        return $this -> getSpecies()." nage";
    }


}


?>