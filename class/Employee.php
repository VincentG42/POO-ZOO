<?php




class Employee {

    private string $name;
    
    private int $age;

    private string $gender;

    private int $id;

    private int $zooId;


    public function __construct(array $data)
    {
        $this -> name = $data['name'];
        $this -> age = $data['age'];
        $this -> gender =$data['gender'];
    }
    
  //getters
    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getZooId()
    {
        return $this->zooId;
    }
    
    public function getId()
    {
        return $this->id;
    }
    

   //setters
    public function setName($name) : void
    {
        $this->name = $name;
    }

    public function setAge($age) : void
    {
        $this->age = $age;
    }

    public function setGender($gender) : void
    {
        $this->gender = $gender;
    }

    public function setId($id) : void
    {
        $this->id = $id;
    }

    public function setZooId($zooId) : void
    {
        $this->zooId = $zooId;
    }

    //methods

    public function checkPen(Pen $pen){
        $pen ->  getAllCarac();

    }

    public function cleanPen(Pen $pen){
        if ($pen -> getCleanliness() != 'propre' && $pen -> getPopulationNumber() === 0){
            $pen ->setCleanliness('propre');
            return $this -> getName().' nettoie '. $pen -> getName();

        } else if ($pen -> getCleanliness() === 'propre'){
            return $pen -> getName() .'est déjà propre.';
        } else if ($pen -> getPopulationNumber() > 0){
            return 'Il reste des animaux dans '.$pen -> getName();
        }

    }

    public function fedAnimals(Pen $pen){
        foreach($pen -> getPopulationCarac() as $animal){
            if ($animal['isAwake'] === false){
                $currentAnimal = new $animal['species'] ($animal);

                $currentAnimal -> eat();

            }

        }

    }

    public function addIntoPen( Pen $pen, Animal $animal){
        if ($pen -> getPopulationNumber()>0 && $pen ->getPopulationNumber() <6){
            if ($animal -> getSpecies() === $pen -> getPopulationSpecies()){
                $pen ->addAnimal($animal);            
            } else if($pen ->getPopulationNumber() ===0){
                $pen -> setPopulationSpecies($animal -> getSpecies()); 
                $pen -> addAnimal($animal);

            }
        }
    }

    public function removeFromPen (Pen $pen){
        if( $pen -> getPopulationNumber() >1){

            $pen -> removeAnimal();

        } else if ($pen -> getPopulationNumber() === 1){

        $pen -> setPopulationSpecies('');
        $pen -> removeAnimal();
        }
    }


    
}

?>