<?php
require_once('config/db.php');
require_once('config/autoload.php');

$animalManager = new AnimalManager($db);
$penManager = new PenManager($db);
$employeeManager = new EmployeeManager($db);

$curreentEmployee = $_SESSION['employee'];



if(isset($_POST['heal']) && !empty($_POST['heal'])
    && isset($_POST['animal_id']) && !empty($_POST['animal_id'])){
        

}