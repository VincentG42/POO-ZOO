<?php


class PenManager{
    private PDO $db;

    private array $penList = [];


    public function __construct(PDO $db) {
        $this->db = $db;
    }


    //check nombre d'enclos

    public function checkNumberPens(array $pen){

        $request = $this -> db -> prepare ("SELECT * FROM pen WHERE zoo_id = :zoo_id");
        $request ->execute([
            'zoo_id' => $pen['zoo_id']
        ]);

        $thisZooPens = $request -> fetchAll();

        return count($thisZooPens);


    }
    
    //inserer enclos en bdd sans doublon de nom

    public function createPen( array $pen) : void{

            $request = $this ->db ->prepare("SELECT * FROM pen WHERE name = :name");
            $request -> execute([
                        'name' => $pen['name']
                        ]);
            $testPen = $request ->fetch();
    
                if(!$testPen){
                    $request = $this->db->prepare("INSERT INTO pen (zoo_id, name, cleanliness,population_number, population_species, type) 
                                                    VALUES (:zoo_id, :name, :cleanliness, :population_number, :population_species, :type)");
                    $request->execute([
                        'zoo_id' => $pen['zoo_id'], 
                        'name' => $pen['name'], 
                        'cleanliness' => $pen['cleanliness'],
                        'population_number' => $pen['population_number'],
                        'population_species' => $pen['population_species'],
                        'type' => $pen['type']
               
                ]);
            }
        }

    //recuperer la liste des enclos d'un zoo

    public function findAllPens( int $zooId) : array{
           
        $request = $this->db->prepare('SELECT * FROM pen WHERE zoo_id = :zoo_id ');
        $request -> execute([
                    'zoo_id' => $zooId
                    ]);
        $allPensDb = $request->fetchAll();

        return $allPensDb;
    }

    public function hydratePens(array $pens) : array{

        foreach ($pens as $pen){
           
        $newPen  = new $pen['type'] ($pen);
       
    
        $this ->penList[] = $newPen;     
           
        }
        return $this ->penList;
    }




}




?>