<?php

namespace App\Http\Controllers;

use App\DataTables\OrderstatusDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrderstatusRequest;
use App\Http\Requests\UpdateOrderstatusRequest;
use App\Repositories\OrderstatusRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrderstatusController extends AppBaseController
{
    /** @var  OrderstatusRepository */
    private $orderstatusRepository;

    public function __construct(OrderstatusRepository $orderstatusRepo)
    {
        $this->orderstatusRepository = $orderstatusRepo;
    }

    /**
     * Display a listing of the Orderstatus.
     *
     * @param OrderstatusDataTable $orderstatusDataTable
     * @return Response
     */
    public function index(OrderstatusDataTable $orderstatusDataTable)
    {
        return $orderstatusDataTable->render('orderstatuses.index');
    }

    /**
     * Show the form for creating a new Orderstatus.
     *
     * @return Response
     */
    public function create()
    {
        return view('orderstatuses.create');
    }

    /**
     * Store a newly created Orderstatus in storage.
     *
     * @param CreateOrderstatusRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderstatusRequest $request)
    {
        $input = $request->all();

        $orderstatus = $this->orderstatusRepository->create($input);

        Flash::success('Orderstatus saved successfully.');

        return redirect(route('orderstatuses.index'));
    }

    /**
     * Display the specified Orderstatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $orderstatus = $this->orderstatusRepository->find($id);

        if (empty($orderstatus)) {
            Flash::error('Orderstatus not found');

            return redirect(route('orderstatuses.index'));
        }

        return view('orderstatuses.show')->with('orderstatus', $orderstatus);
    }

    /**
     * Show the form for editing the specified Orderstatus.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $orderstatus = $this->orderstatusRepository->find($id);

        if (empty($orderstatus)) {
            Flash::error('Orderstatus not found');

            return redirect(route('orderstatuses.index'));
        }

        return view('orderstatuses.edit')->with('orderstatus', $orderstatus);
    }

    /**
     * Update the specified Orderstatus in storage.
     *
     * @param  int              $id
     * @param UpdateOrderstatusRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderstatusRequest $request)
    {
        $orderstatus = $this->orderstatusRepository->find($id);

        if (empty($orderstatus)) {
            Flash::error('Orderstatus not found');

            return redirect(route('orderstatuses.index'));
        }

        $orderstatus = $this->orderstatusRepository->update($request->all(), $id);

        Flash::success('Orderstatus updated successfully.');

        return redirect(route('orderstatuses.index'));
    }

    /**
     * Remove the specified Orderstatus from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $orderstatus = $this->orderstatusRepository->find($id);

        if (empty($orderstatus)) {
            Flash::error('Orderstatus not found');

            return redirect(route('orderstatuses.index'));
        }

        $this->orderstatusRepository->delete($id);

        Flash::success('Orderstatus deleted successfully.');

        return redirect(route('orderstatuses.index'));
    }
}
