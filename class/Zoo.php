<?php

class Zoo{

    private string $name;

    private int $employee;

    private int $penNumberMax =6;

    protected array $pens;

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

 
}
?>