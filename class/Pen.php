<?php

class Pen
{
       private int $id;
       
       private string $name;

       private string $cleanliness;

       private int $populationNumber;

       private string $populationSpecies;

       private string $type = 'Pen';

       private int $zooId;
       
       private array $population = [];
       // private int $foodPortion;

       public function __construct(array $data){
              $this -> id = $data['id'];
              $this -> name = $data['name'];
              $this -> cleanliness = $data['cleanliness'];
              $this -> populationNumber = $data['population_number'];
              $this -> populationSpecies = $data ['population_species'];
       }
       
              
       
       //setters
       public function setName($name): void
       {
              $this->name = $name;
       }

       // public function setFoodPortion(int $portion)
       // {
       //        $this->foodPortion = $portion;
       // }

       public function setCleanliness($cleanliness): void
       {
              $this->cleanliness = $cleanliness;
       }

       public function setPopulationNumber($population, $numberAdded) : void
       {
              $this->populationNumber =  $population +$numberAdded;
       }

       public function setPopulationSpecies($populationSpecies) : void
       {
              $this->populationSpecies = $populationSpecies;
       }

       public function setZooId($zooId) : void
       {
              $this->zooId = $zooId;
       }

       public function setType($type): void
       {
              $this->type = $type;
       }

       public function setId($id)
       {
              $this->id = $id;
       }
       public function setPopulation(Animal $animal){
              $this -> population[] = $animal;
       }


       //getters
       public function getName(): string
       {
              return $this->name;
       }
       
       // public function getFoodPortion(): int
       // {
       //        return $this->foodPortion;
       // }
       
       public function getCleanliness(): string
       {
              return $this->cleanliness;
       }
       
       public function getPopulationNumber(): int
       {
              return $this->populationNumber;
       }
       
       
       public function getPopulationSpecies() : string
       {
              return $this->populationSpecies;
       }

       public function getPopulation() : array {
              return $this -> population;
       }

       public function getZooId() : int
       {
              return $this->zooId;
       }
       
       public function getType() : string
       {
              return $this->type;
       }
       public function getId()
       {
              return $this->id;
       }
       
       
       //methode

       public function getAllCarac() :array { //afficher les caractéristiques de l'enclos
              $carac =['name' => $this->getName(), 
              'cleanliness' => $this -> getcleanliness(), 
              'populationSpecies' => $this -> getPopulationSpecies(),
              'populationNumber' =>  $this -> getPopulationNumber(),
              // 'foodPortion' => $this -> getFoodPortion()
              ];
       return $carac;

       }

       public function getPopulationCarac() : array{ //afficher les caractéristiques des animaux qu'il contient,
       
                     foreach($this -> getPopulation() as $animal){
                            $animal -> getAllCarac();
                            $this->population[] = $animal;
                     }
              return $this -> population;

       }

       public function addAnimal(Animal $animal) {
              $this -> population[] = $animal;
              $this -> setPopulationNumber($this->getPopulationNumber(),1);            
       }

       public function removeAnimal(){

              $this -> setPopulationNumber($this ->getPopulationNumber(),-1);
              array_splice($this -> getPopulation(), -1, 1);
       }

       public function clean(){
              if($this -> getCleanliness() === "mauvaise"){
                     $this -> setCleanliness('correcte');
              } else if ($this -> getCleanliness() === "corecte"){
                     $this -> setCleanliness('propre');
              }
              
       }


}    