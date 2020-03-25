<?php

namespace App\Http\Controllers;

use App\DataTables\SupplierDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Repositories\SupplierRepository;
use App\Service_type;
use App\User;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SupplierController extends AppBaseController
{
    /** @var  SupplierRepository */
    private $supplierRepository;

    public function __construct(SupplierRepository $supplierRepo)
    {
        $this->supplierRepository = $supplierRepo;
    }

    /**
     * Display a listing of the Supplier.
     *
     * @param SupplierDataTable $supplierDataTable
     * @return Response
     */
    public function index(SupplierDataTable $supplierDataTable)
    {
        return $supplierDataTable->render('suppliers.index');
    }

    /**
     * Show the form for creating a new Supplier.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::where('role','0')->get();
        $service_types = Service_type::all();
//        return $service_types;

        return view('suppliers.create',compact('users','service_types'));
    }

    /**
     * Store a newly created Supplier in storage.
     *
     * @param CreateSupplierRequest $request
     *
     * @return Response
     */
    public function store(CreateSupplierRequest $request)
    {
        $input = $request->all();

        $supplier = $this->supplierRepository->create($input);

        Flash::success('Supplier saved successfully.');

        return redirect(route('suppliers.index'));
    }

    /**
     * Display the specified Supplier.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('suppliers.index'));
        }

        return view('suppliers.show')->with('supplier', $supplier);
    }


    public function edit($id)
    {
        $supplier = $this->supplierRepository->find($id);
        $users = User::all();
        $service_types = Service_type::all();

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('suppliers.index'));
        }

        return view('suppliers.edit',compact('service_types','users'))->with('supplier', $supplier);
    }


    public function update($id, UpdateSupplierRequest $request)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('suppliers.index'));
        }

        $supplier = $this->supplierRepository->update($request->all(), $id);

        Flash::success('Supplier updated successfully.');

        return redirect(route('suppliers.index'));
    }


    public function destroy($id)
    {
        $supplier = $this->supplierRepository->find($id);

        if (empty($supplier)) {
            Flash::error('Supplier not found');

            return redirect(route('suppliers.index'));
        }

        $this->supplierRepository->delete($id);

        Flash::success('Supplier deleted successfully.');

        return redirect(route('suppliers.index'));
    }
}
