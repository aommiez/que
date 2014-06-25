<style type="text/css">
#slide-wrap {
    -webkit-transition: 500ms all;
    -moz-transition: 500ms all;
    transition: 500ms all;
}

.show-iframe {
    border: 0;
    margin: 0;
    display: block;
    float: left;
}
</style>
<div id="slide-wrap" data-section="0" style="height: 100%; width: 3000px;">
<iframe class="show-iframe" height="100%" width="400" src="index.php?page=user/show2&pt_type=ทั่วไป"></iframe>
<iframe class="show-iframe" height="100%" width="400" src="index.php?page=user/show2&pt_type=FollowUp"></iframe>
<iframe class="show-iframe" height="100%" width="400" src="index.php?page=user/show2&pt_type=Chronic"></iframe>
<iframe class="show-iframe" height="100%" width="400" src="index.php?page=user/show2&pt_type=ตรวจสุขภาพ"></iframe>
<iframe class="show-iframe" height="100%" width="400" src="index.php?page=user/show2&pt_type=เฉพาะทาง"></iframe>
<iframe class="show-iframe" height="100%" width="400" src="index.php?page=user/show2&pt_type=ตรวจสุขภาพ"></iframe>
<iframe class="show-iframe" height="100%" width="400" src="index.php?page=user/show2&pt_type=อื่นๆ"></iframe>
</div>
<script type="text/javascript">
$(function(){
    var sw = $('#slide-wrap');
    function slide(){
        var section = sw.data('section');
        section++;
        if(section >= 7){
            section = 0;
        }

        var left = -(section*400);
        sw.css('margin-left', left+'px');
        sw.data('section', section);
    }

    setInterval(slide, 5000);
});
</script>

<script type="text/javascript">
$(function(){
    var last_id = 'init';
    function pull(){
        $.get('index.php?page=pull/user/call', {last_id: last_id}, function(data){
            last_id = data.last_id;
            if(data.call){
                var params = [
                    'height='+screen.height,
                    'width='+screen.width,
                    'left=0',
                    'top=0'
                    //'fullscreen=yes' // only works in IE, but here for completeness
                ].join(',');
                window.open('index.php?page=user/call&id='+data.call.id, '', params);
            }
            pull();
        }, 'json');
    }

    pull();
});
</script>