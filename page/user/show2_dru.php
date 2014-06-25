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
            <div class="text-right title" style="float: right;">
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

    var callStack = {
        stack: [],
        calling: false,
        push: function(data){
            callStack.stack.push(data);
        },
        call: function(){
            if(callStack.stack.length == 0){
                callStack.calling = false;
                return;
            }
            callStack.calling = true;

            var data = callStack.stack.shift();

            var params = [
                'height='+screen.height,
                'width='+screen.width,
                'left=0',
                'top=0'
                //'fullscreen=yes' // only works in IE, but here for completeness
            ].join(',');

            var w = window.open('index.php?page=user/call_dru&id='+data.id, '', params);
            w.onload = function(){
                w.onunload = function(){
                    callStack.call();
                };
            }
        }
    };

    window.callstack = callStack;

    var conn;
    function skConnect(){
        if(conn instanceof WebSocket){
            conn.close();
        }
        conn = new WebSocket(<?php echo json_encode(url_socket());?>);

        conn.onmessage = function(e){
            var json = JSON.parse(e.data);
            var event = json.event;
            var data = json.data;

            if(event=='call'){
                callStack.push(data);
                console.log(callStack);
                if(!callStack.calling){
                    callStack.call();
                }
            }
            else if(event=='show/update'){
                $('.box-content', ctx).html(data.html);
                fetchYellow();
            }
        };

        conn.onerror = function(){
            setTimeout(function(){ skConnect(); }, 3000);
        };

        conn.onopen = function(){
            conn.send(JSON.stringify({ action: 'show/init' }));
        }
    };

    skConnect();
});
</script>