<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 19/05/16
 * Time: 10:25
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator{


    protected $rules=[
        'project_id'=>'required|integer',
        'title'=>'required',
        'note'=>'required',

    ];


}