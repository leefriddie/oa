<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\base\ErrorException;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Mission;

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
        ];
        if(isset($data['selDate'])){
            $where['mission_start'] = $data['selDate'];
        }
        $mission_data = Mission::getMission($where);
        if($mission_data){
            return $this->return_ajax(self::SUCCESS,$mission_data);
        }
    }

    public function actionCalend_data(){
        $data = Yii::$app->request->get();
        $where = [
            'user_id' => User::getUserId(),
            'mission_start' => $data['start']
        ];
        $res = Mission::getMission($where);
        if(!$res){
            $model = new Mission();
        }else{
            $model = $res;
        }
        $model->mission_content = $data['content'];
        $model->mission_start   = $data['start'];
        $model->mission_end     = $data['end'];
        $model->user_id         = User::getUserId();
        $result = $model->save();
        if($result){
            $ret = Mission::getMission($where);
            $result_return['title'] = $ret['mission_content'];
            $result_return['start'] = $ret['mission_start'];
            $result_return['end']   = $ret['mission_end'];
            $result_return['allday']= $ret['mission_start'] == $ret['mission_end']?1:0;
            return $this->return_ajax(self::SUCCESS,$result_return,'添加或更新任务成功');
        }else{
            return $this->return_ajax(self::UPDATE_ERROR,false,'任务添加失败，稍后再试！');
        }
    }




}
