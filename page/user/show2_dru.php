<style type="text/css">
.yellow-bg {
    background-color: #FEFCCB;
    border-bottom-color: #E5DB55;
    border-bottom-width: 3px;
    border-bottom-style: solid;
}
.red-background-remark {
    background: #FFD2D3;
    border-bottom-color: #DF8F90;
    border-bottom-width: 3px;
    border-bottom-style: solid;
}
</style>
<div class="row-fluid dep-ctx">
    <div class="span12 box">
        <div class="box-header red-background">
            <div class="title">
                <i class="icon-list"></i> รายชื่อคิว
            </div>
        </div>
        <div class="box-content" style="padding:0px;">

        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    var ctx = $('.dep-ctx');
    var last_ts = 0;

    function fetchYellow(){
        $('.que-ctx').each(function(index, el){
            var datetime = $(this).attr('datetime');
            var date = new Date(datetime);
            var now = new Date();

            if(date.getTime() < (now.getTime()-(30*60000))){
                $(this).addClass('yellow-bg');
            }
        });
    }

    fetchYellow();
    setInterval(fetchYellow, 5000);

    function pull(){
        $.post('index.php?page=pull/show2_dru', {last_ts: last_ts}, function(data){
            last_ts = data.last_ts;
            if(data.update){
                var html = data.html;
                $('.box-content', ctx).html(html);
            }
            fetchYellow();
            pull();
        }, 'json');
    }
    pull();
});
</script>
<script type="text/javascript">
$(function(){
    var last_id = 'init';
    function pull(){
        $.post('index.php?page=pull/user/call_dru', {last_id: last_id}, function(data){
            last_id = data.last_id;
            if(data.call){
                var params = [
                    'height='+screen.height,
                    'width='+screen.width,
                    'left=0',
                    'top=0'
                    //'fullscreen=yes' // only works in IE, but here for completeness
                ].join(',');
                window.open('index.php?page=user/call&user_id='+data.call.vn_id+'&dru=yes', '', params);
            }
            pull();
        }, 'json');
    }

    pull();
});
</script>