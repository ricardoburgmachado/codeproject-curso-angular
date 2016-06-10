<?php

/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 19/05/16
 * Time: 10:11
 */

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

use \Illuminate\Contracts\Filesystem\Factory as Storage;

use \Illuminate\Filesystem\Filesystem;

class ProjectService {


    /**
     * @var ProjectValidatorValidator
     */
    protected $validator;

    /**
     * @var ProjectRepositoryRepository
     */
    protected $repository;

    /**
     * @var FileSystem
     */
    private $fileSystem;

    /**
     * @var Storage
     */
    private $storage;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator,
                                Filesystem $fileSystem, Storage $storage){

        $this->validator = $validator;
        $this->repository = $repository;
        $this->fileSystem = $fileSystem;
        $this->storage = $storage;
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


    public function createFile(array $data){


        //Storage::put($data['name'].'.'.$data['extension'], File::get($data['file']));

        //skipPresenter() para não ser utilizado o presenter configurado, ou seja, manda o retorno ccompleto

        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);

        $this->storage->put($projectFile->id.'.'.$data['extension'], $this->fileSystem->get($data['file']));


    }























}