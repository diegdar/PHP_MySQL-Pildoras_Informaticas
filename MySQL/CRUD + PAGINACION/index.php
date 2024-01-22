<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>
<body>
<?php
  include("conexion.php");
  // ------------------PAGINACION------------------------------
  $numRegistrosPagina = 3;
  // Solo ejecutará este codigo si '$_GET["paginaActual"]' ha sido inicializada (osea si el usuario le ha dado click a uno de los links de pagina)
  if(isset($_GET["paginaActual"])){
    if($_GET["paginaActual"]==1){
      header("Location:index.php");
    }else{
      $paginaActual=$_GET["paginaActual"];
    }
  }else{ // En caso contrario la paginaActual sera la 1ra
    $paginaActual= 1;
  }
  $empezarDesde = ($paginaActual - 1) * $numRegistrosPagina;
  // Consulta SQL solo para saber el numero de registros totales
  $sql_total = "SELECT * FROM DATOS_USUARIOS";
  // Preparacion consulta
  $resultado = $base->prepare($sql_total);
  // Ejecucion consulta
  $resultado->execute(); 
  // Obtiene el numero de registros que tiene la consulta
  $numFilas = $resultado->rowCount();
  // Obtiene el numero total de paginas
  $totalPaginas = ceil($numFilas / $numRegistrosPagina);
  $registros = $base->query("SELECT * FROM DATOS_USUARIOS LIMIT $empezarDesde, $numRegistrosPagina")->fetchAll(PDO::FETCH_ASSOC);
  // ----------- ----------------------------
  
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
?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
  <table width="50%">
    <tr>
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
      <td><input type='text' name=' Dir' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
    </tr>    
    <?php 
      foreach($registros as $registro): ?>
    <tr>
      <td><?php echo $registro['ID']?></td>
      <td><?php echo $registro['NOMBRE']?></td>
      <td><?php echo $registro['APELLIDO']?></td>
      <td><?php echo $registro['DIRECCION']?></td>
      <td class="bot">
        <a href="borrar.php?id=<?php echo $registro['ID']?>" onclick="return confirmarBorrado(<?php echo $registro['ID']?>);">
        <input type='button' name='del' id='del' value='Borrar'></a>
      </td>
      <td class='bot'>
        <a href="editar.php?id=<?php echo $registro['ID']?> & nom=<?php echo $registro['NOMBRE']?> & ape=<?php echo $registro['APELLIDO']?> & dir=<?php echo $registro['DIRECCION']?>">
        <input type='button' name='up' id='up' value='Actualizar'></a>
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

<p>&nbsp;</p>
</body>
</html>