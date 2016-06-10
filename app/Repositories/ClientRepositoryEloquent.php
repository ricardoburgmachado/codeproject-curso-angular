<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 19/05/16
 * Time: 08:58
 */

namespace CodeProject\Repositories;

use CodeProject\Entities\Client;

use Prettus\Repository\Eloquent\BaseRepository;

use CodeProject\Repositories\ClientRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository{


    //implementação obrigatória de BaseRepository
    public function model(){

        return Client::class;
    }

}