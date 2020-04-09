<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateThanaRequest;
use App\Http\Requests\UpdateThanaRequest;
use App\Repositories\ThanaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ThanaController extends AppBaseController
{
    /** @var  ThanaRepository */
    private $thanaRepository;

    public function __construct(ThanaRepository $thanaRepo)
    {
        $this->thanaRepository = $thanaRepo;
    }

    /**
     * Display a listing of the Thana.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $thanas = $this->thanaRepository->all();

        return view('thanas.index')
            ->with('thanas', $thanas);
    }

    /**
     * Show the form for creating a new Thana.
     *
     * @return Response
     */
    public function create()
    {
        return view('thanas.create');
    }

    /**
     * Store a newly created Thana in storage.
     *
     * @param CreateThanaRequest $request
     *
     * @return Response
     */
    public function store(CreateThanaRequest $request)
    {
        $input = $request->all();

        $thana = $this->thanaRepository->create($input);

        Flash::success('Thana saved successfully.');

        return redirect(route('thanas.index'));
    }

    /**
     * Display the specified Thana.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $thana = $this->thanaRepository->find($id);

        if (empty($thana)) {
            Flash::error('Thana not found');

            return redirect(route('thanas.index'));
        }

        return view('thanas.show')->with('thana', $thana);
    }

    /**
     * Show the form for editing the specified Thana.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $thana = $this->thanaRepository->find($id);

        if (empty($thana)) {
            Flash::error('Thana not found');

            return redirect(route('thanas.index'));
        }

        return view('thanas.edit')->with('thana', $thana);
    }

    /**
     * Update the specified Thana in storage.
     *
     * @param int $id
     * @param UpdateThanaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateThanaRequest $request)
    {
        $thana = $this->thanaRepository->find($id);

        if (empty($thana)) {
            Flash::error('Thana not found');

            return redirect(route('thanas.index'));
        }

        $thana = $this->thanaRepository->update($request->all(), $id);

        Flash::success('Thana updated successfully.');

        return redirect(route('thanas.index'));
    }

    /**
     * Remove the specified Thana from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $thana = $this->thanaRepository->find($id);

        if (empty($thana)) {
            Flash::error('Thana not found');

            return redirect(route('thanas.index'));
        }

        $this->thanaRepository->delete($id);

        Flash::success('Thana deleted successfully.');

        return redirect(route('thanas.index'));
    }
}
