<?php
require_once('../config/db.php');
require_once('../config/autoload.php');



$animalManager = new AnimalManager($db);
$penManager = new PenManager($db);
$employeeManager = new EmployeeManager($db);


