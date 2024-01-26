<?php

class EmployeeManager{
    private PDO $db;

    


    public function __construct(PDO $db) {
        $this->db = $db;
    }


    //creer un employe en bdd
    public function addEmployee(Employee $employee,  Zoo $zoo) : void
    {
        if(!$zoo){

            $zooId = $zoo->getId();
            
            $request = $this->db->prepare("SELECT * FROM employee WHERE zoo_id = :zoo_id");
            $request->execute([
                'zoo_id' => $zooId
            ]);
            $testEmployee = $request->fetch();
            
            if (!$testEmployee) {
                
                $request = $this->db->prepare("INSERT INTO employee (zoo_id, name, age, gender) VALUES (:zoo_id, :name, :age, :gender)");
                $request->execute([
                    'zoo_id' => $zooId,
                    'name' => $employee->getname(),
                    'age' => $employee->getAge(),
                    'gender' => $employee->getGender()
                ]);
            }
        }

                            
    }

     //recuperer l'employe du zoo'
     public function findEmployee($zooId) : array{
        
        $request = $this->db->prepare('SELECT * FROM employee Where zoo_id = :zoo_id ');
        $request ->execute([
                'zoo_id' => $zooId
        ]);
        $employeeDb = $request->fetch();

        return $employeeDb;
    }
  
    public function hydrateEmployee(array $employeeDb) :Employee{

            $zooEmployee  = new Employee ($employeeDb);
    
            return $zooEmployee ;
    }
           
           
}


    




?>