<?php
use app\assets\TableAsset;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use yii\helpers\Url;


TableAsset::register($this);
?>

<div class="col-md-12">
    <div class="panel panel-visible" id="spy2">
        <div class="panel-heading">
            <div class="panel-title hidden-xs">
                <span class="glyphicon glyphicon-tasks"></span>人员列表
                <button type="button" class="btn btn-lg btn-info" onclick="editAlert(-1)" style="height: 30px;float: right;font-size: 10px;padding: 5px;margin: 5px;margin-right: 30px;">添加人员</button>
            </div>
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
                        <?=Html::submitButton('',['class'=>'glyphicon glyphicon-edit edit','value'=>$item['id'],'name'=>'edit','onclick'=>"editAlert({$item['id']})"])?>

                        <?=Html::submitButton('',['class'=>'glyphicon glyphicon-remove','title'=>'删除','value'=>2,'name'=>'onban','onclick'=>"delUser({$item['id']})"])?>
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!--    弹窗-->
<?php $form = ActiveForm::begin(['id' => 'user-form']); ?>
<div class="modal fade in" id="EditAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->
                <h4 class="modal-title" id="myModalLabel">信息</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="action" value="add">
                <p>ID:</p><?=$form->field($model,'id')->textInput(['class'=>'input','readonly'=>'readonly'])->label(false)?>

                <p>用户名：</p>
                <?=$form->field($model,'username')->textInput(['class'=>'input'])->label(false) ?>

                <p>人员名称：</p>
                <?=$form->field($model,'activeName')->textInput(['class'=>'input'])->label(false)?>

                <p>email：</p>
                <?=$form->field($model,'email')->textInput(['class'=>'input'])->label(false)?>

                <p>创建时间：</p>
                <?=$form->field($model,'createdAt')->textInput(['class'=>'input'])->label(false)?>

                <p>更新时间：</p>
                <?=$form->field($model,'updatedAt')->textInput(['class'=>'input','readonly'=>'readonly'])->label(false)?>

                <p>状态：</p>
                <?=$form->field($model,'status')->dropDownList([1=>'正常',0=>'封禁'],['class'=>'select_status'])->label(false)?>
                <?php foreach($permissions as $item):?>
                    <label class="checkbox-inline mr10">
                        <input type="checkbox" value="<?php echo $item['id']?>" name="mission[]"><?php echo $item['model']?>
                    </label>
                <?php endforeach;?>
            </div>
            <div class="modal-footer">
                <?=Html::submitButton('提交',['class'=>'btn save_button'])?>
                <?=Html::button('关闭',['class'=>'btn close_btn','onclick'=>'closeEdit()'])?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end()?>
<script>
    var callback = '<?=$callback['ret']?$callback['ret']:0?>';
    var callback_msg = '<?=$callback['msg']?$callback['msg']:0?>';
    if(callback != 0){
        success_topbar('success',callback_msg);
    }



    $('#datatable').dataTable({
        "aoColumnDefs": [{
            'bSortable': false,
            'aTargets': [-1]
        }],
        "oLanguage": {
            "sLengthMenu": "每页显示 _MENU_ 条记录",
            "sZeroRecords": "抱歉， 没有找到",
            "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
            "sInfoEmpty": "没有数据",
            "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
            "oPaginate": {
                "sFirst": "首页",
                "sPrevious": "前一页",
                "sNext": "后一页",
                "sLast": "尾页"
            },

        },
        "iDisplayLength": 5,
        "aLengthMenu": [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, "All"]
        ],
        "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
        "oTableTools": {
            "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
        }
    });
function editAlert(id){
    $('#EditAlert').modal('show');
    if(id > 0) {
        $.post('<?php echo Url::to(['/site/get_data'])?>', {id: id}, function (a) {
            if (a.ret) {
                var data = a.data.userData;
                $('#userform-id').val(data.id);
                $('#userform-username').val(data.username);
                $('#userform-activename').val(data.active_name);
                $('#userform-email').val(data.email)
                $('#userform-createdat').val(data.created_at);
                $('#userform-updatedat').val(data.updated_at);
                $('#userform-status').children('option').each(function () {
                    var temp = $(this).val();
                    if (temp == data.status) {
                        $(this).attr('selected', true);
                    }
                });
                if (data.mid) {
                    $.each($("[name='mission[]']"), function () {
                        if (isInArray(data.mid, $(this).val())) {
                            $(this).prop('checked',true);
                        }else{
                            $(this).prop('checked', false);
                        }
                    });
                }

            }
        }, 'json');
    }else{
        $('#userform-username').val('');
        $('#userform-activename').val('');
        $('#userform-email').val('');
        var date = new Date().Format('yyyy-MM-dd hh:mm:ss');
        $('#userform-createdat').val(date);
        $('#userform-updatedat').val('');
        $.post('<?php echo Url::to(['/site/get_data'])?>',{},function(a){
            if(a.ret){
                var data = a.data;
                $('#userform-id').val(data.id);
                $.each($("[name='mission[]']"), function () {
                    $(this).prop('checked',true);
                });
            }
        },'json');
    }
}

function closeEdit(type){
        $('#userForm').submit(false);
        $('#EditAlert').modal('hide');

}


    function isInArray(arr,value){
        for(var i = 0; i < arr.length; i++){
            if(value === arr[i]){
                return true;
            }
        }
        return false;
    }


    function delUser(id){
        $.post('<?php echo Url::to(['/site/del_user'])?>',{id:id},function(a){
            if(a.ret){
                setTimeout(location.href='<?php echo Url::to(['/site/setting'])?>',3000);
            }else{
                success_topbar('warning',a.data.msg);
            }

        },'json');
    }


    Date.prototype.Format = function (fmt) { //author: meizz
        var o = {
            "M+": this.getMonth() + 1, //月份
            "d+": this.getDate(), //日
            "h+": this.getHours(), //小时
            "m+": this.getMinutes(), //分
            "s+": this.getSeconds(), //秒
            "q+": Math.floor((this.getMonth() + 3) / 3), //季度
            "S": this.getMilliseconds() //毫秒
        };
        if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
        for (var k in o)
            if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
        return fmt;
    }

</script>

