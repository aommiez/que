<?php
$em = Local::getEM();
$config = $em->getRepository('Main\Entity\Que\Config')->find($_GET['id']);
$deps_id = json_decode($config->getDepsId());
$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb->where('a.skip=0')
    ->andWhere($qb->expr()->in('a.dep_id', $deps_id));
?>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-list'></i>
                <span>User queue list</span>
            </h1>
            <div class='pull-right'>
                <div class='btn-group'>
                    <a href="index.php?page=department/list" class="btn btn-success"><i class='icon-chevron-left'></i>
                        Back to config
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">

    <div class='span12 box box-collapsed'>
        <div class="box-header red-background">
            <div class="title">
                Department Config
            </div>
            <div class="actions">
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i> </a>
            </div>
        </div>

        <div class="box-content">
            <script type="text/javascript">
                $(function(){
                    $('#form-scan').submit(function(){
                        window.open('index.php?page=user/scan', '', 'width=300, height=100, top=0');
                    });

                     $('form#formScan').submit(function(){
                        $('#showScan').show();
                        return false;
                    });
                });

                $(window).keydown(function(e) {
                    if (e.keyCode == 120) {
                        $("#search").focus();
                    }

                    var tag = e.target.tagName.toLowerCase();
                    if ( tag != 'input' && tag != 'textarea'){
                        if (e.which===81) {

                        }else if(e.which===87){
                            userAction('skip');
                        }else if (e.which===69) {
                            userAction('hide');
                        }
                    }
                });

                function userAction(action){
                    if (action==='skip') {
                        // Do some script

                    }else if (action==='hide') {
                        // Do some script
                    }

                    $('#showScan').slideUp(200);
                }
            </script>
            <form id="form-scan" class="form form-horizontal validate-form" method="post" action="" style="margin: 0;">

                <div class="control-group">
                    <div class="control-label">
                        <label><i class="icon-bell"></i></label>
                    </div>
                    <div class="controls">
                        <button class="btn btn-success" name="button" type="submit">กริ่ง</button>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label for="validation_secret">Prefix name</label>
                        <small class="muted">คำนำหน้าก่อนเรียกชื่อคน</small>
                    </div>
                    <div class="controls">
                        <input class="span3" disabled="" id="full-name1" type="text">
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label for="validation_secret">Prefix department</label>
                        <small class="muted">คำนำหน้าก่อนเรียกชื่อห้อง</small>
                    </div>
                    <div class="controls">
                        <input class="span3" disabled="" id="full-name1" type="text">
                        <select id="inputSelect">
                            <option>OPD 1</option>
                            <option>OPD 2</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label for="validation_secret">Suffix</label>
                    </div>
                    <div class="controls">
                        <input class="span3" disabled="" id="full-name1" type="text">
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn btn-primary" type="submit">
                        <i class="icon-save"></i>
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row-fluid">
    <div class='span12 box'>
        <div class="box-header red-background">
            <div class="title">
                Scan barcode
            </div>
            <div class="actions">
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i> </a>
            </div>
        </div>

        <div class="box-content">
            <div class="row-fluid">
                <div class="span6">
                    <form action="#" method="post" id="formScan">
                        <input type="text" name="search" style="margin: 0;" id="search">
                        <button class="btn">Scan</button>
                        <a class="btn" href="#" onclick="window.open('index.php?page=user/show', '', 'width=400, height=600');">Show User List</a>
                    </form>
                </div>
                <div class="span6 text-right">
                    <div class="">
                        <span>Select Department</span>
                        <select id="inputSelect">
                            <option>OPD 1</option>
                            <option>OPD 2</option>
                        </select>
                    </div>
                </div>
            </div>
                
            <div class="row-fluid" id="showScan" style="display:none;">
                <div class="span6 text-center">
                    <h3>Kritsanasak Kuntaros</h3>
                    <img alt="250x150" src="http://placehold.it/250x150">
                </div>
                <div class="span6">
                    <div class='text-center' style="padding-top: 50px">
                        <a class='btn btn-success btn-large' href='#'>
                            <i class='icon-bullhorn'></i>
                            Call
                        </a>
                        <a class='btn btn-large' href='javascript:void(0);' onclick="userAction('skip')">
                            <i class='icon-mail-forward'></i>
                            Skip
                        </a>
                        <a class='btn btn-danger btn-large' href='javascript:void(0);' onclick="userAction('hide')">
                            <i class='icon-remove'></i>
                            Hide
                        </a>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>

