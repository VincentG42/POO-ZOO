<?php

class Pen
{
       private string $name;

       private string $cleanliness;

       private int $populationNumber;

       private int $populationSpecies;

       private array $population;

       private int $foodPortion;


       //setters
       public function setName($name): void
       {
              $this->name = $name;
       }

       public function setFoodPortion(int $portion)
       {
              $this->foodPortion = $portion;
       }

       public function setCleanliness($cleanliness): void
       {
              $this->cleanliness = $cleanliness;
       }

       public function setPopulationNumber($population, $numberAdded)
       {
              $this->populationNumber =  $population +$numberAdded;
       }

       public function setPopulationSpecies($populationSpecies)
       {
              $this->populationSpecies = $populationSpecies;
       }

     


       //getters
       public function getName(): string
       {
              return $this->name;
       }
       
       public function getFoodPortion(): int
       {
              return $this->foodPortion;
       }
       
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
       
       
       //methode

       public function getAllCarac() :array { //afficher les caractéristiques de l'enclos
              $carac =['name' => $this->getName(), 
              'cleanliness' => $this -> getcleanliness(), 
              'populationSpecies' => $this -> getPopulationSpecies(),
              'populationNumber' =>  $this -> getPopulationNumber(),
              'foodPortion' => $this -> getFoodPortion()
              ];
       return $carac;

       }

       public function getPopulationCarac() : array{ //afficher les caractéristiques des animaux qu'il contient,
                     $populationCarac =[];
                     foreach($this -> getPopulation() as $animal){
                            $animal -> getAllCarac();
                            $populationCarac[] = $animal;
                     }
              return $populationCarac;

       }

       public function addAnimal(Animal $animal) {
              if ($this -> populationNumber>0 && $this ->populationNumber <6){
                     if ($animal -> getSpecies() === $this -> populationSpecies){
                            $this -> population[] = $animal;
                            $this -> setPopulationNumber($this->getPopulationNumber(),1);
                     }else {return 'Cet animal ne peux pas aller dans cet enclos';}

              } else if($this ->populationNumber <6){
                     $this -> setPopulationSpecies($animal -> getSpecies()); 
                     $this -> population[] = $animal;
                     $this -> setPopulationNumber($this->getPopulationNumber(),1);

              } else {
                     return $this ->getName()." est complet, impossible de rajouter un animal";
              }
       }

       public function removeAnimal(){
              $this -> setPopulationNumber($this->getPopulationNumber(),-1);
              array_slice($this -> getPopulation(), -1);

              if($this -> getPopulationNumber() === 0){
                            $this -> setPopulationSpecies("");
              }

       }

       public function clean(){
              if ($this -> getPopulationNumber() === 0){
                     $this -> setCleanliness('propre');
              }
       }

}