<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 21/05/16
 * Time: 14:19
 */

namespace CodeProject\Transformers;

use CodeProject\Entities\User;

use League\Fractal\TransformerAbstract;

class ProjectMemberTransformer extends TransformerAbstract {

    
    
    public function transform(User $member){

        return [
            'member_id'=> $member->id,
            'name'=> $member->name,

        ];

    }

}