<?php


class Eagle extends Animal{

    private string $type = 'flying';

    
    public function setType($type = 'flying') : void{
        $this -> type = $type;
    }

    public function cry(){
        return $this -> getName(). " glatit!";
    }

    public function move(){
        return  $this -> getName() ." vole";
    }
}


?>