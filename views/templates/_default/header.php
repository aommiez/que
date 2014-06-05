<!DOCTYPE html>
<html>
<head>
    <title>Demo</title>
	<meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport' />
    
    <!--[if lt IE 9]>
    <script src='assets/javascripts/html5shiv.js' type='text/javascript'></script>
    <![endif]-->
    <link href='<?php echo uri('public/assets/stylesheets/bootstrap/bootstrap.css');?>' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo uri('public/assets/stylesheets/bootstrap/bootstrap-responsive.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery ui -->
    <link href='<?php echo uri('public/assets/stylesheets/jquery_ui/jquery-ui-1.10.0.custom.css');?>' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo uri('public/assets/stylesheets/jquery_ui/jquery.ui.1.10.0.ie.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / switch buttons -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/bootstrap_switch/bootstrap-switch.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / xeditable -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/xeditable/bootstrap-editable.css');?>' media='all' rel='stylesheet' type='text/css' />
    <link href='<?php echo uri('public/assets/stylesheets/plugins/common/bootstrap-wysihtml5.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / wysihtml5 (wysywig) -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/common/bootstrap-wysihtml5.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / jquery file upload -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/jquery_fileupload/jquery.fileupload-ui.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / full calendar -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/fullcalendar/fullcalendar.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / select2 -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/select2/select2.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / mention -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/mention/mention.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / tabdrop (responsive tabs) -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/tabdrop/tabdrop.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / jgrowl notifications -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/jgrowl/jquery.jgrowl.min.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / datatables -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/datatables/bootstrap-datatable.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / dynatrees (file trees) -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/dynatree/ui.dynatree.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / color picker -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/bootstrap_colorpicker/bootstrap-colorpicker.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / datetime picker -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / daterange picker) -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / flags (country flags) -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/flags/flags.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / slider nav (address book) -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/slider_nav/slidernav.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / fuelux (wizard) -->
    <link href='<?php echo uri('public/assets/stylesheets/plugins/fuelux/wizard.css');?>' media='all' rel='stylesheet' type='text/css' />
    <!-- / flatty theme -->
    <link href='<?php echo uri('public/assets/stylesheets/light-theme.css');?>' id='color-settings-body-color' media='all' rel='stylesheet' type='text/css' />
    <!-- / demo -->
    <link href='<?php echo uri('public/assets/stylesheets/demo.css');?>' media='all' rel='stylesheet' type='text/css' />

    <link href='<?php echo uri('public/css/pla2-icon.css');?>' media='all' rel='stylesheet' type='text/css' />
    <link href="<?php echo uri('public/dist/skin-win8/ui.fancytree.min.css');?>" rel="stylesheet" type="text/css">


    <!-- / jquery -->
    <script src='<?php echo uri('public/assets/javascripts/jquery/jquery.min.js');?>' type='text/javascript'></script>
    <!-- / jquery mobile events (for touch and slide) -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/mobile_events/jquery.mobile-events.min.js');?>' type='text/javascript'></script>
    <!-- / jquery migrate (for compatibility with new jquery) -->
    <script src='<?php echo uri('public/assets/javascripts/jquery/jquery-migrate.min.js');?>' type='text/javascript'></script>
    <!-- / jquery ui -->
    <script src='<?php echo uri('public/assets/javascripts/jquery_ui/jquery-ui.min.js');?>' type='text/javascript'></script>
    <!-- / bootstrap -->
    <script src='<?php echo uri('public/assets/javascripts/bootstrap/bootstrap.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/flot/excanvas.js');?>' type='text/javascript'></script>
    <!-- / sparklines -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/sparklines/jquery.sparkline.min.js');?>' type='text/javascript'></script>
    <!-- / flot charts -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/flot/flot.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/flot/flot.resize.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/flot/flot.pie.js');?>' type='text/javascript'></script>
    <!-- / bootstrap switch -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js');?>' type='text/javascript'></script>
    <!-- / fullcalendar -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/fullcalendar/fullcalendar.min.js');?>' type='text/javascript'></script>
    <!-- / datatables -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/datatables/jquery.dataTables.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js');?>' type='text/javascript'></script>
    <!-- / wysihtml5 -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/common/wysihtml5.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/common/bootstrap-wysihtml5.js');?>' type='text/javascript'></script>
    <!-- / select2 -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/select2/select2.js');?>' type='text/javascript'></script>
    <!-- / color picker -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootstrap_colorpicker/bootstrap-colorpicker.min.js');?>' type='text/javascript'></script>
    <!-- / mention -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/mention/mention.min.js');?>' type='text/javascript'></script>
    <!-- / input mask -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/input_mask/bootstrap-inputmask.min.js');?>' type='text/javascript'></script>
    <!-- / fileinput -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileinput/bootstrap-fileinput.js');?>' type='text/javascript'></script>
    <!-- / modernizr -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/modernizr/modernizr.min.js');?>' type='text/javascript'></script>
    <!-- / retina -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/retina/retina.js');?>' type='text/javascript'></script>
    <!-- / fileupload -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/tmpl.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/load-image.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/canvas-to-blob.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/jquery.iframe-transport.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/jquery.fileupload.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/jquery.fileupload-fp.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/jquery.fileupload-ui.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/fileupload/jquery.fileupload-init.js');?>' type='text/javascript'></script>
    <!-- / timeago -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/timeago/jquery.timeago.js');?>' type='text/javascript'></script>
    <!-- / slimscroll -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/slimscroll/jquery.slimscroll.min.js');?>' type='text/javascript'></script>
    <!-- / autosize (for textareas) -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/autosize/jquery.autosize-min.js');?>' type='text/javascript'></script>
    <!-- / charCount -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/charCount/charCount.js');?>' type='text/javascript'></script>
    <!-- / validate -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/validate/jquery.validate.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/validate/additional-methods.js');?>' type='text/javascript'></script>
    <!-- / naked password -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/naked_password/naked_password-0.2.4.min.js');?>' type='text/javascript'></script>
    <!-- / nestable -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/nestable/jquery.nestable.js');?>' type='text/javascript'></script>
    <!-- / tabdrop -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/tabdrop/bootstrap-tabdrop.js');?>' type='text/javascript'></script>
    <!-- / jgrowl -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/jgrowl/jquery.jgrowl.min.js');?>' type='text/javascript'></script>
    <!-- / bootbox -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootbox/bootbox.min.js');?>' type='text/javascript'></script>
    <!-- / inplace editing -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/xeditable/bootstrap-editable.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/xeditable/wysihtml5.js');?>' type='text/javascript'></script>
    <!-- / ckeditor -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/ckeditor/ckeditor.js');?>' type='text/javascript'></script>
    <!-- / filetrees -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/dynatree/newjquery.dynatree.js');?>' type='text/javascript'></script>

    <!-- / datetime picker -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js');?>' type='text/javascript'></script>
    <!-- / daterange picker -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootstrap_daterangepicker/moment.min.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js');?>' type='text/javascript'></script>
    <!-- / max length -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootstrap_maxlength/bootstrap-maxlength.min.js');?>' type='text/javascript'></script>
    <!-- / dropdown hover -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/bootstrap_hover_dropdown/twitter-bootstrap-hover-dropdown.min.js');?>' type='text/javascript'></script>
    <!-- / slider nav (address book) -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/slider_nav/slidernav-min.js');?>' type='text/javascript'></script>
    <!-- / fuelux -->
    <script src='<?php echo uri('public/assets/javascripts/plugins/fuelux/wizard.js');?>' type='text/javascript'></script>
    <!-- / flatty theme -->
    <script src='<?php echo uri('public/assets/javascripts/nav.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/tables.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/theme.js');?>' type='text/javascript'></script>
    <!-- / demo -->
    <script src='<?php echo uri('public/assets/javascripts/demo/jquery.mockjax.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/demo/inplace_editing.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/demo/charts.js');?>' type='text/javascript'></script>
    <script src='<?php echo uri('public/assets/javascripts/demo/demo.js');?>' type='text/javascript'></script>

    <script src='<?php echo uri('public/assets/javascripts/mingmitr/notify.js');?>' type='text/javascript'></script>
    <script src="<?php echo uri('public/dist/jquery.fancytree-all.js');?>" type="text/javascript"></script>

    <script type="text/javascript">
        $(function(){
            
        });
    </script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<?php
