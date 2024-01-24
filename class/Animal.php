<?php

abstract class Animal{

    protected string $name;

    protected int $age;

    protected int $height; 

    protected int $weight;

    protected bool $isHungry;

    protected bool $isAwake;

    protected bool $isSick;

    protected string $species;


    //setters

    public function setName( string $name) : void {

        $this -> name = $name;
    }

    public function setAge( int $age) : void {

        $this -> age = $age;
    }

    public function setHeight( int $height) : void {

        $this -> height = $height;
    }

    public function setWeight( int $weight) : void {

        $this -> weight = $weight;
    }

    public function setIsHundry( bool $isHungry) : void {

        $this -> isHungry = $isHungry;
    }

    public function setIsAwake( bool $isAwake) : void {

        $this -> isAwake = $isAwake;
    }

    public function setIsSick( bool $isSick) : void {

        $this -> isSick = $isSick;
    }

    public function setSpecies($species)
    {
        $this->species = $species;
    }

    //getters

    public function getName() : string {
        return $this -> name;
    }

    public function getAge() : int {
        return $this -> age;
    }

    public function getHeight() : int {
        return $this -> height;
    }

    public function getWeight() : int{
        return $this -> weight;
    }

    public function getIsHungry() : bool {
        return $this -> isHungry;
    }

    public function getIsAwake() : bool {
        return $this -> isAwake;
    }

    public function getIsSick() : bool {
        return $this -> isSick;
    }

    public function getSpecies() : string
    {
        return $this->species;
    }


    //method
     public function eat( Pen $enclos){
        // prend quantite de nourriture dans enclos et -1, et set IsHungry to false, retourne la quantite de nourriture presente dans enclos

        $enclos -> setFoodPortion($enclos -> getFoodPortion() -1);
        $this-> setIsHundry(false);

        return $enclos -> getFoodPortion();  
     }

     abstract function cry(); // a redefinir pour chaque animal

     public function beHealed(): void {  //si malade isSick = true donc quand soigné isSick -> false
        $this -> setIsSick(false);
     }

     public function sleep() : void {
        $this-> SetIsAwake(False);

     }

     public function wakeUp() : void {
        $this -> setIsAwake(True);
     }

    public function getAllCarac() : array {
        $carac =[ 'name' => $this->getName(), 
                    'age' => $this -> getAge(), 
                    'height' => $this -> getHeight(),
                    'weight' =>  $this -> getWeight(),
                    'isHungry' => $this -> getIsHungry(),
                    'isAwake' => $this -> getIsAwake(),
                    'isSik' => $this -> getIsSick()

        ];
     return $carac;
     }
  
    
}


?>