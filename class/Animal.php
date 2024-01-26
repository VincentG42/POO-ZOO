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

    protected string $type;  //land/flying/swimming

    protected int $id;

    protected int $enclosId;

    

    //construct
     public function __construct(array $data){
            $this -> name = $data['name'];
            $this -> species = $data['species'];
            $this -> age = $data['age'];
            $this -> height = $data['height'];
            $this -> weight = $data['weight'];
            $this -> isHungry = $data['isHungry'];
            $this -> isAwake = $data['isAwake'];
            $this -> isSick = $data['isSick'];
            $this -> type = $data['type'];

     }

     


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

    public function setIsHungry( bool $isHungry) : void {

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

    public function setType($type) : void{
         $this -> type = $type;
    }

    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function setEnclosId($enclosId)
    {
        $this->enclosId = $enclosId;
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

    public function getType() : string 
    {
        return $this ->type;
    }
    
    public function getId() : int
    {
        return $this->id;
    }

    public function getEnclosId() : int
    {
        return $this->enclosId;
    }


    //method
     public function eat(){
        // prend quantite de nourriture dans enclos et -1, et set IsHungry to false, retourne la quantite de nourriture presente dans enclos

        // $enclos -> setFoodPortion($enclos -> getFoodPortion() -1);
        $this-> setIsHungry(false);

        // return $enclos -> getFoodPortion();  
     }

     abstract function cry(); // a redefinir pour chaque animal

     abstract function move();

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
                    'species' => $this ->getSpecies(), 
                    'age' => $this -> getAge(), 
                    'height' => $this -> getHeight(),
                    'weight' =>  $this -> getWeight(),
                    'isHungry' => $this -> getIsHungry(),
                    'isAwake' => $this -> getIsAwake(),
                    'isSik' => $this -> getIsSick(),
                    'type' => $this -> getType()

        ];
     return $carac;
     }
  
    


    
    

    


   
}


?>