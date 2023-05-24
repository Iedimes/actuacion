<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Impression\BulkDestroyImpression;
use App\Http\Requests\Admin\Impression\DestroyImpression;
use App\Http\Requests\Admin\Impression\IndexImpression;
use App\Http\Requests\Admin\Impression\StoreImpression;
use App\Http\Requests\Admin\Impression\UpdateImpression;
use App\Models\Impression;
use App\Models\Document;
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
use PDF;

class HomeController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        $documentTypes=Document::all();
        $customers=Customer::all();

        return view('admin.impression.impresion', compact('documentTypes', 'customers'));

    }
    public function pdf()
{
    // $document_type = $request->input('document_type');
    // $customers = $request->input('customers');

    $pdf = PDF::loadView('pdf.test'); //Genera el documento PDF
    $pdf->stream('Oikoma.pdf'); //Descarga el documento con un nombre de archivo personalizado


    }
}

