<?php
require_once('config/db.php');
require_once('config/autoload.php');
include_once('partials/header.php');


$zooManager = new ZooManager($db);
$employeeManager = new EmployeeManager($db);


if(isset($_POST['zoo_name']) && !empty($_POST['zoo_name'])
&& isset($_POST['employee_name']) && !empty($_POST['employee_name'])
&& isset($_POST['employee_age']) && !empty($_POST['employee_age'])
&& isset($_POST['employee_gender']) && !empty($_POST['employee_gender']) ){
    $newZoo = $zooManager -> addZoo( new Zoo($_POST['zoo_name']));

    $dataEmployee = ['name' => $_POST['employee_name'],
                        'age' => $_POST['employee_age'],
                        'gender' => $_POST['employee_gender'],
                    ];
    // var_dump($newZoo);

    $employeeManager -> addEmployee(new Employee($dataEmployee), $newZoo);


    // var_dump( $zooManager -> findAllZoo());

}
?>




<div class="container-fluid g-0" id="main_page">
    <!-- form pour creation zoo -->
    <div id="create_zoo" class="row flex-column justify-content-center align-items-start text-center mx-3">
        <form action="" method="post" class= "col-4 my-2 w-25">
            <div class="">
                <label for="zoo_name" class="form-label"> Nom du zoo : </label>
                <input type="text" class="form-control" id="zoo_name" name ="zoo_name">

            </div>

            <label for="employee_name" class="form-label"> Nom de l'employé : </label>
            <input type="text" class="form-control" id="employee_name" name ="employee_name">

            <label for="employee_age" class="form-label"> Age de l'employé : </label>
            <input type="number" class="form-control" id="employee_age" name ="employee_age">

            <label for="employee_gender" class="form-label"> Genre de l'employé : </label>
            <input type="text" class="form-control" id="employee_gender" name ="employee_gender">


            <button type="submit" class="btn btn-success my-3">Créez votre zoo</button>

        </form>

    </div>


    <div id="zoo_list" class="p-3 row justify-content-between">
        <!-- affichage liste zoo exidtant en bdd -->
    <?php foreach ( $zooManager -> findAllZoo() as $zoo){ ?>

            <div class="zoo_card d-flex justify-content-center text-center col-4 my-2">
                <div class="col-4">
                    <h3><?=  $zoo -> getName() ?></h3>

                    <form action="zoo_main.php" method ="post">
                        <input type="hidden" name="zoo_id" value ="<?= $zoo ->getId()?>">
                        <button type="submit" class="btn btn-success my-3">Voir votre zoo</button>

                    </form>
                </div>
            </div>
    
    <?php } ?>
    </div>
</div>





<?php
include_once('partials/footer.php');


?>