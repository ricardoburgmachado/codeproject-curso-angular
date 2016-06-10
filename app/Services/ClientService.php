<?php

/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 19/05/16
 * Time: 10:11
 */

namespace CodeProject\Services;

use CodeProject\Repositories\ClientRepository;
use CodeProject\Validators\ClientValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ClientService {


    /**
     * @var ClientValidator
     */
    protected $validator;

    /**
     * @var ClientRepository
     */
    protected $repository;

    public function __construct(ClientRepository $repository, ClientValidator $validator){

        $this->validator = $validator;
        $this->repository = $repository;
    }


    public function create(array $data){

        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);
        }catch (ValidatorException $e){
            return [
              'error'=>true,
                'message'=> $e->getMessageBag()
            ];
        }


    }

    public function update(array $data, $id){

        try{
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        }catch (ValidatorException $e){
            return [
                'error'=>true,
                'message'=> $e->getMessageBag()
            ];
        }

    }



}