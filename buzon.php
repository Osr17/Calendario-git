<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buzón de sugerencias</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <label>Nombre</label>
        <input type="text" name="nombre" value="">
        <label>Correo</label>
        <input type="mail" name="correo" value="">
        <label>Sugerencia</label>
        <textarea name="texto"></textarea>
        <input type="submit" name="enviar" value="Enviar">
    </form>
    
<?php
    if(isset($_POST['enviar']) && isset($_POST['texto']) && isset($_POST['nombre']) && isset($_POST['correo'])){
    $enviar=$_POST['enviar'];
    $texto=$_POST['texto'];
    $nombre=$_POST['nombre'];
    $correo=$_POST['correo'];
    $enlace=fopen("buzon.txt","a");    
    if(!empty($enlace)){
        $contenido=PHP_EOL.$nombre.PHP_EOL.$correo.PHP_EOL.$texto.PHP_EOL;
        //echo $contenido;
        fwrite($enlace,$contenido);
        fclose($enlace);
    }
    /*else{
        echo "El archivo no se puede abrir";
    }*/
    }
    
    $enlace=fopen("buzon.txt","r"); //leer archivos
    $contenido=fread($enlace,filesize("buzon.txt")); 
    echo $contenido;
?>
</body>
</html>