<?php
/**
 * Created by PhpStorm.
 * User: lijian
 * Date: 2017/9/2
 * Time: 下午4:56
 */
namespace app\controllers;
use yii\web\Controller;
use Yii;
use app\models\User;

class BaseController extends Controller{

    const SUCCESS = 1;
    const EMPTY_ERROR = 2;
    const FAILED = 0;
    const UPDATE_ERROR = 11;


    public $layout = 'main_two';


    public function return_ajax($ret,$data=false,$message=false){
        if($ret != self::SUCCESS){
            return json_encode(['ret'=>$ret,'data'=>false,'msg'=>'data is empty']);
        }
        return json_encode(['ret'=>$ret,'data'=>$data,'msg'=>$message]);
    }



    public function showAlert(){
        return $this->render('/layouts/publicAlert');
    }



}