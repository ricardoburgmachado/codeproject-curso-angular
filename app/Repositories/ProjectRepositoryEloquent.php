<?php

namespace CodeProject\Repositories;

use CodeProject\Presenters\ProjectPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Entities\Project;
use CodeProject\Validators\ProjectValidator;



/**
 * Class ProjectRepositoryEloquent
 * @package namespace CodeProject\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    /**
     * Verificar se o usuário é dono de um determinado projeto
     * @param $userId
     */
    public function isOwner($projectId, $userId){

        //com o count se vier mais que 1 ele retorna true
        if( count( $this->findWhere(['id'=>$projectId, 'owner_id'=>$userId])) ){
            return true;
        }
        return false;
    }

    //Retorno o se o cara realmente for membro de determinado projeto
    public function hasMember($projectId, $memberId){

        $project = $this->find($projectId);

        foreach ($project->members as $member){
            if($member->id == $memberId){
                return true;
            }
        }
        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }


}
