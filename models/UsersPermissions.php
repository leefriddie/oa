<?php

namespace app\models;

use Yii;
use yii\db\Query;
use app\models\Permissions;

/**
 * This is the model class for table "pms_users_permissions".
 *
 * @property integer $userid
 * @property string $permission
 * @property string $model
 * @property string $modelc
 */
class UsersPermissions extends \yii\db\ActiveRecord
{
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
            [['permission', 'model', 'modelc'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'permission' => 'Permission',
            'model' => 'Model',
            'modelc' => 'Modelc',
        ];
    }


    public function getPermission(){
        return $this->hasMany(Permissions::className(),['id'=>'pid']);
    }



}