<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header red-background'>
            <div class='title'>User queue</div>
        </div>
        <div class='box-content'>

            <div class='tabbable' style='margin-top: 20px'>
                <ul class='nav nav-responsive nav-tabs'>
                    <li class='active'>
                        <a data-toggle='tab' href='#showUsers'>
                            Show
                        </a>
                    </li>
                    <li class=''>
                        <a data-toggle='tab' href='#hideUsers'>
                            Hide
                        </a>
                    </li>
                </ul>

                <div class='tab-content'>
                    <div class="tab-pane active" id="showUsers">
                        <div class='responsive-table'>
                            <div class='scrollable-area'>
                                <table class='table table-bordered table-hover table-striped' style='margin-bottom:0;'>
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" title="Check/Uncheck All">
                                        </th>
                                        <th>
                                            User name
                                        </th>
                                        <th>
                                            <div class="text-center">Action</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="id[]"></td>
                                        <td>User name 1</td>
                                        <td>
                                            <div class='text-center'>
                                                <a class='btn btn-success' href='#'>
                                                    <i class='icon-bullhorn'></i>
                                                    Call
                                                </a>
                                                <a class='btn' href='#'>
                                                    <i class='icon-mail-forward'></i>
                                                    Skip
                                                </a>
                                                <a class='btn btn-danger' href='#'>
                                                    <i class='icon-remove'></i>
                                                    Hide
                                                </a>
                                                <input type="text" placeholder="Remark">
                                                <a class='btn btn-info' href='#'>
                                                    <i class='icon-info'></i>
                                                    Save
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="id[]"></td>
                                        <td>User name 2</td>
                                        <td>
                                            <div class='text-center'>
                                                <a class='btn btn-success' href='#'>
                                                    <i class='icon-bullhorn'></i>
                                                    Call
                                                </a>
                                                <a class='btn' href='#'>
                                                    <i class='icon-mail-forward'></i>
                                                    Skip
                                                </a>
                                                <a class='btn btn-danger' href='#'>
                                                    <i class='icon-remove'></i>
                                                    Hide
                                                </a>
                                                <a class='btn btn-info' href='#'>
                                                    <i class='icon-info'></i>
                                                    Remark
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="hideUsers">
                        <div class='responsive-table'>
                            <div class='scrollable-area'>
                                <table class='table table-bordered table-hover table-striped' style='margin-bottom:0;'>
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" title="Check/Uncheck All">
                                        </th>
                                        <th>
                                            User name
                                        </th>
                                        <th>
                                            <div class="text-center">Action</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox" name="id[]"></td>
                                        <td>User name 3</td>
                                        <td>
                                            <div class='text-center'>
                                                <a class='btn btn-success' href='#'>
                                                    <i class='icon-bullhorn'></i>
                                                    Call
                                                </a>
                                                <a class='btn' href='#'>
                                                    <i class='icon-mail-forward'></i>
                                                    Skip
                                                </a>
                                                <a class='btn btn-danger' href='#'>
                                                    <i class='icon-remove'></i>
                                                    Hide
                                                </a>
                                                <a class='btn btn-info' href='#'>
                                                    <i class='icon-info'></i>
                                                    Remark
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="id[]"></td>
                                        <td>User name 4</td>
                                        <td>
                                            <div class='text-center'>
                                                <a class='btn btn-success' href='#'>
                                                    <i class='icon-bullhorn'></i>
                                                    Call
                                                </a>
                                                <a class='btn' href='#'>
                                                    <i class='icon-mail-forward'></i>
                                                    Skip
                                                </a>
                                                <a class='btn btn-danger' href='#'>
                                                    <i class='icon-remove'></i>
                                                    Hide
                                                </a>
                                                <a class='btn btn-info' href='#'>
                                                    <i class='icon-info'></i>
                                                    Remark
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END HIDE USER -->
                </div>
            </div>




                        


        </div>
    </div>
</div>