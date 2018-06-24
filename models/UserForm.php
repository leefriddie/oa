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

    const UPDATE_MISSION = 'updateMission';

    public function rules()
    {
        return [
            [['username','activeName'],'required','message'=>'该项为必填项'],
        ];
    }


    /**
     * 保存数据
     * @param $data
     * @return bool
     */
    public function saveData($data){
        $data = $data[$this->formName()];
        $model = User::findOne($data['id']);
        //var_dump($data);die;
        //$model->id = $data['id'];
        $model->username = $data['username'];
        $model->active_name = $data['activeName'];
        $model->email = $data['email'];
        //$model->created_at = time();
        $model->status = $data['status'];
        $result = $model->save();
        if($result){
            return true;
        }
        return false;
    }


    /**
     * 更新用户权限 ;
     * @param $id
     * @param $data
     * @return bool
     */
    public function UpdateMission($id,$data){
        return UsersPermissions::saveMission($id,$data);
    }
}