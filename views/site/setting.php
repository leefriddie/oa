<?php
use app\assets\TableAsset;
use app\Widgets\EditData\EditDataWidget;
use yii\helpers\Html;


TableAsset::register($this);
?>

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
                        <?=Html::submitButton('',['class'=>'glyphicon glyphicon-edit edit','value'=>$item['id'],'name'=>'edit','onclick'=>'editAlert('.json_encode($item).')'])?>
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
<?=EditDataWidget::widget()?>


<script>
    var callback = '<?=$callback?$callback:0?>';
    if(callback != 0){
        success_topbar(callback.ret,callback.msg);
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
function editAlert(data){
    $('#EditAlert').modal('show');
    if(data){
        $('#userform-id').val(data.id);
        $('#userform-username').val(data.username);
        $('#userform-activename').val(data.active_name);
        $('#userform-email').val(data.email);
        $('#userform-createdat').val(data.created_at);
        $('#userform-updatedat').val(data.updated_at);
        if(data.status == 1){
            var status = '正常';
        }else{
            var status = '封禁';
        }
        $('#userform-status').val(status);
    }
}

function closeEdit(){
    $('#table-form').submit(false);
    $('.close_btn').modal('hide');
}



</script>

