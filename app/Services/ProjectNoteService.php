<?php

/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 19/05/16
 * Time: 10:11
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectNoteRepository;

use CodeProject\Validators\ProjectNoteValidator;

use Prettus\Validator\Exceptions\ValidatorException;

class ProjectNoteService {


    /**
     * @var ProjectValidatorValidator
     */
    protected $validator;

    /**
     * @var ProjectRepositoryRepository
     */
    protected $repository;

    public function __construct(ProjectNoteRepository $repository, ProjectNoteValidator $validator){

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