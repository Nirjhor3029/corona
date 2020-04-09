<?php

namespace App\Http\Controllers;

use App\DataTables\UpazillaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUpazillaRequest;
use App\Http\Requests\UpdateUpazillaRequest;
use App\Repositories\UpazillaRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UpazillaController extends AppBaseController
{
    /** @var  UpazillaRepository */
    private $upazillaRepository;

    public function __construct(UpazillaRepository $upazillaRepo)
    {
        $this->upazillaRepository = $upazillaRepo;
    }

    /**
     * Display a listing of the Upazilla.
     *
     * @param UpazillaDataTable $upazillaDataTable
     * @return Response
     */
    public function index(UpazillaDataTable $upazillaDataTable)
    {
        return $upazillaDataTable->render('upazillas.index');
    }

    /**
     * Show the form for creating a new Upazilla.
     *
     * @return Response
     */
    public function create()
    {
        return view('upazillas.create');
    }

    /**
     * Store a newly created Upazilla in storage.
     *
     * @param CreateUpazillaRequest $request
     *
     * @return Response
     */
    public function store(CreateUpazillaRequest $request)
    {
        $input = $request->all();

        $upazilla = $this->upazillaRepository->create($input);

        Flash::success('Upazilla saved successfully.');

        return redirect(route('upazillas.index'));
    }

    /**
     * Display the specified Upazilla.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $upazilla = $this->upazillaRepository->find($id);

        if (empty($upazilla)) {
            Flash::error('Upazilla not found');

            return redirect(route('upazillas.index'));
        }

        return view('upazillas.show')->with('upazilla', $upazilla);
    }

    /**
     * Show the form for editing the specified Upazilla.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $upazilla = $this->upazillaRepository->find($id);

        if (empty($upazilla)) {
            Flash::error('Upazilla not found');

            return redirect(route('upazillas.index'));
        }

        return view('upazillas.edit')->with('upazilla', $upazilla);
    }

    /**
     * Update the specified Upazilla in storage.
     *
     * @param  int              $id
     * @param UpdateUpazillaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUpazillaRequest $request)
    {
        $upazilla = $this->upazillaRepository->find($id);

        if (empty($upazilla)) {
            Flash::error('Upazilla not found');

            return redirect(route('upazillas.index'));
        }

        $upazilla = $this->upazillaRepository->update($request->all(), $id);

        Flash::success('Upazilla updated successfully.');

        return redirect(route('upazillas.index'));
    }

    /**
     * Remove the specified Upazilla from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $upazilla = $this->upazillaRepository->find($id);

        if (empty($upazilla)) {
            Flash::error('Upazilla not found');

            return redirect(route('upazillas.index'));
        }

        $this->upazillaRepository->delete($id);

        Flash::success('Upazilla deleted successfully.');

        return redirect(route('upazillas.index'));
    }
}
