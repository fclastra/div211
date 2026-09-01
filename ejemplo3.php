<?php
function renombrarArchivo($archivo_original, $ruta_destino = null) {
    
    $extension = pathinfo($archivo_original, PATHINFO_EXTENSION);

    
    $nombre_unico = date("YmdHis") . "_" . rand(1000, 9999) . "." . $extension;

    
    if ($ruta_destino === null) {
        $ruta_destino = dirname($archivo_original);
    }

 
    $nueva_ruta = $ruta_destino . "/" . $nombre_unico;

    if (rename($archivo_original, $nueva_ruta)) {
        return $nueva_ruta; // Devolver la nueva ruta para futuras referencias
    } else {
        return false;
    }
}
?>