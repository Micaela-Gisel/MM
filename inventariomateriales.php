<?php
    include ("conexionmateriales.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Grupo Oeste</title>
    <script src="https://kit.fontawesome.com/0a0ef2c2b8.js" crossorigin="anonymous"></script>
    
</head>
<body>

<header>
    <img src="Logo-sinFondo.png" alt="Logo de Mi Sitio">
    <nav>
        <ul>
            <li><a href="index.html">Inicio</a></li>
            <li><a href="materiales.html">Materiales</a></li>
            <li><a href="mano_de_obra.html">Mano de Obra</a></li>
            <li><a href="inventario2.php">Inventario Mano de Obra</a></li>
            <li><a href="inventariomateriales.php">Inventario Materiales</a></li>
        </ul>
    </nav>
</header>
<div class="gallery">
    <img src="Grupo-Oeste.png" alt="img muestra">
</div>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" >
        <table>
                <tr>
                <th colspan="10"><h1>Listado de Presupuestos de Materiales</h1></th>
                </tr>
                    <tr colspan="12"> <td>
                    <td>
                    <label > Ingrese el Codigo</label>
                    <input type="number" name="codigo"></input>
                       
                    </td>
                    <td>
                    <br>
                    <br>
                    <input type="submit" name="enviar" value="Buscar"></input>
                       
                    </td>
        </table>
</form>    
<section>
        <?php
        if (isset($_POST['enviar'])){
            $codigo= $_POST['codigo'];
            if (empty($_POST['codigo'])){
                echo "<script language= 'Javascript'>
                    alert('No se encuentra el código ingresado')
                    location.assign('inventario2.php');
                    </script>   ";
            }
        }
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>
            <th>Codigo</th>
            <th>Denominación</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Tipo</th>
            <th>Proveedor</th>
            <th>Cantidad</th>
            <th>P.Unit</th>
            <th>Subtotal</th>
            <th>P.Unit Fact.</th>
            <th>Cant.Adq</th>
            <th>Subtotal</th>
            <th>Total</th>
            </tr>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['codigo'] . "</td>";
                    echo "<td>" . $row["marca"] . "</td>";
                    echo "<td>" . $row["modelo"] . "</td>";
                    echo "<td>" . $row["tipo"] . "</td>";
                    echo "<td>" . $row["proveedor"] . "</td>";
                    echo "<td>" . $row["cantidad"] . "</td>";
                    echo "<td>" . $row["precioUnitario"] . "</td>";
                    echo "<td>" . $row["subtotal"] . "</td>";
                    echo "<td>" . $row["precioUnitarioCompra"] . "</td>";
                    echo "<td>" . $row["cantidadAdquirida"] . "</td>";
                    echo "<td>" . $row["subtotalCompra"] . "</td>";
                    echo "<td>" . $row["total"] . "</td>";
                    echo "</tr>";
                }

                 echo "</table>";
        } else {
            echo "No hay datos disponibles.";
        }

        // Cerrar la conexión
        $conn->close();
        ?>
   </section> 
   </br></br></br>
   <footer> 

<div class="social-link">
    <i class="fa-brands fa-facebook"></i>
    <i class="fa-brands fa-instagram"></i>
    <i class="fa-brands fa-linKedIn"></i>       

</div>

</body>
</html>