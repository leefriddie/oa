<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use app\models\UsersPermissions;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;
    public $id = false;



    const AFTER_LOGIN = 'afterLogin';
    const BEFER_LOGIN = 'beferlogin';

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username','password'], 'required','message'=>'用户名或密码不能为空'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'password' => '密码',
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名或密码错误');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }


    /**
     * @param $data
     */
    public function getPermission($data){
        $this->on(self::AFTER_LOGIN,[$this, '_AfterLogin'], $data);
        $this->trigger(self::AFTER_LOGIN);
    }


    /**
     * 登录以后的事件 (获取权限)
     * @param $data
     */
    protected function _AfterLogin($data){
        $this->id = User::findByUsername($data->sender->username)->id;
        $permission = UsersPermissions::find()->where(['userid'=>$this->id])->with('permission')->asArray()->all();
        if($permission) {
            foreach ($permission as $val) {
                $new_permission['userid'] = $val['userid'];
                $new_permission['pid'][] = $val['pid'];
                $new_permission['permission'][] = $val['permission'][0];
            }

        }else{
            $new_permission = [];
        }
        Yii::$app->session->set('permission', $new_permission);
    }
}
