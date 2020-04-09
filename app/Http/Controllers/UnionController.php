<?php

namespace App\Http\Controllers;

use App\DataTables\UnionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUnionRequest;
use App\Http\Requests\UpdateUnionRequest;
use App\Repositories\UnionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UnionController extends AppBaseController
{
    /** @var  UnionRepository */
    private $unionRepository;

    public function __construct(UnionRepository $unionRepo)
    {
        $this->unionRepository = $unionRepo;
    }

    /**
     * Display a listing of the Union.
     *
     * @param UnionDataTable $unionDataTable
     * @return Response
     */
    public function index(UnionDataTable $unionDataTable)
    {
        return $unionDataTable->render('unions.index');
    }

    /**
     * Show the form for creating a new Union.
     *
     * @return Response
     */
    public function create()
    {
        return view('unions.create');
    }

    /**
     * Store a newly created Union in storage.
     *
     * @param CreateUnionRequest $request
     *
     * @return Response
     */
    public function store(CreateUnionRequest $request)
    {
        $input = $request->all();

        $union = $this->unionRepository->create($input);

        Flash::success('Union saved successfully.');

        return redirect(route('unions.index'));
    }

    /**
     * Display the specified Union.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $union = $this->unionRepository->find($id);

        if (empty($union)) {
            Flash::error('Union not found');

            return redirect(route('unions.index'));
        }

        return view('unions.show')->with('union', $union);
    }

    /**
     * Show the form for editing the specified Union.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $union = $this->unionRepository->find($id);

        if (empty($union)) {
            Flash::error('Union not found');

            return redirect(route('unions.index'));
        }

        return view('unions.edit')->with('union', $union);
    }

    /**
     * Update the specified Union in storage.
     *
     * @param  int              $id
     * @param UpdateUnionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnionRequest $request)
    {
        $union = $this->unionRepository->find($id);

        if (empty($union)) {
            Flash::error('Union not found');

            return redirect(route('unions.index'));
        }

        $union = $this->unionRepository->update($request->all(), $id);

        Flash::success('Union updated successfully.');

        return redirect(route('unions.index'));
    }

    /**
     * Remove the specified Union from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $union = $this->unionRepository->find($id);

        if (empty($union)) {
            Flash::error('Union not found');

            return redirect(route('unions.index'));
        }

        $this->unionRepository->delete($id);

        Flash::success('Union deleted successfully.');

        return redirect(route('unions.index'));
    }
}
