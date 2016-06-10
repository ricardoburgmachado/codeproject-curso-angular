<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 19/05/16
 * Time: 10:25
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator{


    protected $rules=[
        'owner_id'=>'required|integer',
        'client_id'=>'required|integer',
        'name'=>'required',
        //'description'=>'required',
        'progress'=>'required',
        'status'=>'required',
        'due_date'=>'required',
    ];


}