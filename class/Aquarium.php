<?php

class Aquarium extends Pen{

    private string $salinity;

    private string $type = 'Aquarium';



    //getters
  
    public function getSalinity() :string
    {
        return $this->salinity;
    }

    public function getType() : string
    {
           return $this->type;
    }

     
    //setters

    public function setSalinity($salinity) : void
    {
        $this->salinity = $salinity;


    }



    //methods

    public function clean(){
        if ($this -> getPopulationNumber() === 0){
                if($this -> getSalinity() === 'good'){
                    
                } else {
                    $this -> setSalinity('good');
                }
                $this -> setCleanliness('propre');
        }
 }

}



?>