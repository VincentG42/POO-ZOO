<?php


class AnimalManager{
    private PDO $db;





    public function __construct(PDO $db) {
        $this->db = $db;
    }

    //check nombre danimal dans enclos

    public function checkNumberAnimals(array $animal) : int {

        $request = $this -> db -> prepare ("SELECT * FROM animal WHERE pen_id = :pen_id");
        $request ->execute([
            'pen_id' => $animal['pen_id']
        ]);

        $numberAnimal = $request -> fetchAll();

        return count($numberAnimal);
    }

    
    //inserer enclos en bdd sans doublon de nom

    public function createAnimal( array $animal) : void{

                $request = $this->db->prepare("INSERT INTO animal (pen_id, age, height, weight, is_hungry, is_sick, is_awake, species) 
                                                    VALUES (:pen_id, :age, :height, :weight, :is_hungry, :is_sick, :is_awake, :species)");
                $request->execute([
                        'pen_id' => $animal['pen_id'], 
                        'age' => $animal['age'],
                        'height' => $animal['height'],
                        'weight' => $animal['weight'],
                        'is_hungry' => $animal['is_hungry'],
                        'is_sick' => $animal['is_sick'],
                        'is_awake' => $animal['is_awake'],
                        'species' => $animal['species']

                ]);


            
    }

    public function findAllAnimals(int $penId) : array{
        $request = $this -> db -> prepare ("SELECT * FROM animal WHERE pen_id = :pen_id");
        $request ->execute([
            'pen_id' => $penId
        ]);
        $allAnimalsInPen = $request ->fetchAll();
        return $allAnimalsInPen;

    }

    public function hydrateAllAnimals (array $allAnimalsInPen, Pen $pen){
        foreach ($allAnimalsInPen  as $animal){
            $data=[ 'species' => $animal['species'],
                    'age' => $animal['age'],
                    'height' => $animal['height'],
                    'weight' => $animal['weight'],
                    'isHungry' => $animal['is_hungry'],
                    'isAwake' => $animal['is_awake'],
                    'isSick' => $animal['is_sick'],
                    'id' => $animal['id']
            ];
            
            $newAnimal = new $data['species']($data);
            $newAnimal -> setId($data['id']);
            $pen -> setPopulation($newAnimal);
            $pen -> setPopulationNumber($pen -> getPopulationNumber(), 1);
            $pen ->setPopulationSpecies($newAnimal -> getSpecies());

        }
    }

    public function deleteAnimal($animalId){

        $request  =  $this ->db -> prepare ("DELETE FROM animal WHERE id= :id");
        $request->execute([
            'id' => $animalId
        ]);
    }


}