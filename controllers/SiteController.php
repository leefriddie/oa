<?php

namespace app\controllers;

use app\models\User;
use app\models\UserForm;
use app\models\UsersPermissions;
use Yii;
use yii\base\ErrorException;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Mission;
use app\models\Permissions;

class SiteController extends BaseController
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['logout','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    '*' => ['get','post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $view = Yii::$app->view;
        $model = new Mission();
        $where = [
            'user_id' => User::getUserId()
        ];
        $data = $model->getMission($where,false);
        $view->params['data'] = $data;
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $data = Yii::$app->request->post();
        if ($model->load($data) && $model->login()) {
            $model->getPermission($data);
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionUser(){
        return $this->render('user');
    }

    public function actionCalend(){
        //传过来的日历日期
        $data = Yii::$app->request->get();
        $where = [
            'user_id' => User::getUserId(),
            //'mission_start' => $data['start']
        ];
        $ret = Mission::getMission($where);
        if($ret){
            foreach($ret as $key => $val){
                $result_return[$key]['id']    = $val['mission_id'];
                $result_return[$key]['title'] = $val['mission_content'];
                $result_return[$key]['start'] = $val['mission_start'];
                $result_return[$key]['end']   = $val['mission_end'];
                $result_return[$key]['allday']= $val['mission_start'] == $val['mission_end']?1:0;
            }

            return $this->return_ajax(self::SUCCESS,$result_return);
        }
    }

    public function actionCalend_data(){
        $data = Yii::$app->request->get();
        $where = [
            'user_id' => User::getUserId(),
            'mission_start' => $data['start']
        ];
        $res = Mission::findOne($where);
        //$res = false;
        if(!$res){
            $model = new Mission();
        }else{
            $model = $res;
        }
        $model->mission_content = $data['content'];
        $model->mission_start   = $data['start'];
        $model->mission_end     = $data['end']?$data['end']:$data['start'];
        $model->user_id         = User::getUserId();
        $result = $model->save();
        if($result){
            $ret = Mission::getMission($where);
            foreach($ret as $key => $value){
                $result_return[$key]['id']    = $value['mission_id'];
                $result_return[$key]['title'] = $value['mission_content'];
                $result_return[$key]['start'] = $value['mission_start'];
                $result_return[$key]['end']   = $value['mission_end'];
                $result_return[$key]['allday']= $value['mission_start'] == $value['mission_end']?1:0;
            }

            return $this->return_ajax(self::SUCCESS,$result_return,'添加或更新任务成功');
        }else{
            return $this->return_ajax(self::UPDATE_ERROR,false,'任务添加失败，稍后再试！');
        }
    }


    /**
     * 修改用户信息
     * @return string
     */
    public function actionSetting(){
        $model = new UserForm();
        $data = Yii::$app->request->post();
        $callback['ret'] = false;
        $callback['msg'] = '';
        if($model->load($data) && $res = $model->saveData($data)){
            if(!isset($data['mission'])){
                $data['mission'] = [];
            }
            $model->UpdateMission($data['UserForm']['id'],$data['mission']);
            $callback['ret'] = $data['UserForm']['id'];
            $callback['msg'] = '更新成功';
        }

        $Permissions = Permissions::getPermissions();//获取所有字段
        $userData = User::getUserList();
        foreach($userData as $key => $item){
            $userData[$key]['created_at'] = date('Y-m-d H:i:s',$item['created_at']);
            $userData[$key]['updated_at'] = $item['updated_at']?date('Y-m-d H:i:s',$item['updated_at']):'';
            $userData[$key]['status'] = $item['status']==1?'正常':'封禁';
        }

        return $this->render('setting',['data'=>$userData,'callback'=>$callback,'model'=>$model,'permissions'=>$Permissions]);
    }


    /**
     * 获取单个用户信息以及所拥有的权限
     */
    public function actionGet_data(){
        $id = Yii::$app->request->post('id');
        if($id) {
            $userData = User::getDataById($id);
            $data = UsersPermissions::getDataById($id);
            if ($userData) {
                $userData['created_at'] = date('Y-m-d H:m', $userData['created_at']);
                $userData['updated_at'] = date('Y-m-d H:m', $userData['updated_at']);
                foreach ($data as $ids) {
                    $userData['mid'][] = $ids['pid'];
                }
                $result['userData'] = $userData;
                echo $this->return_ajax(1, $result);
            } else {
                echo $this->return_ajax(0);
            }
        }else{
            $userData = User::getDataById();
            $userData = end($userData);
            if($userData){
                echo $this->return_ajax(1,array('id'=>$userData['id']+1));
            }else{
                echo $this->return_ajax(0);
            }
        }
    }


    /**
     * 删除用户
     */
    public function actionDel_user(){
        $id = Yii::$app->request->post('id');
        $userData = User::findOne($id);
        if($userData){
            $result = $userData->delete();
            if($result){
                UsersPermissions::delMission($id);
                echo $this->return_ajax(1,0, '删除成功');
            }else{
                echo $this->return_ajax(0,0,'删除失败，稍后再试');
            }
        }
    }





}
