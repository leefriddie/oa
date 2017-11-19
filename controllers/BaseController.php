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


    public $layout = 'main_two';


    public function return_ajax($data){
        if(empty($data)){
            return ['ret'=>self::EMPTY_ERROR,'msg'=>'data is empty'];
        }
        return json_encode(['ret'=>self::SUCCESS,'data'=>$data]);
    }



}