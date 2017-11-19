<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "pms_mission".
 *
 * @property integer $mission_id
 * @property string $mission_content
 * @property string $mission_start
 * @property string $mission_end
 * @property integer $user_id
 */
class Mission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pms_mission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mission_content', 'mission_start', 'mission_end', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['mission_content'], 'string', 'max' => 100],
            [['mission_start', 'mission_end'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mission_id' => 'Mission ID',
            'mission_content' => 'Mission Content',
            'mission_start' => 'Mission Start',
            'mission_end' => 'Mission End',
            'user_id' => 'User ID',
        ];
    }


    /**
     * 返回任务data
     * @param bool $data
     * @param bool $return_type 为true的话就返回一条 false返回多条
     * @return bool
     */
    public function getMission($data=false, $return_type=true){
        if(is_array($data) || !$data){
            if($return_type){
                return (new Query())->from(self::tableName())->where($data)->one();
            }else{
                return (new Query())->from(self::tableName())->where($data)->all();
            }
        }
    }



}
