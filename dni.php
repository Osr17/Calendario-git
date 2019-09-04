<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Club de socios</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <label>DNI socios</label>
    <input type="text" name="dni" value="" maxlength="9">
    <input type="submit" name="enviar" value="Enviar">
    </form>
<?php

    if(isset($_POST['enviar']) && isset($_POST['dni'])){
        $dni=$_POST['dni'];
        $archivo=fopen("dni.txt","r");
        $contenido=fread($archivo,filesize("dni.txt"));
        //$contenido=explode(",",$contenido);
        fclose($archivo);
        $posicion=strpos($contenido,$dni);
        
        if($posicion===false){
            echo "No es socio del club";
            
        }
        else{
            echo "Es socio del club";
            echo "¿Quieres ceder tu plaza?";
            echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
            echo "<input type='submit' name='ceder' value='Si'>";
            echo "</form>";
        }
        
    }
    
    if(isset($_POST['ceder'])){
            echo "<form action='".$_SERVER['PHP_SELF']."' method='post'>";
            echo "<label>DNI Socio</label>";
            echo "<input type='text' name='dni_socio' value='' maxlength='9'>";
            echo "<label>DNI nuevo</label>";
            echo "<input type='text' name='dni_nuevo' value='' maxlength='9'>";
            echo "<input type='submit' name='cambiar' value='Ceder'>";
            echo "</form>";
            }
      if(isset($_POST['cambiar']) && isset($_POST['dni_socio']) && isset($_POST['dni_nuevo'])){
          
          $dni_socio=$_POST['dni_socio'];
          $dni_nuevo=$_POST['dni_nuevo'];
          $archivo=fopen("dni.txt","r");
          $contenido=fread($archivo,filesize("dni.txt"));
          //$contenido=explode(",",$contenido);
          fclose($archivo);
          $posicion=strpos($contenido,$dni_socio);
          
          if($posicion===false){
              echo "Tu no eres socio";
          }
          else{
              $archivo=fopen("dni.txt","c+");
              fseek($archivo,$posicion);
              fwrite($archivo,$dni_nuevo);
              fclose($archivo);
              echo "DNI reemplazado";
          }
                
            }
         
                
        

    
    
    
?>



</body>
</html>


