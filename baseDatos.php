<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Grupo Oeste</title>
    
</head>
<body>
    <?php
// Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "23112016Ian.";
    $dbname = "grupooeste";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Recuperar datos del formulario
    $id=$_POST['id'];
    $denominacion=$_POST['denominacion'];
    $precioUnitario=$_POST['precioUnitario'];
    $cantidadHoras=$_POST['cantidadHoras'];
    $cantObreros = $_POST['cantObreros'];
    $subtotal  = $precioUnitario * $cantidadHoras * $cantObreros;
    $total = (($subtotal*21)/100)+$subtotal;

    // Insertar datos en la base de datos
    $sql = "INSERT INTO mano_de_obra (id,denominacion, precioUnitario,cantidadHoras,cantObreros,subtotal,total) 
    VALUES ('$id','$denominacion', '$precioUnitario','$cantidadHoras','$cantObreros','$subtotal','$total')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
?>
</body>
</html>