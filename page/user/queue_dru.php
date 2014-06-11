<?php
$em = Local::getEM();
//$config = $em->getRepository('Main\Entity\Que\Config')->find($_GET['id']);
$qb = $em->getRepository('Main\Entity\Que\Que')->createQueryBuilder('a');
$qb->where('a.skip_drug=0')
    ->andWhere('a.dru=1');

$results = $qb->getQuery()->getResult();

$shows = array();
$hides = array();
$last_ts = 0;
foreach($results as $q){
    /** @var \Main\Entity\Que\Que $q */
    if($q->getHide()){
        $hides[] = $q->toArray();
    }
    else {
        $shows[] = $q->toArray();
    }
    $dt = $q->getUpdatedAt()->getTimestamp();
    if($dt > $last_ts){
        $last_ts = $dt;
    }
}

$deps = $em->getRepository('Main\Entity\Que\Dep')->findAll();
?>
<style type="text/css">
.table-striped tbody > tr:nth-child(odd) > td,
.table-hover tbody tr:hover > td
{
    background: none;
}
</style>
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
                Dru
            </div>
            <div class="actions">
                <a href="#" class="btn box-collapse btn-mini btn-link"><i></i> </a>
            </div>
        </div>

        <div class="box-content">
            <script type="text/javascript">
                $(function(){
                    $('#form-scan').submit(function(){
                        window.open('index.php?page=user/scan', '', 'width=100%, height=100%, top=0');
                    });

                    var sc = $('#showScan');

                    $('form#formScan').submit(function(){
                        var dep_id = 0;
                        var vn_id = $('#search', this).val();
                        var trQ = $('.que-tr[hn_id="'+ vn_id +'"]');
                        if(trQ.size()==0){
                            return;
                        }

                        $('.s-name', sc).text($('.hn_name', trQ).text());
                        $('.s-img', sc);

                        $('.s-call-btn', sc).unbind('click.call').bind('click.call', function(e){
                            e.preventDefault();
                            $('.call-btn', trQ).click();
                        });

                        $('.s-skip-btn', sc).unbind('click.skip').bind('click.skip', function(e){
                            e.preventDefault();
                            $('.skip-btn', trQ).click();
                        });

                        $('.s-hide-btn', sc).unbind('click.hide').bind('click.hide', function(e){
                            e.preventDefault();
                            $('.hide-btn', trQ).click();
                        }).find('span').text($('.hide-btn', trQ).text());

                        $('.s-remark-input', sc).unbind('keyup.remark').bind('keyup.remark', function(e){
                            //e.preventDefault();
                            $('.remark-input', trQ).val($('.s-remark-input', sc).val());
                        }).val($('.remark-input', trQ).val());

                        $('.s-remark-btn', sc).unbind('click.remark').bind('click.remark', function(e){
                            e.preventDefault();
                            $('.remark-btn', trQ).click();
                        });

                        $('#showScan').show();
                        $('#search', this).val('');

                        return false;
                    });

                    /*
                    $("#search").keypress(function(e){
                        if(e.which == 13){
                            e.preventDefault();
                            $('form#formScan').submit();
                        }
                    });
                    */



                    $(window).keydown(function(e) {
                        if (e.keyCode == 120) {
                            $("#search").focus();
                            return;
                        }

                        var tag = e.target.tagName.toLowerCase();
                        if ( (tag != 'input' && tag != 'textarea') || e.target.id=='search'){
                            if (e.which===117) {
                                userAction('call');
                            }else if(e.which===118){
                                userAction('skip');
                            }else if (e.which===119) {
                                userAction('hide');
                            }
                        }

                        function userAction(action) {
                            e.preventDefault();

                            if (action==='skip') {
                                // Do some script
                                $('.s-skip-btn', sc).click();
                                sc.slideUp();

                            }
                            else if (action==='hide') {
                                // Do some script
                                $('.s-hide-btn', sc).click();

                            }
                            else if(action==='call'){
                                // Do call
                                $('.s-call-btn', sc).click();

                            }
                        }
                    });
                });

            </script>
            <audio id="sound1" controls style="display:none;">
                <source src="public/sounds/doorbell-1.wav" type="audio/wav">
            </audio>
            <audio id="sound2" controls style="display:none;">
                <source src="public/sounds/doorbell-2.wav" type="audio/wav">
            </audio>
            <script type="text/javascript">
                $(function(){
                    $('#ding-dong').click(function(){
                        var sound = $('#soundInput').val();
                        document.getElementById(sound).play();
                    });
                });
            </script>
            <form id="form-scan" class="form form-horizontal validate-form" method="post" action="" style="margin: 0;">

                <div class="control-group">
                    <div class="control-label">
                        <label><i class="icon-bell"></i></label>
                    </div>
                    <div class="controls">
                        <select id="soundInput">
                            <option value="sound1">เสียงกริ่งแบบที่ 1</option>
                            <option value="sound2">เสียงกริ่งแบบที่ 2</option>
                        </select>
                        <button id="ding-dong" class="btn btn-success" name="button" type="button">กริ่ง</button>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label for="validation_secret">Prefix name</label>
                        <small class="muted">คำนำหน้าก่อนเรียกชื่อคน</small>
                    </div>
                    <div class="controls">
                        <input class="span3" disabled="" id="full-name1" type="text" value="ขอเชิญคุณ">
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label for="validation_secret">Prefix department</label>
                        <small class="muted">คำนำหน้าก่อนเรียกชื่อห้อง</small>
                    </div>
                    <div class="controls">
                        <input class="span3" disabled="" id="full-name1" type="text" value="ที่ห้อง">
                        <select id="">
                            <?php foreach($deps as $key=> $value){  ?>
                            <option value="<?php echo $value->getId();?>"><?php echo $value->getName();?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <div class="control-label">
                        <label for="validation_secret">Suffix</label>
                    </div>
                    <div class="controls">
                        <input class="span3" disabled="" id="full-name1" type="text" value="ด้วยค่ะ">
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
                    </form>
                </div>
                <div class="span6 text-right">
                    <div class="">
                        <script type="text/javascript">
                        $(function(){
                            $('#select_department').change(function(e){
                                var val = $(this).val();
                                $('.que-tr').show();
                                if(val=='all'){
                                    return;
                                }
                                $('.que-tr[dep_id!="'+val+'"]').hide();
                            });
                        });
                        </script>
                    </div>
                </div>
            </div>
                
            <div class="row-fluid" id="showScan" style="display:none;">
                <div class="span6 text-center">
                    <h3 class="s-name"></h3>
                    <img alt="250x150" class="s-img" src="http://placehold.it/250x150">
                </div>
                <div class="span6">
                    <div class='text-center' style="padding-top: 50px">
                        <a class='btn btn-success btn-large s-call-btn' href='#'>
                            <i class='icon-bullhorn'></i>
                            Call
                        </a>
                        <a class='btn btn-large'>
                            <i class='icon-mail-forward s-skip-btn'></i>
                            Skip
                        </a>
                        <a class='btn btn-danger btn-large s-hide-btn'>
                            <i class='icon-remove'></i>
                            <span>Hide</span>
                        </a>
                        <input class="s-remark-input">
                        <a class='btn btn-info remark-btn s-remark-btn'>
                            <i class='icon-info'></i>
                            Save
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


            <div>
                <span>Department</span>
                <select id="select_department">
                    <option value="all">All</option>
                    <?php foreach($deps as $key=> $value){  ?>
                        <option value="<?php echo $value->getId();?>"><?php echo $value->getName();?></option>
                    <?php }?>
                </select>

                <a class="btn" href="#" onclick="window.open('index.php?page=user/show2_dru', '', 'width=400, height='+screen.height);">Show User List</a>
            </div>

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
                                            HN ID
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            <div class="text-center">Action</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="show-queue-list">
                                    <?php foreach($shows as $item){?>
                                    <tr class="que-tr <?php if(!empty($item['remark'])) echo "red-background";?>"
                                        vn_id="<?php echo $item['vn_id'];?>"
                                        hn_id="<?php echo $item['hn_id'];?>"
                                        dep_id="<?php echo $item['dep_id'];?>">

                                        <td><input type="checkbox" name="id[]"></td>
                                        <td><?php echo $item['hn_id'];?></td>
                                        <td class="hn_name"><?php echo $item['p_name'];?> <?php echo $item['p_surname'];?></td>
                                        <td>
                                            <div class='text-center'>
                                                <a class='btn btn-success call-btn' href="index.php?page=user/call&user_id=<?php echo $item['vn_id'];?>">
                                                    <i class='icon-bullhorn'></i>
                                                    Call
                                                </a>
                                                <a class='btn skip-btn' href='index.php?page=user/skip&vn_id=<?php echo $item['vn_id'];?>'>
                                                    <i class='icon-mail-forward'></i>
                                                    Skip
                                                </a>
                                                <a class='btn btn-danger hide-btn' href='index.php?page=user/hide&vn_id=<?php echo $item['vn_id'];?>'>
                                                    <i class='icon-remove'></i>
                                                    <span>Hide</span>
                                                </a>
                                                <input type="text" placeholder="Remark" class="remark-input" value="<?php echo $item['remark'];?>">
                                                <a class='btn btn-info remark-btn' href='index.php?page=user/remark&vn_id=<?php echo $item['vn_id'];?>'>
                                                    <i class='icon-info'></i>
                                                    Save
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="hideUsers">
                        <div class='responsive-table'>
                            <div class='scrollable-area'>
                                <table class='table table-bordered table-hover table-striped' style='margin-bottom:0;'>
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" title="Check/Uncheck All">
                                        </th>
                                        <th>
                                            HN ID
                                        </th>
                                        <th>
                                            name
                                        </th>
                                        <th>
                                            <div class="text-center">Action</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="hide-queue-list">
                                    <?php foreach($hides as $item){?>
                                    <tr class="que-tr <?php if(!empty($item['remark'])) echo "red-background";?>"
                                        vn_id="<?php echo $item['vn_id'];?>"
                                        hn_id="<?php echo $item['hn_id'];?>"
                                        dep_id="<?php echo $item['dep_id'];?>">

                                        <td><input type="checkbox" name="id[]"></td>
                                        <td><?php echo $item['hn_id'];?></td>
                                        <td class="hn_name"><?php echo $item['p_name'];?> <?php echo $item['p_surname'];?></td>
                                        <td>
                                            <div class='text-center'>
                                                <a class='btn btn-success call-btn' href='index.php?page=user/call&user_id=<?php echo $item['vn_id'];?>'>
                                                    <i class='icon-bullhorn'></i>
                                                    Call
                                                </a>
                                                <a class='btn skip-btn' href='index.php?page=user/skip&vn_id=<?php echo $item['vn_id'];?>'>
                                                    <i class='icon-mail-forward'></i>
                                                    Skip
                                                </a>
                                                <a class='btn btn-danger hide-btn' href='index.php?page=user/hide&vn_id=<?php echo $item['vn_id'];?>'>
                                                    <i class='icon-remove'></i>
                                                    <span>Show</span>
                                                </a>
                                                <input type="text" placeholder="Remark" class="remark-input" value="<?php echo $item['remark'];?>">
                                                <a class='btn btn-info remark-btn' href='index.php?page=user/remark&vn_id=<?php echo $item['vn_id'];?>'>
                                                    <i class='icon-info'></i>
                                                    Save
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }?>
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

<script type="text/javascript">
$(function(){
    var last_ts = <?php echo $last_ts;?>;
    function clickSkip(e){
        e.preventDefault();
        var btn = $(this);
        if(btn.prop('disabled')) return;
        //if(!window.confirm('Skip?')) return;

        btn.prop('disabled', true);

        var tr = btn.closest('tr.que-tr');
        var vn_id = tr.attr('vn_id');
        $.post('index.php?page=user/skip', {vn_id: vn_id}, function(data){
            if(data.success){
                skip(tr);
            }
            btn.prop('disabled', false);
        }, 'json');
    }

    function skip(tr){
        $(tr).fadeOut(function(e){
            //$(this).remove();
        });
    }

    function clickRemark(e){
        e.preventDefault();
        var btn = $(this);
        if(btn.prop('disabled')) return;
        if(!window.confirm('Remark?')) return;
        btn.prop('disabled', true);

        var tr = btn.closest('tr.que-tr');
        var vn_id = tr.attr('vn_id');
        var input = $('.remark-input', tr);
        var remarkString = input.val();

        input.prop('disabled', true);
        $.post('index.php?page=user/remark', {vn_id: vn_id, remark: remarkString}, function(data){
            if(data.success){
                //remark(tr, remarkString);
            }
            btn.prop('disabled', false);
            input.prop('disabled', false);
        }, 'json');
    }

    function remark(tr, text){
        console.log(text);
        if(text != "") {
            tr.addClass('red-background');
            console.log('if');
        }
        else {
            tr.removeClass('red-background');
            console.log('else');
        }
        $('.remark-input', tr).val(text);
    }

    function clickHide(e){
        e.preventDefault();
        var btn = $(this);
        if(btn.prop('disabled')) return;

        var tr = btn.closest('tr.que-tr');
        var vn_id = tr.attr('vn_id');
        var isHide = $('span', btn).text()=='Show';

        //if(!window.confirm('Hide?')) return;
        btn.prop('disabled', true);


        $.post('index.php?page=user/hide', {vn_id: vn_id, hide: (!isHide)? 1: 0}, function(data){
            if(data.success){
                //hide(tr, data.hide);
            }
            btn.prop('disabled', false);
        }, 'json');
    }

    function hide(tr, isHide){
        var vn_id = tr.attr('vn_id');
        var text = 'Hide';
        var table = $('.show-queue-list');
        if(isHide) {
            table = $('.hide-queue-list');
            text = 'Show';
        }

        var trs = table.find('tr');
        if(trs.size() == 0){
            table.append(tr);
            var btn = $('.hide-btn', tr);
            $('span', btn).text(text);
            return;
        }

        vn_id = parseInt(vn_id);
        var i = 0;
        trs.each(function(index, el){
            i = index;
            var $el = $(el);
            if($el.attr('vn_id') < vn_id){
                $el.before(tr);
                return false;
            }
        });

        if(i == trs.size()-1){
            trs.last().after(tr);
        }
        $('.hide-btn span', tr).text(text);
    }

    function clickCall(e){
        e.preventDefault();
        var link = $(this).attr('href');
        var params = [
            'height='+screen.height,
            'width='+screen.width,
            'left=0',
            'top=0'
            //'fullscreen=yes' // only works in IE, but here for completeness
        ].join(',');
        window.open(link, '', params);
    }

    function pull(){
        $.post('index.php?page=pull/user/queue_dru', {last_ts: last_ts}, function(data){
            last_ts = data.last_ts;
            $(data.list).each(function(i, obj){
                var tr =  $('tr[vn_id="'+obj.vn_id+'"]');
                if(obj.skip_dru==1){
                    skip(tr);
                    return;
                }

                var remarkInput = $('.remark-input', tr);
                //if(remarkInput.val() != obj.remark){
                    remark(tr, obj.remark);
                //}

                var isHide = $('.hide-btn span', tr).text()=='Show';
                if(isHide != obj.hide){
                    hide(tr, obj.hide);
                }
            });
            pull();
        }, 'json');
    }

    pull();

    $('.skip-btn').click(clickSkip);
    $('.remark-btn').click(clickRemark);
    $('.hide-btn').click(clickHide);
    $('.call-btn').click(clickCall);
});
</script>