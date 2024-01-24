<?php


class Eagle extends Animal{

    private string $type = 'flying';


    public function getType()
    {
        return $this->type;
    }

    public function cry(){
        return $this -> getName(). " glatit!";
    }

    public function vol(){
        return  $this -> getName() ." vole";
    }
}


?>