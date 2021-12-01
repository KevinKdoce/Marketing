<?php include("./conexion.php");

$school = $_POST["getSchool"];

$query3 = "SELECT RBD, Dependencia, Comuna, Colegio FROM rbd WHERE RBD = '" . $school . "'";
$link3 = conexion::conecta();
$response3 = mysqli_query($link3, $query3);

if($rowRbd = mysqli_fetch_array($response3)) { ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div value="<?php echo $rowRbd["RBD"] ?>"><?php echo $rowRbd["RBD"] ?></div>
    <div value="<?php echo $rowRbd["Dependencia"] ?>"><?php echo $rowRbd["Dependencia"] ?></div>
    <div value="<?php echo $rowRbd["Comuna"] ?>"><?php echo $rowRbd["Comuna"] ?></div>
    <div value="<?php echo $rowRbd["Colegio"] ?>"><?php echo $rowRbd["Colegio"] ?></div>
</body>
</html>
        <?php }  ?>
