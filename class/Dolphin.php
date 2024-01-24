<?php


class Dolphin extends Animal{

    private string $type = 'swimming';


    public function getType()
    {
        return $this->type;
    }

    public function cry(){
        return $this -> getName()." cliquette! ";
    }

    public function swim(){
        return $this -> getName()." nage";
    }

   
}


?>