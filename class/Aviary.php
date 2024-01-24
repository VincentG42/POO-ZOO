<?php

class Aviary extends Pen{

    private string $roofState;




  
    public function getRoofState() :string
    {
        return $this->roofState;
    }

     
    public function setRoofState($roofState) : void
    {
        $this->roofState = $roofState;


    }


    public function clean(){
        if ($this -> getPopulationNumber() === 0){
                if($this -> getRoofState() === 'good'){
                    
                } else {
                    $this -> setRoofState('good');
                }
                $this -> setCleanliness('propre');
        }
 }

}



?>