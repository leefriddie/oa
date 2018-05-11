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


    public function saveData($data){
        $data = $data[$this->formName()];
        $model = User::findOne($data['id']);
        //var_dump($data);die;
        //$model->id = $data['id'];
        $model->username = $data['username'];
        $model->active_name = $data['activeName'];
        $model->email = $data['email'];
        $model->updated_at = time();
        $result = $model->save();
        if($result){
            return true;
        }
        return false;
    }
}