// $mobile = detect_mobile();
$close_tab = "";
// if ($mobile===true) {
//     $close_tab = "main-nav-closed";
// }
?>
<body class='contrast-red <?php echo $close_tab;?>'>
<header id="topbar">
    <div class='navbar'>
        <div class='navbar-inner'>
            <div class='container-fluid'>
                <a class='brand' href='#'>
                    <i class='icon-coffee'></i>
                    <span class='hidden-phone'>Hospital Queue</span>
                </a>
                <a class='toggle-nav btn pull-left' href='#'>
                    <i class='icon-reorder'></i>
                </a>
                <ul class='nav pull-right'>
                    <li class='dropdown dark user-menu'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                            <img alt='Mila Kunis' height='23' src='<?php //echo $user_data['picture']['link'];?>?width=23' width='23' />
                            <span class='user-name hidden-phone'><?php //echo $user_data['display_name'];?> </span>
                            <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                            <!--
                            <li>
                                <a href='user_profile.html'>
                                    <i class='icon-user'></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a href='user_profile.html'>
                                    <i class='icon-cog'></i>
                                    Settings
                                </a>
                            </li>
                            <li class='divider'></li>
                            -->
                            <li>
                                <a href='<?php echo uri('user/logout/');?>'>
                                    <i class='icon-signout'></i>
                                    Sign out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<div id='wrapper'>
