<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../hoja.css">

</head>
<body>
<?php
// Importa los archivos pertinentes para conectar con la BBDD y poder utilizar sus variables
  require_once("Controller/personas_Controller.php"); 
  require("Model/paginacion.php");

  // INSERTAR REGISTROS -------------------
  if(isset($_POST["cr"])){ //Si se ha pulsado el boton insertar
    $nombre = $_POST["Nom"];
    $apellido = $_POST["Ape"];
    $direccion = $_POST["Dir"];
    // Instruccion SQL para insertar los valores nuevos
    $sql="INSERT INTO DATOS_USUARIOS (NOMBRE, APELLIDO, DIRECCION) VALUES (:nom, :ape, :dir)";
    // preparamos los datos para evitar inyecciones SQL
    $resultado = $base->prepare($sql);
    $resultado->execute(array(":nom"=>$nombre, ":ape"=>$apellido, ":dir"=>$direccion));
    // hacemos que se dirija a esta misma pagina para que actualice la página con los nuevo datos insertados
    header("location:index.php");
}

// FIN INSERTAR REGISTROS --------------


?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
  <table width="50%">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="primera_fila">Dirección</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
    <tr>
      <td></td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name='Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
    </tr>    

		<?php 
      foreach($matrizPersonas as $registro): ?>
   	<tr>
     <td><?php echo $registro['ID']?></td>
      <td><?php echo $registro['NOMBRE']?></td>
      <td><?php echo $registro['APELLIDO']?></td>
      <td><?php echo $registro['DIRECCION']?></td>
      <td class="bot">
        <a href="Model/borrar.php?id=<?php echo $registro['ID']?>" onclick="return confirmarBorrado(<?php echo $registro['ID']?>);">
        <input type='button' name='del' id='del' value='Borrar'></a>
      </td>
      <td class='bot'>
        <a href="Model/editar.php?id=<?php echo $registro['ID']?> & nom=<?php echo $registro['NOMBRE']?> & ape=<?php echo $registro['APELLIDO']?> & dir=<?php echo $registro['DIRECCION']?>">
        <input type='button' name='up' id='up' value='Actualizar'>
      </a>
      </td>
    </tr>
    <?php
    endforeach
    ?>

    <tr>
      <td colspan="4" class="paginacion"><!-- -------------------------PAGINACION-------------------- -->
        <?php
          // Imprime y asigna los links a cada una de la paginas que hay
          echo "Paginas: ";
          for($i=1; $i<=$totalPaginas; $i++){
              echo "<a href='?paginaActual=" . $i . "'>" . $i . "</a> &nbsp &nbsp";
          }
        ?>
      </td>
    </tr>

  </table>
</form>

<!-- Ventana emergente para confirmar borrado de registro -->
<script>
function confirmarBorrado(id) {
  return confirm("¿Estás seguro de que deseas borrar el registro con Id: " + id + "?");
}
</script>

</body>
</html>