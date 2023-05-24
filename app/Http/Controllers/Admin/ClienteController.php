<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Customer\BulkDestroyCustomer;
use App\Http\Requests\Admin\Customer\DestroyCustomer;
use App\Http\Requests\Admin\Customer\IndexCustomer;
use App\Http\Requests\Admin\Customer\StoreCustomer;
use App\Http\Requests\Admin\Customer\UpdateCustomer;
use App\Models\Customer;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MiImportadorDeArchivos;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function importar(Request $request)
    {
        return view('admin.impression.importar');
    }


    public function insertar(Request $request)
    {
        //return "Evento insertar";
        {
            if ($request->hasFile('archivo_excel')) {
                $archivo = $request->file('archivo_excel');

                $datos = Excel::toCollection(new MiImportadorDeArchivos, $archivo);

                return view('admin.impression.mostrar', ['datos' => $datos]);
            }

            return redirect()->back()->with('error', 'Debe seleccionar un archivo para importar.');
        }
    }

    public function guardar(Request $request)
    {
        //return $request;

        $nombres = $request->input('nombre');
        $cis = $request->input('ci');
        $domicilios = $request->input('domicilio');
        $montos = $request->input('monto');
        $gastos = $request->input('gasto');
        $vtos = $request->input('vto');
        $vtos_formateados = [];

foreach ($vtos as $fecha_texto) {
    $fecha = Carbon::createFromFormat('d/m/Y', $fecha_texto);
    if ($fecha === false) {
        // Maneja el caso de una fecha inválida
        return redirect()->back()->with('error', 'La fecha ' . $fecha_texto . 'no es una fecha válida.');
    }
    $vtos_formateados[] = $fecha->format('Y-m-d H:i:s');
}

foreach ($nombres as $indice => $nombre) {
    $nuevoDato = new Customer();
    $nuevoDato->nombre = $nombre;
    $nuevoDato->ci = $cis[$indice];
    $nuevoDato->domicilio = $domicilios[$indice];
    $nuevoDato->monto = $montos[$indice];
    $nuevoDato->gasto = $gastos[$indice];
    $nuevoDato->vto = $vtos_formateados[$indice];
    $nuevoDato->save();
}
    //return "Los datos fueron guardados correctamente.";
    //return redirect()->route('importar')->with('success', 'Los datos fueron guardados correctamente.');
    return redirect()->route('importar')->with('message', 'Los datos de clientes fueron insertados correctamente');
    }
}
