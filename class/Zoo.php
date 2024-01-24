<?php

class Zoo{
    private string $name;

    private string $employee;

    private int $penNumberMax =6;

    protected array $pens;

    public function setName($name) : void{
        $this -> name = $name;
    }
    public function setEmployee($employee) : void{
        $this -> employee = $employee;
    }

    public function setPenNumberMax($penNumberMax) : void{
        $this -> penNumberMax = $penNumberMax;
    }

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
}
?>