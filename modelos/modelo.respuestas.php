<?php
require_once('conexion.php');

class mdlRespuestas extends Conexion
{

   public function subirRespuestas($nombre, $apellido, $cuil, $telefono, $sangre, $peso, $talle, $uno, $dos, $tres, $cuatro, $cinco, $seis, $siete, $ocho, $nueve, $diez, $once, $doce, $trece, $catorce, $quince, $nombre_tutor, $dni_tutor, $telEmergencia, $centro_asistencial)
    {
        $sql = "INSERT INTO resultado (nombre, apellido, cuil, telefono, sangre, peso, talle, 
        uno, dos, tres, cuatro, cinco, seis, siete, ocho, nueve, diez, once, doce, trece, catorce, quince, 
        nombre_tutor, dni_tutor, telEmergencia, centro_asistencial)
        VALUES ('$nombre', '$apellido', '$cuil', '$telefono', '$sangre', '$peso', '$talle', 
        '$uno', '$dos', '$tres', '$cuatro', '$cinco', '$seis', '$siete', '$ocho', '$nueve', '$diez', '$once', '$doce', '$trece', '$catorce', '$quince',
        '$nombre_tutor', '$dni_tutor', '$telEmergencia', '$centro_asistencial')";
        // return $sql;
        try {
            $resultado = $this->conexion->query($sql);
            if ($resultado) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
