<?php

namespace App\Http\Controllers\Admin;

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
use Illuminate\Http\Request;
use PDF;

class ImpressionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexImpression $request
     * @return array|Factory|View
     */
    public function index(IndexImpression $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Impression::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'doc_id', 'cli_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.impression.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.impression.create');
        $documentTypes=Document::all();
        $customers=Customer::all();

        return view('admin.impression.create', compact('documentTypes', 'customers'));
    }


    public function pdf(Request $request)
    {
        $request;

        $rules = [
            'doc_id' => 'required',
            'customers' => 'required',
        ];

        $messages = [
            'doc_id.required' => 'Debe cargar el tipo de documento.',
            'customers.required' => 'Debe cargar por lo menos un cliente.',
        ];

        $this->validate($request, $rules, $messages);
        //return "PDF";
        $doc_id = $request->input('doc_id');
        $customers = $request->input('customers');
        $doc_type = Document::findOrFail($doc_id);
//Pisa la ultima version
        // foreach ($customers as $customer_id) {
        //     $customer = Customer::findOrFail($customer_id);

        //     $pdf = PDF::loadView('pdf.document', ['customer' => $customer, 'doc_type' => $doc_type]);
        //     $pdf->save(storage_path('app/pdf/' . $doc_type->descripcion . '-' . $customer->nombre . '.pdf'));
        // }

        //Conserva lo que ya estaba creado
        // foreach ($customers as $customer_id) {
        //     $customer = Customer::findOrFail($customer_id);

        //     $filename = storage_path('app/pdf/' . $doc_type->descripcion . '-' . $customer->nombre . '.pdf');

        //     if (!file_exists($filename)) {
        //         $pdf = PDF::loadView('pdf.document', ['customer' => $customer, 'doc_type' => $doc_type]);
        //         $pdf->save($filename);
        //     }
        // }

        // return redirect()->back()->with('message', 'Los PDFs se han generado correctamente');

        //Va agregando nro a las versiones si es que ya existe el archivo

        foreach ($customers as $customer_id) {
            $customer = Customer::findOrFail($customer_id);

            $filename = storage_path('app/pdf/' . $doc_type->descripcion . '-' . $customer->nombre . '.pdf');

            $i = 1;
            while (file_exists($filename)) {
                $filename = storage_path('app/pdf/' . $doc_type->descripcion . '-' . $customer->nombre . '-' . $i . '.pdf');
                $i++;
            }

            $pdf = PDF::loadView('pdf.document', ['customer' => $customer, 'doc_type' => $doc_type]);
            $pdf->save($filename);
        }

        return redirect()->back()->with('message', 'Los PDFs se han generado correctamente');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreImpression $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreImpression $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Impression
        $impression = Impression::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/impressions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/impressions');
    }

    /**
     * Display the specified resource.
     *
     * @param Impression $impression
     * @throws AuthorizationException
     * @return void
     */
    public function show(Impression $impression)
    {
        $this->authorize('admin.impression.show', $impression);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Impression $impression
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Impression $impression)
    {
        $this->authorize('admin.impression.edit', $impression);


        return view('admin.impression.edit', [
            'impression' => $impression,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateImpression $request
     * @param Impression $impression
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateImpression $request, Impression $impression)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Impression
        $impression->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/impressions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/impressions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyImpression $request
     * @param Impression $impression
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyImpression $request, Impression $impression)
    {
        $impression->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyImpression $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyImpression $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Impression::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
