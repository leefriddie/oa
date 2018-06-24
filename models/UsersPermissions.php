<?php

namespace app\models;

use Yii;
use yii\db\Query;
use app\models\Permissions;

/**
 * This is the model class for table "pms_users_permissions".
 *
 * @property integer $userid
 * @property string $pid
 */
class UsersPermissions extends \yii\db\ActiveRecord
{

    public $userid;
    public $pid;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pms_users_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userid'], 'required'],
            [['userid'], 'integer'],
            //[['permission', 'model', 'modelc'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'pid' => 'PID',
        ];
    }

    /**
     * 根据id查询
     * @param $id
     * @return mixed
     */
    static public function getDataById($id){
        return static::find()->where(['userid'=>$id])->asArray()->all();
    }


    public function getPermission(){
        return $this->hasMany(Permissions::className(),['id'=>'pid']);
    }


    /**
     * 保存用户的权限
     * @param $id 用户id
     * @oaram $data 权限pid
     * @return bool
     */
    static public function saveMission($id,$data){
        $is_mission = self::getDataById($id);
        if($is_mission){
            self::deleteAll(['userid'=>$id]);
        }
        if(is_array($data) && !empty($data)){
            foreach($data as $v){
                $value[] = array($id,$v);
            }
            $result = Yii::$app->db->createCommand()->batchInsert(self::tableName(),['userid','pid'],$value)->execute();
            return $result;
        }
        return false;
    }



}
