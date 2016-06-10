<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 19/05/16
 * Time: 10:25
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ClientValidator extends LaravelValidator{


    protected $rules=[
        'name'=>'required|max:255',
        'responsible'=>'required',
        'email'=>'required|email',
        'phone'=>'required',
        'address'=>'required'
    ];


}