<?php
/**
 * Created by PhpStorm.
 * User: ricardo
 * Date: 21/05/16
 * Time: 14:37
 */

namespace CodeProject\Presenters;

use CodeProject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter{


    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer() {

        return new ProjectTransformer();
    }
}