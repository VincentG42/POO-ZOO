<?php


class ZooManager{
    private PDO $db;

    private array $createdZoo = [];


    public function __construct(PDO $db) {
        $this->db = $db;
    }


        //creer un zoo en bdd
    public function addZoo( Zoo $zoo) : object {
        $request = $this ->db ->prepare("SELECT * FROM zoo WHERE name = :name");
        $request -> execute([
                    'name' => $zoo -> getname()
                    ]);
        $testZoo = $request ->fetch();

            if(!$testZoo){

                $request = $this->db->prepare("INSERT INTO zoo (name) VALUES (:name)");
                $request->execute([
                            'name' => $zoo-> getname()
                             ]);
                $id = $this->db->lastInsertId();
                $zoo-> setID($id);
            }

        return $zoo;
    }

     //recuperer la liste des zoo
     public function findAllZoo(){
            $zooList = [];
        $request = $this->db->query('SELECT * FROM zoo');
        $allZooDb = $request->fetchAll();
        // var_dump($allHeroesDb);
        foreach ($allZooDb as $zoo){
           
        $newZoo  = new Zoo ($zoo['name']);
        $newZoo -> setId($zoo['id']);  
        $zooList[] = $newZoo;     
           
        }

        return $zooList;


    }

    // recuperer un zoo selon id

    public function findZoo( int $id) : array{
        $request = $this -> db -> prepare ('SELECT * FROM zoo WHERE id = :id');
        $request ->execute ([
                    'id' => $id     
                ]);
        $zoo = $request -> fetch();

        return $zoo;

    }
    public function hydrateZoo(array $zoo) : Zoo {
        $newZoo = new Zoo ($zoo['name']);
        $newZoo -> setId($zoo['id']);

        return $newZoo;
    }


}

?>