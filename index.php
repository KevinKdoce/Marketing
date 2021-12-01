<?php include("./conexion.php");

$code = $_GET['rbd'];
$valor = $_POST["getSchool"];

$query1 = "SELECT DISTINCT Comuna FROM rbd";
$link1 = conexion::conecta();
$response1 = mysqli_query($link1, $query1);

$query2 = "SELECT * FROM rbd";
$link2 = conexion::conecta();
$response2 = mysqli_query($link2, $query2);

if (mysqli_num_rows($response2) > 0) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>

        <script src="./jquery-3.5.1.js"></script>
        <script src="./bower_components/select2/dist/js/select2.min.js"></script>
    </head>

    <body>
        <h1>RBD</h1>

        <form action="verifyCollege.php" method="POST" id="formInformation">
            <label for="">Ingresa RBD o Colegio</label>

            <input type="text" list="js-example-basic-single" name="getSchool" id="getSchool">
            <datalist id="js-example-basic-single">
                <?php

                $query3 = "SELECT RBD, Dependencia, Comuna, Colegio FROM rbd WHERE RBD = '" . $code . "'";
                $link3 = conexion::conecta();
                $response3 = mysqli_query($link3, $query3);

                while($row = mysqli_fetch_row($response3)){

                    $colleges = array();
                    $rbd = $row[0];
                    $dependencia = $row[1];
                    $comuna = $row[2];
                    $colegio = $row[3];
    
                    $colleges[] = array('RBD' => $rbd, 'Dependencia' => $dependencia, 'Comuna' => $comuna, 'Colegio' => $colegio);
                }

                while ($rowRbd = mysqli_fetch_array($response2)) {
                ?>
                    <option value="<?php echo $rowRbd["RBD"] ?>" name="<?php echo $rowRbd["Colegio"] ?>" id="rbd">
                        RBD: <?php echo $rowRbd["RBD"] ?> -
                        Colegio: <?php echo $rowRbd["Colegio"] ?></div>
                    </option>
                <?php } ?>
            </datalist>
            <p><?php echo $valor ?></p>
            <button type="submit" id="sendData">Verificar Colegio</button>

        </form>

        <script src="./app.js"></script>
    </body>

    </html>

<?php
}
?>