<div id='main-nav-bg'></div>
<nav class='' id='main-nav'>
<div class='navigation'>
<?php 
/*
?>
<div class='search'>
    <form accept-charset="UTF-8" action="search_results.html" method="get" /><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
        <div class='search-wrapper'>
            <input autocomplete="off" class="search-query" id="q" name="q" placeholder="Search..." type="text" value="" />
            <button class="btn btn-link icon-search" name="button" type="submit"></button>
        </div>
    </form>
</div>
<?php 
*/
?>
<?php
// $appname = Application::$app_name;
// $submenu = Application::$menu_param_1;
$appname = null;
$submenu = null;
?>
<ul class='nav nav-stacked'>
    <?php
    $report_active = $appname=="report" ? "active" : "" ;
    ?>
    <li class='<?php echo $report_active;?>'>
        <a href='<?php echo uri('report/');?>'>
            <i class='icon-file-alt'></i>
            <span>Report</span>
        </a>
    </li>
    <?php
    $news_active = $appname=="news" ? "active" : "" ;
    ?>
    <li class='<?php echo $news_active;?>'>
        <a href='<?php echo uri('news/');?>'>
            <i class='pla2-left-update'></i>
            <span>Update</span>
        </a>
    </li>
    <?php
    $menu_active = "";
    if($submenu==529 OR $submenu==516 OR $submenu==500 OR $submenu==20){
        $menu_active = 'active';
    }
    ?>
    <li class='<?php echo $menu_active;?>'>
        <a class="dropdown-collapse in" href="#">
            <i class='pla2-left-menu'></i>
            <span>Menu</span>
            <i class="icon-angle-down angle-down"></i>
        </a>
        <ul class="nav nav-stacked in" style="display: block;">
            <?php 
            $drink_active = $submenu==529 ? "active" : "" ;
            ?>
            <li class="<?php echo $drink_active;?>">
                <a href="<?php echo uri('foldertype/index/529');?>">
                    <i class="icon-caret-right"></i>
                    <span>Drinks</span>
                </a>
            </li>
            <?php 
            $dessert_active = $submenu==516 ? "active" : "" ;
            ?>
            <li class="<?php echo $dessert_active;?>">
                <a href="<?php echo uri('foldertype/index/516');?>">
                    <i class="icon-caret-right"></i>
                    <span>Desserts</span>
                </a>
            </li>
            <?php 
            $bean_active = $submenu==500 ? "active" : "" ;
            ?>
            <li class="<?php echo $bean_active;?>">
                <a href="<?php echo uri('foldertype/index/500');?>">
                    <i class="icon-caret-right"></i>
                    <span>Coffee Bean</span>
                </a>
            </li>
            <?php 
            $fc_active = $submenu==20 ? "active" : "" ;
            ?>
            <li class="<?php echo $fc_active;?>">
                <a href="<?php echo uri('foldertype/index/20');?>">
                    <i class="icon-caret-right"></i>
                    <span>Franchise</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
    $member_active = "";
    if($appname=="stamp" OR $submenu=="reward"){
        $member_active = 'active';
    }
    ?>
    <li class='<?php echo $member_active;?>'>
        <a class="dropdown-collapse in" href="#">
            <i class='pla2-left-member'></i>
            <span>Member</span>
            <i class="icon-angle-down angle-down"></i>
        </a>
        <ul class="nav nav-stacked in" style="display: block;">
    	    <?php
    	    $stamp_active = $appname=="stamp" ? "active" : "" ;
    	    ?>
            <li class="<?php echo $stamp_active;?>">
                <a href="<?php echo uri('stamp/');?>">
                    <i class="icon-caret-right"></i>
                    <span>Stamp</span>
                </a>
            </li>
    	    <?php
    	    $reward_active = $appname=="reward" ? "active" : "" ;
    	    ?>
            <li class="<?php echo $reward_active;?>">
                <a href="<?php echo uri('reward/');?>">
                    <i class="icon-caret-right"></i>
                    <span>Reward</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
    $contact_active = $appname=="contact" ? "active" : "" ;
    ?>
    <li class='<?php echo $contact_active;?>'>
        <a href='<?php echo uri('contact/');?>'>
            <i class='pla2-left-contact'></i>
            <span>Contact</span>
        </a>
    </li>
