<?php

namespace CodeProject\Http\Controllers;



use CodeProject\Repositories\ProjectNoteRepository;
use CodeProject\Services\ProjectNoteService;
use Illuminate\Http\Request;




class ProjectNoteController extends Controller{


    /**
     * @var ProjectNoteService
     */
    private $service;

    /**
     * @var ProjectNoteRepository
     */
    private $repository;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service){
        $this->repository = $repository;
        $this->service= $service;
    }

    public function index($id){

        //return \CodeProject\Entities\Client::all();
        //return $this->repository->all();
        return $this->repository->findWhere(['project_id'=>$id]);
    }

    public function update(Request $request, $id, $noteId){

        return $this->service->update($request->all(), $noteId);
    }


    public function store(Request $request){
        //return \CodeProject\Entities\Client::create($request->all());
        //dd($request->all());
        //return $this->repository->create($request->all());

        return $this->service->create($request->all());
    }


    public function show($id, $noteId){
        //return \CodeProject\Entities\Client::find($id);
        //return $this->repository->find($id);
        return $this->repository->findWhere(['project_id'=>$id, 'id'=>$noteId]);
    }


    public function destroy($id, $noteId){
        //\CodeProject\Entities\Client::find($id)->delete();
        return $this->repository->delete($noteId);
    }
}
