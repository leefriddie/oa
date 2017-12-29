<?php
/**
 * Created by PhpStorm.
 * User: lijian
 * Date: 29/12/17
 * Time: 下午3:47
 */
namespace app\models;
use yii\base\Model;
use app\models\User;


class UserForm extends Model{

    public $id;
    public $username;
    public $activeName;
    public $email;
    public $createdAt;
    public $updatedAt;
    public $status;

    public function rules()
    {
        return [
            [['username','activeName'],'required','message'=>'该项为必填项'],
        ];
    }


    public function saveData(){
        $model = new User();
        $model->id = $this->id;
        $model->username = $this->username;
        $model->active_name = $this->activeName;
        $model->email = $this->email;
        $result = $model->save();
        if($result){
            return true;
        }
        return false;
    }
}