<?php

namespace CodeProject\Http\Controllers;



use CodeProject\Repositories\ClientRepository;

use CodeProject\Services\ClientService;
use Illuminate\Http\Request;




class ClientController extends Controller{


    /**
     * @var ClientService
     */
    private $service;

    /**
     * @var ClientRepository
     */
    private $repository;

    public function __construct(ClientRepository $repository, ClientService $service){
        $this->repository = $repository;
        $this->service= $service;
    }

    public function index(){

        //return \CodeProject\Entities\Client::all();
        return $this->repository->all();
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
        return $this->repository->find($id);
    }


    public function destroy($id){
        //\CodeProject\Entities\Client::find($id)->delete();
        return $this->repository->delete($id);
    }
}
