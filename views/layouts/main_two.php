<?php
use app\assets\IndexAsset;
use yii\helpers\Url;


IndexAsset::register($this);
$this->beginPage();
?>

    <!DOCTYPE html>
    <html>

    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="<?php Yii::$app->language?>">
        <title>L-OA</title>
        <meta name="keywords" content="HTML5 Bootstrap 3 Admin Template UI Theme" />
        <meta name="description" content="AdminDesigns - A Responsive HTML5 Admin UI Framework">
        <meta name="author" content="AdminDesigns">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $this->head() ?>
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <?php $this->beginBody()?>
    <body class="admin-layout-page">

    <!-- Start: Theme Preview Pane -->
    <div id="skin-toolbox">
        <div class="panel">
            <div class="panel-heading">
                <span class="panel-icon">
                  <i class="fa fa-gear text-primary"></i>
                </span>
                <span class="panel-title"> Theme Options</span>
            </div>
            <div class="panel-body pn">
                <ul class="nav nav-list nav-list-sm pl15 pt10" role="tablist">
                    <li class="active">
                        <a href="admin_forms-layouts.html#toolbox-header" role="tab" data-toggle="tab">Navbar</a>
                    </li>
                    <li>
                        <a href="admin_forms-layouts.html#toolbox-sidebar" role="tab" data-toggle="tab">Sidebar</a>
                    </li>
                    <li>
                        <a href="admin_forms-layouts.html#toolbox-settings" role="tab" data-toggle="tab">Misc</a>
                    </li>
                </ul>
                <div class="tab-content p20 ptn pb15">
                    <div role="tabpanel" class="tab-pane active" id="toolbox-header">
                        <form id="toolbox-header-skin">
                            <h4 class="mv20">Header Skins</h4>
                            <div class="skin-toolbox-swatches">
                                <div class="checkbox-custom checkbox-disabled fill mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin8" checked value="">
                                    <label for="headerSkin8">Light</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-primary mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin1" value="bg-primary">
                                    <label for="headerSkin1">Primary</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-info mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin3" value="bg-info">
                                    <label for="headerSkin3">Info</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-warning mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin4" value="bg-warning">
                                    <label for="headerSkin4">Warning</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-danger mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin5" value="bg-danger">
                                    <label for="headerSkin5">Danger</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-alert mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin6" value="bg-alert">
                                    <label for="headerSkin6">Alert</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-system mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin7" value="bg-system">
                                    <label for="headerSkin7">System</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-success mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin2" value="bg-success">
                                    <label for="headerSkin2">Success</label>
                                </div>
                                <div class="checkbox-custom fill mb5">
                                    <input type="radio" name="headerSkin" id="headerSkin9" value="bg-dark">
                                    <label for="headerSkin9">Dark</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="toolbox-sidebar">
                        <form id="toolbox-sidebar-skin">
                            <h4 class="mv20">Sidebar Skins</h4>
                            <div class="skin-toolbox-swatches">
                                <div class="checkbox-custom fill mb5">
                                    <input type="radio" name="sidebarSkin" checked id="sidebarSkin3" value="">
                                    <label for="sidebarSkin3">Dark</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-disabled mb5">
                                    <input type="radio" name="sidebarSkin" id="sidebarSkin1" value="sidebar-light">
                                    <label for="sidebarSkin1">Light</label>
                                </div>
                                <div class="checkbox-custom fill checkbox-light mb5">
                                    <input type="radio" name="sidebarSkin" id="sidebarSkin2" value="sidebar-light light">
                                    <label for="sidebarSkin2">Lighter</label>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="toolbox-settings">
                        <form id="toolbox-settings-misc">
                            <h4 class="mv20 mtn">Layout Options</h4>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb5">
                                    <input type="checkbox" checked="" id="header-option">
                                    <label for="header-option">Fixed Header</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb5">
                                    <input type="checkbox" checked="" id="sidebar-option">
                                    <label for="sidebar-option">Fixed Sidebar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb5">
                                    <input type="checkbox" id="breadcrumb-option">
                                    <label for="breadcrumb-option">Fixed Breadcrumbs</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox-custom fill mb5">
                                    <input type="checkbox" id="breadcrumb-hidden">
                                    <label for="breadcrumb-hidden">Hide Breadcrumbs</label>
                                </div>
                            </div>
                            <h4 class="mv20">Layout Options</h4>
                            <div class="form-group">
                                <div class="radio-custom mb5">
                                    <input type="radio" id="fullwidth-option" checked name="layout-option">
                                    <label for="fullwidth-option">Fullwidth Layout</label>
                                </div>
                            </div>
                            <div class="form-group mb20">
                                <div class="radio-custom radio-disabled mb5">
                                    <input type="radio" id="boxed-option" name="layout-option" disabled>
                                    <label for="boxed-option">Boxed Layout
                                        <b class="text-muted">(Coming Soon)</b>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form-group mn br-t p15">
                    <a href="admin_forms-layouts.html#" id="clearLocalStorage" class="btn btn-primary btn-block pb10 pt10">Clear LocalStorage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End: Theme Preview Pane -->

    <!-- Start: Main -->
    <div id="main">

        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top">
            <div class="navbar-branding">
                <a class="navbar-brand" href="dashboard.html">
                    <b>Admin</b>Designs
                </a>
                <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a class="sidebar-menu-toggle" >
                        <span class="ad ad-ruby fs18"></span>
                    </a>
                </li>
                <li>
                    <a class="topbar-menu-toggle" href="admin_forms-layouts.html#">
                        <span class="ad ad-wand fs16"></span>
                    </a>
                </li>
                <li class="hidden-xs">
                    <a class="request-fullscreen toggle-active" href="admin_forms-layouts.html#">
                        <span class="ad ad-screen-full fs18"></span>
                    </a>
                </li>
            </ul>
            <form class="navbar-form navbar-left navbar-search" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search..." value="Search...">
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="admin_forms-layouts.html#">
                        <span class="ad ad-radio-tower fs18"></span>
                    </a>
                    <ul class="dropdown-menu media-list w350 animated animated-shorter fadeIn" role="menu">
                        <li class="dropdown-header">
                            <span class="dropdown-title"> Notifications</span>
                            <span class="label label-warning">12</span>
                        </li>
                        <li class="media">
                            <a class="media-left" href="admin_forms-layouts.html#"> <img src="assets/img/avatars/5.jpg" class="mw40" alt="avatar"> </a>
                            <div class="media-body">
                                <h5 class="media-heading">Article
                                    <small class="text-muted">- 08/16/22</small>
                                </h5> Last Updated 36 days ago by
                                <a class="text-system" href="admin_forms-layouts.html#"> Max </a>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-left" href="admin_forms-layouts.html#"> <img src="assets/img/avatars/2.jpg" class="mw40" alt="avatar"> </a>
                            <div class="media-body">
                                <h5 class="media-heading mv5">Article
                                    <small> - 08/16/22</small>
                                </h5>
                                Last Updated 36 days ago by
                                <a class="text-system" href="admin_forms-layouts.html#"> Max </a>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-left" href="admin_forms-layouts.html#"> <img src="assets/img/avatars/3.jpg" class="mw40" alt="avatar"> </a>
                            <div class="media-body">
                                <h5 class="media-heading">Article
                                    <small class="text-muted">- 08/16/22</small>
                                </h5> Last Updated 36 days ago by
                                <a class="text-system" href="admin_forms-layouts.html#"> Max </a>
                            </div>
                        </li>
                        <li class="media">
                            <a class="media-left" href="admin_forms-layouts.html#"> <img src="assets/img/avatars/4.jpg" class="mw40" alt="avatar"> </a>
                            <div class="media-body">
                                <h5 class="media-heading mv5">Article
                                    <small class="text-muted">- 08/16/22</small>
                                </h5> Last Updated 36 days ago by
                                <a class="text-system" href="admin_forms-layouts.html#"> Max </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="admin_forms-layouts.html#" class="dropdown-toggle fw600 p15" data-toggle="dropdown"> <img src="images/1.jpg" alt="头像" class="mw30 br64 mr15">
                        <?= Yii::$app->user->identity->active_name?Yii::$app->user->identity->active_name:Yii::$app->user->identity->username?>
                        <span class="caret caret-tp hidden-xs"></span>
                    </a>
                    <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
                        <li class="list-group-item">
                            <a href="<?=Url::to(['site/user'])?>" class="animated animated-short fadeInUp">
                                <span class="fa fa-gear"></span> 个人信息 </a>
                        </li>
                        <li class="list-group-item">
                            <a href="admin_forms-layouts.html#" class="animated animated-short fadeInUp">
                                <span class="fa fa-envelope"></span> 信息
                                <span class="label label-warning">2</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?=Url::to(['site/logout']) ?>" class="animated animated-short fadeInUp">
                                <span class="fa fa-power-off"></span> 退出 </a>
                        </li>
                    </ul>
                </li>
            </ul>

        </header>
        <!-- End: Header -->

        <!-- Start: Sidebar -->
        <aside id="sidebar_left" class="nano nano-primary affix">

            <!-- Start: Sidebar Left Content -->
            <div class="sidebar-left-content nano-content">

                <!-- Start: Sidebar Header -->
                <header class="sidebar-header">

                    <!-- Sidebar Widget - Menu (Slidedown) -->
                    <div class="sidebar-widget menu-widget">
                        <div class="row text-center mbn">
                            <div class="col-xs-4">
                                <a href="dashboard.html" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                                    <span class="glyphicon glyphicon-home"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_messages.html" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                                    <span class="glyphicon glyphicon-inbox"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_profile.html" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                                    <span class="glyphicon glyphicon-bell"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_timeline.html" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                                    <span class="fa fa-desktop"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_profile.html" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                                    <span class="fa fa-gears"></span>
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="pages_gallery.html" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                                    <span class="fa fa-flask"></span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Widget - Author (hidden)  -->
                    <div class="sidebar-widget author-widget hidden">
                        <div class="media">
                            <a class="media-left" href="admin_forms-layouts.html#">
                                <img src="assets/img/avatars/3.jpg" class="img-responsive">
                            </a>
                            <div class="media-body">
                                <div class="media-links">
                                    <a href="admin_forms-layouts.html#" class="sidebar-menu-toggle">User Menu -</a> <a href="pages_login(alt).html">Logout</a>
                                </div>
                                <div class="media-author">Michael Richards</div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Widget - Search (hidden) -->
                    <div class="sidebar-widget search-widget hidden">
                        <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-search"></i>
              </span>
                            <input type="text" id="sidebar-search" class="form-control" placeholder="Search...">
                        </div>
                    </div>

                </header>
                <!-- End: Sidebar Header -->

                <!-- Start: Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <li class="sidebar-label pt20">Menu</li>
                    <li>
                        <a href="<?=Url::to(['site/index'])?>">
                            <span class="glyphicon glyphicon-home"></span>
                            <span class="sidebar-title">我的主页</span>
                            <span class="sidebar-title-tray">
                            <span class="label label-xs bg-primary">New</span></span>
                        </a>
                    </li>
                    <?php foreach(Yii::$app->session->get('permission') as $item):?>
                    <li>
                        <a href="<?=Url::to([$item['permission'].'/index'])?>">
                            <span class="glyphicon glyphicon-<?= $item['class']?>"></span>
                            <span class="sidebar-title"><?= $item['model']?></span>
                        </a>
                    </li>
                    <?php endforeach;?>

                </ul>
                <!-- End: Sidebar Menu -->

                <!-- Start: Sidebar Collapse Button -->
                <div class="sidebar-toggle-mini">
                    <a href="admin_forms-layouts.html#">
                        <span class="fa fa-sign-out"></span>
                    </a>
                </div>
                <!-- End: Sidebar Collapse Button -->

            </div>
            <!-- End: Sidebar Left Content -->

        </aside>


        <section id="content_wrapper">


            <?=$content?>
            <!-- Begin: Page Footer -->
            <footer id="content-footer" class="affix" style="z-index: 1000">
                <div class="row">
                    <div class="col-md-6">
                        <span class="footer-legal">© 2015 AdminDesigns</span>
                    </div>
                    <div class="col-md-6 text-right">
                        <span class="footer-meta">60GB of <b>350GB</b> Free</span>
                        <a href="pages_calendar.html#content" class="footer-return-top">
                            <span class="fa fa-arrow-up"></span>
                        </a>
                    </div>
                </div>
            </footer>
            <!-- End: Page Footer -->


        </section>
        <!-- Start: Right Sidebar -->
        <aside id="sidebar_right" class="nano affix">

            <!-- Start: Sidebar Right Content -->
            <div class="sidebar-right-content nano-content p15">
                <h5 class="title-divider text-muted mb20"> Server Statistics
                    <span class="pull-right"> 2013
              <i class="fa fa-caret-down ml5"></i>
            </span>
                </h5>
                <div class="progress mh5">
                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 44%">
                        <span class="fs11">DB Request</span>
                    </div>
                </div>
                <div class="progress mh5">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 84%">
                        <span class="fs11 text-left">Server Load</span>
                    </div>
                </div>
                <div class="progress mh5">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 61%">
                        <span class="fs11 text-left">Server Connections</span>
                    </div>
                </div>
                <h5 class="title-divider text-muted mt30 mb10">Traffic Margins</h5>
                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">132</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-success-dark mn">
                            <i class="fa fa-caret-up"></i> 13.2% </h3>
                    </div>
                </div>
                <h5 class="title-divider text-muted mt25 mb10">Database Request</h5>
                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">212</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-success-dark mn">
                            <i class="fa fa-caret-up"></i> 25.6% </h3>
                    </div>
                </div>
                <h5 class="title-divider text-muted mt25 mb10">Server Response</h5>
                <div class="row">
                    <div class="col-xs-5">
                        <h3 class="text-primary mn pl5">82.5</h3>
                    </div>
                    <div class="col-xs-7 text-right">
                        <h3 class="text-danger mn">
                            <i class="fa fa-caret-down"></i> 17.9% </h3>
                    </div>
                </div>
                <h5 class="title-divider text-muted mt40 mb20"> Server Statistics
                    <span class="pull-right text-primary fw600">USA</span>
                </h5>
            </div>

        </aside>
        <!-- End: Right Sidebar -->

    </div>
    <!-- End: Main -->

    <!--    弹窗-->
    <div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">添加任务</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="action" value="add">
                    <p>日程内容：<input type="text" class="input" name="event" id="event" style="width:320px"
                                   placeholder="记录你将要做的一件事..."></p>
                    <p>开始时间：<input type="text" class="input" name="startdate" id="startdate"
                                   value="">
                        </span>
                    </p>
                    <p id="p_endtime" style="display:none">结束时间：
                        <input type="text" class="input" name="enddate" id="enddate" value="">
                        <span id="sel_end" style="display:none">
                            <select name="e_hour">
                            <option value="00">00</option>
                            ...
                            </select>:
                            <select name="e_minute">
                                <option value="00" selected>00</option>
                                ...
                            </select>
                        </span>
                    </p>
                    <p>
                        <label><input type="radio" value="1" id="start_time" name="isallday" checked> 全天</label>
                        <label><input type="radio" value="0" id="end_time" name="isallday"> 结束时间</label>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn save_button">保存</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* demo page styles */
        .admin-form .panel.heading-border:before,
        .admin-form .panel .heading-border:before {
            transition: all 0.7s ease;
        }
    </style>

    <!-- BEGIN: PAGE SCRIPTS -->

    <?php $this->endBody()?>
    <script type="text/javascript">
        jQuery(document).ready(function() {

            "use strict";

            // Init Theme Core
            Core.init();

            // Init Demo JS
            Demo.init();


            $('#start_time').click(function () {
                $('#p_endtime').hide(100);

            });
            $('#end_time').click(function () {
                $('#p_endtime').show(100);
            });
            $('#enddate').datetimepicker({
                format:"Y-m-d",      //格式化日期
                timepicker:false,    //关闭时间选项
                yearStart:2000,     //设置最小年份
                yearEnd:2050,        //设置最大年份
                todayButton:false    //关闭选择今天按钮
            });

            //日历
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                firstDay:1,
                editable: true,
                timeFormat: 'H:mm',
                axisFormat: 'H:mm',
                dayClick: function(date) {
                    var selDate =$.fullCalendar.formatDate(date,'yyyy-MM-dd');//格式化日期
                    day_click(selDate,false);
                },
                eventClick:function(event){
                    day_click($.fullCalendar.formatDate(event.start,'yyyy-MM-dd'),true)
                },
                events: [
                    <?php foreach($this->params['data'] as $mission):?>
                    {
                        title: '<?=$mission['mission_content']?>',
                        start: '<?=$mission['mission_start']?>',
                        end: '<?=$mission['mission_end']?>',
                        allday:'<?php echo $mission['mission_start']==$mission['mission_end']?true:false?>',
                        //url:'',
                    },
                    <?php endforeach;?>
                ]
            });


            $('.fc-event').css('background','#4a89dc');
            $('.fc-event-inner').css('color','white');


            $('.save_button').click(function(){
                var content = $('#event').val();
                var start = $('#startdate').val();
                if($('#start_time').is(':checked')){
                    var end = start;
                }else {
                    var end = $('#enddate').val();
                }
                $.get('<?php echo Url::to('/site/calend_data')?>',{content:content,start:start,end:end},function(data){
                    if(data.ret == 1){
                        success_topbar('success','',data.msg);
                    }
                },'json')
            });

        });


        function day_click(selDate,type){
            $('#myModal').modal('show');
            if(type == false){
                $('#startdate').val(selDate);
            }else{
                $.get('<?php echo Url::to('/site/calend')?>',{selDate:selDate},function(e){
                    if(e.ret == 1){
                        var content = e.data.mission_content;
                        var start_date = e.data.mission_start;
                        var end_date = e.data.mission_end;
                        $('#event').val(content);
                        $('#startdate').val(start_date);

                        if(start_date != end_date){
                            $('#p_endtime').show();
                            $('#start_time').attr('checked',false);
                            $('#end_time').attr('checked',true);
                        }
                    }
                },'json');
            }

        }
    </script>
    <!-- END: PAGE SCRIPTS -->

    </body>

    </html>
<?php $this->endPage()?>