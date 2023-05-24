<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Custumer\BulkDestroyCustumer;
use App\Http\Requests\Admin\Custumer\DestroyCustumer;
use App\Http\Requests\Admin\Custumer\IndexCustumer;
use App\Http\Requests\Admin\Custumer\StoreCustumer;
use App\Http\Requests\Admin\Custumer\UpdateCustumer;
use App\Models\Custumer;
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

class CustumersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCustumer $request
     * @return array|Factory|View
     */
    public function index(IndexCustumer $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Custumer::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            [''],

            // set columns to searchIn
            ['']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.custumer.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.custumer.create');

        return view('admin.custumer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCustumer $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCustumer $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Custumer
        $custumer = Custumer::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/custumers'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/custumers');
    }

    /**
     * Display the specified resource.
     *
     * @param Custumer $custumer
     * @throws AuthorizationException
     * @return void
     */
    public function show(Custumer $custumer)
    {
        $this->authorize('admin.custumer.show', $custumer);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Custumer $custumer
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Custumer $custumer)
    {
        $this->authorize('admin.custumer.edit', $custumer);


        return view('admin.custumer.edit', [
            'custumer' => $custumer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCustumer $request
     * @param Custumer $custumer
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCustumer $request, Custumer $custumer)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Custumer
        $custumer->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/custumers'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/custumers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCustumer $request
     * @param Custumer $custumer
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCustumer $request, Custumer $custumer)
    {
        $custumer->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCustumer $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCustumer $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Custumer::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
