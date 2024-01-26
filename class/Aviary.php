<?php

class Aviary extends Pen{

    private string $roofState;

    private string $type = 'Aviary';




  //getters
    public function getRoofState() :string
    {
        return $this->roofState;
    }

    public function getType() : string
    {
           return $this->type;
    }
     

    //setters
    public function setRoofState($roofState) : void
    {
        $this->roofState = $roofState;


    }

    //methods
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