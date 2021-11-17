<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateapplicationformRequest;
use App\Http\Requests\UpdateapplicationformRequest;
use App\Repositories\applicationformRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class applicationformController extends AppBaseController
{
    /** @var  applicationformRepository */
    private $applicationformRepository;

    public function __construct(applicationformRepository $applicationformRepo)
    {
        $this->applicationformRepository = $applicationformRepo;
    }

    /**
     * Display a listing of the applicationform.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $applicationforms = $this->applicationformRepository->all();

        return view('applicationforms.index')
            ->with('applicationforms', $applicationforms);
    }

    /**
     * Show the form for creating a new applicationform.
     *
     * @return Response
     */
    public function create()
    {
        return view('applicationforms.create');
    }

    /**
     * Store a newly created applicationform in storage.
     *
     * @param CreateapplicationformRequest $request
     *
     * @return Response
     */
    public function store(CreateapplicationformRequest $request)
    {
        $input = $request->all();

        $applicationform = $this->applicationformRepository->create($input);

        Flash::success('Applicationform saved successfully.');

        return redirect(route('applicationforms.index'));
    }

    /**
     * Display the specified applicationform.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $applicationform = $this->applicationformRepository->find($id);

        if (empty($applicationform)) {
            Flash::error('Applicationform not found');

            return redirect(route('applicationforms.index'));
        }

        return view('applicationforms.show')->with('applicationform', $applicationform);
    }

    /**
     * Show the form for editing the specified applicationform.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $applicationform = $this->applicationformRepository->find($id);

        if (empty($applicationform)) {
            Flash::error('Applicationform not found');

            return redirect(route('applicationforms.index'));
        }

        return view('applicationforms.edit')->with('applicationform', $applicationform);
    }

    /**
     * Update the specified applicationform in storage.
     *
     * @param int $id
     * @param UpdateapplicationformRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateapplicationformRequest $request)
    {
        $applicationform = $this->applicationformRepository->find($id);

        if (empty($applicationform)) {
            Flash::error('Applicationform not found');

            return redirect(route('applicationforms.index'));
        }

        $applicationform = $this->applicationformRepository->update($request->all(), $id);

        Flash::success('Applicationform updated successfully.');

        return redirect(route('applicationforms.index'));
    }

    /**
     * Remove the specified applicationform from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $applicationform = $this->applicationformRepository->find($id);

        if (empty($applicationform)) {
            Flash::error('Applicationform not found');

            return redirect(route('applicationforms.index'));
        }

        $this->applicationformRepository->delete($id);

        Flash::success('Applicationform deleted successfully.');

        return redirect(route('applicationforms.index'));
    }
}