</ul>

</div> 
<!-- End navigation -->
<style type="text/css">
#wrapper {
    /* margin-right: 240px; */
}
#topbar {
    position: relative;
    z-index: 1;
}
#update-notify-wrap {
    position: fixed;
    right: 0;
    top: 0;
    width: 240px;
    background: #f4f4f4;
    border-left: 1px solid #D3D3D3;
}
.header-update-notify-wrap {
    line-height: 40px;
    padding: 0 20px;
}
.notify-list-wrap {
    overflow: auto;
}
.border-bottom {
    border-top: 1px solid #CECECE;
    border-bottom: 1px solid #F0F0F0;
}
.notify {
    padding: 10px 10px;
    background: #f7f7f7;
    cursor: pointer;
}
.notify.opened {
    background: #E4E4E4;
}
.notify .badge {
    background: red;
    color: white;
    display: block;
}
.notify.opened .badge {
    display: none;
}
.notify-thumb {
    padding: 0px 6px;
}
.notify-list .load-more {
    padding: 6px 20px;
    cursor: pointer;
}
</style>
</nav>
    <section id="update-notify-wrap" style="display: none;">
        <div class="header-update-notify-wrap">
            Order
        </div>
        <div class="notify-list-wrap">
            <div class="notify-list">
                <?php /*for($i=1000; $i<1015; $i++){?>
                    <div class="border-bottom"></div>
                    <div class="notify <?php if($i>=1003) {echo "opened";}?>">
                        <?php if($i<1003) {?>
                        <span class="badge pull-right">N</span>
                        <?php }?>
                        <div class="pull-left notify-thumb">
                            <img src="http://mingmitrapi.pla2api.com/picture/0?width=43&height=43">
                        </div>
                        <div>
                            <strong><?php echo $i;?></strong>
                            <div>
                                <small>
                                    Contrary to popular belief
                                </small>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } */?>
            </div>
        </div>
    </section>
    <section id='content'>
        <div class='container-fluid'>
            <div class='row-fluid' id='content-wrapper'>
                <div class='span12'>
