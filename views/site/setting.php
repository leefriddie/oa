<?php
use app\assets\TableAsset;
use app\components\EditDataWidget;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

TableAsset::register($this);
?>
<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
<div class="col-md-12">
    <div class="panel panel-visible" id="spy2">
        <div class="panel-heading">
            <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>人员列表</div>
        </div>
        <div class="panel-body pn">
            <table class="table table-striped table-hover" id="datatable" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>用户名</th>
                    <th>人员名称</th>
                    <th>email</th>
                    <th>创建时间</th>
                    <th>最后更新</th>
                    <th>状态</th>
                    <th>编辑</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach($data as $item):?>
                <tr>
                    <td><?=$item['id']?></td>
                    <td><?=$item['username']?></td>
                    <td><?=$item['active_name']?></td>
                    <td><?=$item['email']?></td>
                    <td><?=$item['created_at']?></td>
                    <td><?=$item['updated_at']?></td>
                    <td><?=$item['status']?></td>
                    <td>
                        <?=Html::submitButton('',['class'=>'glyphicon glyphicon-edit edit','value'=>$item['id'],'name'=>'edit'])?>
                        <?php if($item['status'] == '封禁'):?>
                            <?=Html::submitButton('',['class'=>'glyphicon glyphicon-ok','title'=>'解封','value'=>1,'name'=>'offban'])?>
                        <?php else:?>
                            <?=Html::submitButton('',['class'=>'glyphicon glyphicon-remove','title'=>'封禁','value'=>2,'name'=>'onban'])?>
                        <?php endif;?>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php ActiveForm::end()?>

