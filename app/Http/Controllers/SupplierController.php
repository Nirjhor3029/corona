<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSupplierRequest;
use App\Http\Requests\UpdateSupplierRequest;
use App\Models\Service_type;
use App\Models\Supplier;
use App\Models\User;
use App\Repositories\SupplierRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $suppliers = Supplier::with('service_type','user')->get();
//        return $suppliers[0];
        //$users = User::all();
        //$service_types = Service_type::all();

        return view('suppliers.index',compact('users','service_types'))
            ->with('suppliers', $suppliers);
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
     * @param int $id
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

    /**
     * Show the form for editing the specified Supplier.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $supplier = Supplier::where('id',$id)
            ->with('service_type','user')
            ->first();

//        return $supplier;

        $users = User::whereNotIn('role', ['admin'])->get();
        $service_types = Service_type::all();

        if (empty($supplier)) {
            Flash::error('Supplier not found');
            return redirect(route('suppliers.index'));
        }
        return view('suppliers.edit',compact('service_types','users'))->with('supplier', $supplier);
    }

    /**
     * Update the specified Supplier in storage.
     *
     * @param int $id
     * @param UpdateSupplierRequest $request
     *
     * @return Response
     */
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

    /**
     * Remove the specified Supplier from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
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
