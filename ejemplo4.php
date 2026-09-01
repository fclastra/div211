<?php
function renombrarArchivo2($archivo_original, $ruta_destino = null, &$contador = 1) {
   
    $extension = pathinfo($archivo_original, PATHINFO_EXTENSION);

    
    $nombre_unico = date("YmdHis") . "_" . $contador++ . "." . $extension;

    
    if ($ruta_destino === null) {
        $ruta_destino = dirname($archivo_original);
    }

    
    $nueva_ruta = $ruta_destino . "/" . $nombre_unico;

    if (rename($archivo_original, $nueva_ruta)) {
        return $nueva_ruta;
    } else {
        return false;
    }
}
?>