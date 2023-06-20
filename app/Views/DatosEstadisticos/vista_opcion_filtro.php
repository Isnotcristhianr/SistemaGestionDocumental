<?php 
if (isset($_GET['busquedaDatEst'])) {
    $valor_checkbox = $_GET['busquedaDatEst'];
    echo "El valor de la casilla de verificación es: " . $valor_checkbox;
} else {
    echo "La casilla de verificación no ha sido seleccionada.";
}

?>