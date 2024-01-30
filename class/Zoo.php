<?php

class Zoo{

    private string $name;

    private int $employee;

    private int $penNumberMax =6;

    protected array $pens = [];

    private int $id;

    public function __construct(string $name )
    {
        $this -> name = $name;
    }

//setters
    public function setName($name) : void{
        $this -> name = $name;
    }
    public function setEmployee($employee) : void{
        $this -> employee = $employee;
    }

    public function setPenNumberMax($penNumberMax) : void{
        $this -> penNumberMax = $penNumberMax;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setPens(Pen $pen) : void
    {
        $this ->pens[] = $pen;
    }


    //getters
    public function getName() : string {
        return $this -> name;
    }

    public function getEmployee() : string {
        return $this -> employee;
    }

    public function getpenNumberMax() : int {
        return $this -> penNumberMax;
    }

    public function getPens() : array {
        return $this -> pens;
    }

    public function getId()
    {
        return $this->id;
    }

    //methods

    public function getPensContent() {
        foreach($this -> getPens()  as $pen){
            $pen -> getAllCarac();
        }
    }

    public function getTotalPopulation() : int {
        $totalPopulation = 0;
        foreach($this -> getPens()  as $pen){
            $totalPopulation += $pen -> getPopulationNumber();
        }

        return $totalPopulation;
    }

    public function main(){

        foreach ($this -> getPens()  as $pen){
            // random pen status
            $cleanliness = ['mauvaise', 'correcte', 'propre'];
            $pen -> setCleanliness($cleanliness[rand(0,2)]);

            if ($pen instanceof Aviary){
                $roofState = ['abîmé', 'en bon état'];
                $pen -> setRoofState($roofState[rand(0,1)]);
            }

            if ($pen instanceof Aquarium){
                $salinity = ['mauvaise', 'bonne'];
                $pen -> setSalinity($salinity[rand(0,1)]);
            }

            //random animal status
            foreach ($pen -> getPopulation() as $animal){
                $animal -> setIsSick(rand(0,1));
                $animal -> setISAwake(rand(0,1));
                $animal -> setIsHungry(rand(0,1));
            }
        }


    }
}
?>