<?php

namespace App\Http\Controllers;

use App\DataTables\Service_typeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateService_typeRequest;
use App\Http\Requests\UpdateService_typeRequest;
use App\Repositories\Service_typeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class Service_typeController extends AppBaseController
{
    /** @var  Service_typeRepository */
    private $serviceTypeRepository;

    public function __construct(Service_typeRepository $serviceTypeRepo)
    {
        $this->serviceTypeRepository = $serviceTypeRepo;
    }

    /**
     * Display a listing of the Service_type.
     *
     * @param Service_typeDataTable $serviceTypeDataTable
     * @return Response
     */
    public function index(Service_typeDataTable $serviceTypeDataTable)
    {
        return $serviceTypeDataTable->render('service_types.index');
    }

    /**
     * Show the form for creating a new Service_type.
     *
     * @return Response
     */
    public function create()
    {
        return view('service_types.create');
    }

    /**
     * Store a newly created Service_type in storage.
     *
     * @param CreateService_typeRequest $request
     *
     * @return Response
     */
    public function store(CreateService_typeRequest $request)
    {
        $input = $request->all();

        $serviceType = $this->serviceTypeRepository->create($input);

        Flash::success('Service Type saved successfully.');

        return redirect(route('serviceTypes.index'));
    }

    /**
     * Display the specified Service_type.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $serviceType = $this->serviceTypeRepository->find($id);

        if (empty($serviceType)) {
            Flash::error('Service Type not found');

            return redirect(route('serviceTypes.index'));
        }

        return view('service_types.show')->with('serviceType', $serviceType);
    }

    /**
     * Show the form for editing the specified Service_type.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $serviceType = $this->serviceTypeRepository->find($id);

        if (empty($serviceType)) {
            Flash::error('Service Type not found');

            return redirect(route('serviceTypes.index'));
        }

        return view('service_types.edit')->with('serviceType', $serviceType);
    }

    /**
     * Update the specified Service_type in storage.
     *
     * @param  int              $id
     * @param UpdateService_typeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateService_typeRequest $request)
    {
        $serviceType = $this->serviceTypeRepository->find($id);

        if (empty($serviceType)) {
            Flash::error('Service Type not found');

            return redirect(route('serviceTypes.index'));
        }

        $serviceType = $this->serviceTypeRepository->update($request->all(), $id);

        Flash::success('Service Type updated successfully.');

        return redirect(route('serviceTypes.index'));
    }

    /**
     * Remove the specified Service_type from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $serviceType = $this->serviceTypeRepository->find($id);

        if (empty($serviceType)) {
            Flash::error('Service Type not found');

            return redirect(route('serviceTypes.index'));
        }

        $this->serviceTypeRepository->delete($id);

        Flash::success('Service Type deleted successfully.');

        return redirect(route('serviceTypes.index'));
    }
}
