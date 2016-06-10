<?php

namespace CodeProject\Http\Controllers;



use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Http\Request;




class ProjectController extends Controller{


    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @var ProjectRepository
     */
    private $repository;

    public function __construct(ProjectRepository $repository, ProjectService $service){
        $this->repository = $repository;
        $this->service= $service;
    }

    public function index(){

        //return \CodeProject\Entities\Client::all();

        //return $this->repository->all();//traz todos

        $userId = 11;

        return $this->repository->findWhere(['owner_id' => $userId]);
    }

    public function update(Request $request, $id){

        return $this->service->update($request->all(), $id);
    }


    public function store(Request $request){
        //return \CodeProject\Entities\Client::create($request->all());
        //dd($request->all());
        //return $this->repository->create($request->all());

        return $this->service->create($request->all());
    }


    public function show($id){


        //return \CodeProject\Entities\Client::find($id);

        $userId = 11;

        /* Isso aqui foi transferido para o middleware CheckProjectOwner
         * if( $this->repository->isOwner($id, $userId) == false){
            return ['success'=> false];
        }
        */
        if($this->checkProjectOwner($id) == false){
            return ['error'=> 'Access Forbidden'];
        }else{
            return $this->repository->find($id);
        }


    }


    public function destroy($id){
        //\CodeProject\Entities\Client::find($id)->delete();
        return $this->repository->delete($id);
    }

    private function checkProjectOwner($projectId){

         $userId = 11;

         return $this->repository->isOwner($projectId, $userId);
    }


    private function checkProjectMember($projectId){

        $userId = 11;

        return $this->repository->hasMember($projectId, $userId);
    }


    private function checkProjectPermissions($projectId){



        if($this->checkProjectOwner($projectId) or $this->checkProjectMember($projectId)){
            return true;
        }
            return false;
    }


















}
