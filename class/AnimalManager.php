<?php


class PenManager{
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

    public function createPen( array $animal) : void{

            $request = $this ->db ->prepare("SELECT * FROM animal WHERE name = :name");
            $request -> execute([
                        'name' => $animal['name']
                        ]);
            $testAnimal = $request ->fetch();
    
                if(!$testAnimal){
                    $request = $this->db->prepare("INSERT INTO pen (pen_id, name, age, height, weight, is_hungry, is_sick, is_awake, species, type) 
                                                    VALUES (:pen_id, :name, :age, :height, :weight, :is_hungry, :is_sick, :is_awake, :species :type)");
                    $request->execute([
                        'pen_id' => $animal['pen_id'], 
                        'name' => $animal['name'], 
                        'age' => $animal['age'],
                        'height' => $animal['height'],
                        'weight' => $animal['weight'],
                        'is_hungry' => $animal['is_hungry'],
                        'is_sick' => $animal['is_sick'],
                        'is_awake' => $animal['is_awake'],
                        'species' => $animal['species'],   
                        'type' => $animal['type']
               
                ]);
            }
        }




}