<?php

namespace app\models;

use Yii;
use app\models\UsersPermissions;

/**
 * This is the model class for table "pms_permissions".
 *
 * @property integer $id
 * @property string $permission
 * @property string $model
 * @property string $modelc
 * @property string $class
 */
class Permissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pms_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class'], 'required'],
            [['permission', 'model', 'modelc'], 'string', 'max' => 5000],
            [['class'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'permission' => 'Permission',
            'model' => 'Model',
            'modelc' => 'Modelc',
            'class' => 'Class',
        ];
    }



}
