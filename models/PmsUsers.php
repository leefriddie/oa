<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "pms_users".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email_validate_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property string $avatar
 * @property integer $vip_lv
 * @property integer $created_at
 * @property integer $updated_at
 */
class PmsUsers extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pms_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['role', 'status', 'vip_lv', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email_validate_token', 'email', 'avatar'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增id',
            'username' => '用户名',
            'auth_key' => '自动登录key',
            'password_hash' => '加密密码',
            'password_reset_token' => '重置密码token',
            'email_validate_token' => '邮箱验证token',
            'email' => '邮箱',
            'role' => '角色等级',
            'status' => '状态',
            'avatar' => '头像',
            'vip_lv' => 'vip等级',
            'created_at' => '创建时间',
            'updated_at' => 'Updated At',
        ];
    }


    /**
     * 查询用户信息
     * @param $username
     * @return null|static
     */
    public static function findByUsername($username){
        return static::findOne(['username'=>$username,'status'=>1]);
    }


    /**
     * 验证密码
     * @param $password
     * @return bool
     */
    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password,$this->password_hash);
    }







    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }


    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }


    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
}
