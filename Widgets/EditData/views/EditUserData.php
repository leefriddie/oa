<?php
use yii\bootstrap\ActiveForm;
use app\models\UserForm;
use yii\helpers\Html;

$model = new UserForm();
?>
<!--    弹窗-->
<?php $form = ActiveForm::begin(['id' => 'user-form']); ?>
    <div class="modal fade in" id="EditAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">信息</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="add">
                        <p>ID:</p><?=$form->field($model,'id')->textInput(['class'=>'input','name'=>'id','readonly'=>'readonly'])->label(false)?>

                    <p>用户名：</p>
                        <?=$form->field($model,'username')->textInput(['class'=>'input','name'=>'username'])->label(false) ?>

                    <p>人员名称：</p>
                        <?=$form->field($model,'activeName')->textInput(['class'=>'input','name'=>'active_name'])->label(false)?>

                    <p>email：</p>
                        <?=$form->field($model,'email')->textInput(['class'=>'input','name'=>'email'])->label(false)?>

                    <p>创建时间：</p>
                        <?=$form->field($model,'createdAt')->textInput(['class'=>'input','name'=>'created_at'])->label(false)?>

                    <p>更新时间：</p>
                        <?=$form->field($model,'updatedAt')->textInput(['class'=>'input','name'=>'updated_at'])->label(false)?>

                    <p>状态：</p>
                        <?=$form->field($model,'status')->textInput(['class'=>'input','name'=>'status','readonly'=>'readonly'])->label(false)?>

                </div>
                <div class="modal-footer">
                    <?=Html::submitButton('提交',['class'=>'btn save_button'])?>
                    <?=Html::submitButton('关闭',['class'=>'btn close_btn','onclick'=>'closeEdit()'])?>
                </div>
            </div>
        </div>
    </div>
<?php ActiveForm::end()?>


