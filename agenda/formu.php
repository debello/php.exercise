<?php

    if (!empty($_POST['nombre']) && !empty($_POST['telf'])) { // Si hemos introducido un valor en la casilla...

        
        foreach ($_POST as $k => $v) { // Metemos los valores de nuestros $_Post (inicialmente son 2) en $array
            $array1[] = $v; // Deberíamos tener 2 valores: El introducido y el de por defecto Submit(Enviar)
        }
        $countArray = count($array1);
        for ($i = 0; $i < $countArray; $i++){
            if ($i % 2 === 0) {
                $arrayNames[] = $array1[$i];
            }
            else {
                $arrayNumbers[] = $array1[$i];
            }
        }

        $arrayEnd = array_combine($arrayNames, $arrayNumbers);
        foreach ($arrayEnd as $k => $v) {
            echo "$k to $v, <br>";
        }
    }

    else { // Recién entremos en la página. 
        echo "POST personas is NOT set"; // Carga el array vacío para que simplemente el código no de problemas.
        $array1 = [];
        $arrayEnd = [];
        
    }




?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<h3>AGENDA</h3>



    <form action="" method="POST">

        <p>Introduzca un Nombre</p>
        <input type="text" name="nombre"/><br>
        <input type="text" name="telf"/><br>
        <input type="submit" />
        
    <?php
    
    print_r($array1);
        

    //Contador de cantidad de $_POST que tenemos. Empezamos por 2 y queremos que la cantidad sea 1 (Por eso le restamos 1).
    $numGets = (count($_POST)) * 0.5 + 1; 
    $numGets1 = $numGets - 1;

print_r($numGets);
    /**
    Nuestra estrategia es;

        Introducir una variable > El contador de $_POST crece una unidad > Nos permite crear un <input hidden $_POST 
            Lo creamos automáticamente > Vuelta al inicio.
                . 

    0 Parámetros introducidos > 0 cantidad de $_POST
    1 Parámetro introducido > 1 cantidad de $_POST (restaríamos el $_POST de Submit)
    2 Parámetros introducidos > 2 cantidad de $_POST
    ....

    */


    $a = 0;
    $b = 1;

    for ($i = 0; $i < $numGets1; $i++) { // Crearemos inputs "hidden" cada vez que introduzcamos un valor(aumentemos en uno la cantidad de $_POST[])
        if ($i === 0) { // Empezamos enlazando la caja de texto con nuestro primer hidden
                        // name = person0 value = $POST 'nombre'
            echo "<input type='hidden'" . 
                "name='person$i'".
                "value='" . $_POST['nombre'] . "' />";
            
            echo "<input type='hidden'" . 
                "name='telf$i'".
                "value='" . $_POST['telf'] . "' />";
        }

        else { // Seguiremos creando hidden con la misma suceción
                // name = person1 value = $POST 'person0'
                // name = person2 value = $POST 'person1'....
            
            $persone = "person$a";     
            echo "<input type='hidden'" . 
            "name='person$b'".
            "value='" . $_POST[$persone] . "' />";
            
            $telfe = "telf$a";     
            echo "<input type='hidden'" . 
            "name='telf$b'".
            "value='" . $_POST[$telfe] . "' />";
            
            $a++;
            $b++;              
        }
    }   

echo "<table id='test' border='1' align='center'>";
echo "<tr>
        <th>Nombre</th>
        <th>Telefono</th>
      <tr>";

    foreach ($arrayEnd as $k => $v) {
        echo "<tr><td>$k</td><td>$v</td></tr>";
    
    }

echo "</table>";

        
        ?>
    
    
    </form>


<?php
/** Ejemplo conceptual simple usando poco PHP - Guarda 5 (+1) Parámetros diferentes.

    <input type="hidden" name="personas" value="<?php echo  $_POST['nombre']; ?>" />
    <input type="hidden" name="personas1" value="<?php echo $_POST['personas']; ?>" />
    <input type="hidden" name="personas2" value="<?php echo $_POST['personas1']; ?>" />
    <input type="hidden" name="personas3" value="<?php echo $_POST['personas2']; ?>" />
    <input type="hidden" name="personas4" value="<?php echo $_POST['personas3']; ?>" />
    */

?>
</body>
</html>


