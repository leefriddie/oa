<?php
/**
 * Created by PhpStorm.
 * User: lijian
 * Date: 28/12/17
 * Time: 下午3:36
 */
namespace app\Widgets\EditData;

use app\models\User;
use yii\base\Widget;

class EditDataWidget extends Widget{

    public $user_id = '';

    public $data = '';
    public $msg = '';

    public function init()
    {
        parent::init();

    }


    public function run(){
        return $this->render('EditUserData');
    }


}

