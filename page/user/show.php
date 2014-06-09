<style type="text/css">
.que {
    line-height: 44px;
    padding: 4px 0;
    border-bottom: 1px solid darkgray;
}
.que-vn_id {
    padding: 0 10px;
}
</style>
<div class='row-fluid show-que'>
</div>
<script type="text/javascript">
$(function(){
    var wrap = $('.show-que');
    function createRow(item){
        var el = $('<div class="que"></div>');
        el.append('<div class="span4 que-vn_id">'+item.vn_id+'</div>');
        el.append('<div class="span4 que-name">'+item.p_name+' '+item.p_surname+'</div>');
        el.append('<div class="span4 dep-name">'+item.dep_name+'</div>');
        el.append('<div class="clearfix"></div>');
        return el;
    }

    function pull(lastId){
        $.get('index.php?page=pull/show', {last_id: lastId}, function(json){
            if(json.update){
                for(i in json.data){
                    wrap.append(createRow(json.data[i]));
                }
                lastId = json.last_id;
            }
            pull(lastId);
        }, 'json');
    }
    pull(0);
});
</script>