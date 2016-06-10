<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 21/05/16
 * Time: 14:19
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\Project;

use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract {


    //faz uma chamada do método includeMembers, usando apenas parte de seu nome, 'members'
    //serão incluidos esses dados no array de dados construido abaixo (Project)
    protected $defaultIncludes = ['members'];
    
    
    public function transform(Project $project){

        return [
            'project_id'=> $project->id,
            'client_id'=>$project->client_id,
            'owner_id'=>$project->owner_id,
            'name'=> $project->name,
            'decription'=> $project->description,
            'progress'=> $project->progress,
            'status'=> $project->status,
            'due_date'=> $project->due_date
        ];
    }

    public function includeMembers(Project $project){

        return $this->collection($project->members,
            new ProjectMemberTransformer() );
    }






}