<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class MiImportadorDeArchivos implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($rows as $row) {
            $NOMBRE = $row[0];
            $CI = $row[1];
            $DOMICILIO = $row[2];
            $MONTO = $row[3];
            $GASTO = $row[4];
            $VTO = $row[5];

            // Aquí puedes hacer lo que necesites con los datos de cada fila, como por ejemplo:
            // Crear un nuevo registro en la base de datos con los valores de $nombre y $correo
        }
    }
}
