<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

use CodeProject\Entities\ProjectFile;

class Project extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    ];

    public function notes(){
        return $this->hasMany(ProjectNote::class);
    }


    //Aqui é um exemplo onde tiveram que ser passados os parametros pois na tabela/objeto de relação ProjectMember foi usado o
    //atributo member_id e não user_id como esperado pelo framework, por isso foi informado o member_id para informar a relação
    //já o project_id é onde está fazendo o join
    public function members(){
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }


    public function files(){
        return $this->hasMany(ProjectFile::class);
    }


}
