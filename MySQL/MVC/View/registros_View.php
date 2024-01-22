<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td, th{
            border: 1px dotted red;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    
<table>

<tr><th>DETALLE</th></tr>
<?php
    foreach($matrizRegistros as $apunte){
        echo "<tr><td>" . $apunte['DETALLE'] . "</td></tr>";
    }

    echo "</table>";

?>
</body>
</html>