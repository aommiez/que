<div class="row-fluid dep-ctx">
    <div class="span12 box">
        <div class="box-header red-background">
            <div class="title">
                Drug
            </div>
        </div>
        <div class="box-content">

        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    var ctx = $('.dep-ctx');
    var last_ts = 0;

    function pull(){
        $.post('index.php?page=pull/show2_dru', {last_ts: last_ts}, function(data){
            last_ts = data.last_ts;
            if(data.update){
                var html = data.html;
                $('.box-content', ctx).html(html);
            }
            pull();
        }, 'json');
    }
    pull();
});
</script>