<?php
    include ("inventario.php");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-9vYreXUk4IO9PDxq5PaFGl1rCfpq3qd7TAoP3q6PcU3R/YkwF2p93iV+ZkLeG+L5MROG+jz57zuHHomX9dM4PQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <th colspan="10"><h1>Listado de Presupuestos de Mano de obra</h1></th>
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
<table>
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
            <th>ID</th>
            <th>Denominación</th>
            <th>Precio Unitario</th>
            <th>Cantidad de Horas</th>
            <th>Cantidad de Obreros</th>
            <th>Subtotal</th>
            <th>Total</th>
            </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["denominacion"] . "</td>";
                echo "<td>" . $row["precioUnitario"] . "</td>";
                echo "<td>" . $row["cantidadHoras"] . "</td>";
                echo "<td>" . $row["cantObreros"] . "</td>";
                echo "<td>" . $row["subtotal"] . "</td>";
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
 </table>   
    </br></br></br></br>
<footer>
     <!-- Enlaces a redes sociales -->
     <footer> 

<div class="social-link">
    <i class="fa-brands fa-facebook"></i>
    <i class="fa-brands fa-instagram"></i>
    <i class="fa-brands fa-linKedIn"></i>       

</div>
</footer>

</body>
</html>