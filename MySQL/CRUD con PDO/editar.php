<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php
  include("conexion.php");

if(!isset($_POST["bot_actualizar"])){ // si NO se ha pulsado el boton de actualizar se ejecutaria este codigo

  $id= $_GET["id"];
  $nombre= $_GET["nom"];
  $apellido= $_GET["ape"];
  $direccion= $_GET["dir"];

}else{ // SI se ha pulsado el boton actualizar recogemos los valores con $_POST

  $id= $_POST["id"];
  $nombre= $_POST["nom"];
  $apellido= $_POST["ape"];
  $direccion= $_POST["dir"];

  // Instruccion SQL para actualizar los campos con los valores actuales
  $sql = "UPDATE DATOS_USUARIOS SET NOMBRE =:miNom, APELLIDO =:miApe, DIRECCION =:miDir WHERE id =:miId";
  // preparacion de la consulta para evitar inyecciones SQL
  $resultado = $base->prepare($sql);
  // Ejecuccion de la consulta SQL y asociacion marcadores a las variables
  $resultado->execute(array(":miId"=>$id, ":miNom"=>$nombre, ":miApe"=>$apellido, ":miDir"=>$direccion));

  // despues de realizar la actualizacion nos redirigira al index donde nos mostra todos los registros incluidos los actualizados
  header("location:index.php");

}
?>
<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <table width="25%">
    <tr>
      <td>ID</td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $id ?>"><?php echo $id ?></td>
    </tr>
    <tr>
      <td>Nombre</td>
      <td><label for="nom"></label>
      <input type="text" name="nom" id="nom" value="<?php echo $nombre ?>"></td>
    </tr>
    <tr>
      <td>Apellido</td>
      <td><label for="ape"></label>
      <input type="text" name="ape" id="ape" value="<?php echo $apellido ?>"></td>
    </tr>
    <tr>
      <td>Dirección</td>
      <td><label for="dir"></label>
      <input type="text" name="dir" id="dir" value="<?php echo $direccion ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>