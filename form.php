
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
    $codigo=$_POST['codigo'];
    $denominacion=$_POST['denominacion'];
    $marca=$_POST['marca'];
    $modelo=$_POST['modelo'];
    $tipo = $_POST['tipo'];
    $proveedor = $_POST['proveedor'];
    $cantidad = $_POST['cantidad'];
    $precioUnitario = $_POST['precioUnitario'];
    $subtotal = $cantidad*$precioUnitario;
    $precioUnitarioCompra = $_POST['precioUnitarioCompra'];
    $cantidadAdquirida = $_POST['cantidadAdquirida'];
    $subtotalCompra = $precioUnitarioCompra*$cantidadAdquirida;
    $total = $subtotalCompra;

    // Insertar datos en la base de datos
    $sql = "INSERT INTO materiales (codigo,denominacion, marca,modelo,tipo,proveedor,cantidad,precioUnitario,subtotal,precioUnitarioCompra, cantidadAdquirida,subtotalCompra,total) 
    VALUES ('$codigo','$denominacion','$marca','$modelo','$tipo','$proveedor','$cantidad','$precioUnitario','$subtotal','$precioUnitarioCompra','$cantidadAdquirida','$subtotalCompra','$total')";

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