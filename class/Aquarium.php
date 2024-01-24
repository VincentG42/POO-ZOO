<?php

class Aquarium extends Enclos{

    private string $salinity;




  
    public function getSalinity() :string
    {
        return $this->salinity;
    }

     
    public function setSalinity($salinity) : void
    {
        $this->salinity = $salinity;


    }


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