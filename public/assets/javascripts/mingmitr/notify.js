/**
 * Created by p2 on 5/9/14.
 */

var mingmitrNotify = (function(accessToken, locationId){
    var wrap = $("#update-notify-wrap");
    var listEL = $(".notify-list");
    var listWrap = $(".notify-list-wrap");
    // init
    $(window).resize(function(){
        var h = $(window).height();
        wrap.height(h);
        listWrap.height(h-40);
    }).resize();
    // end init

    var makeEL = function(obj){
        var border = $('<div class="border-bottom"></div>');
        var notify = $('<div class="notify"></div>');
        var el = $('<div></div>');
        el.append(border).append(notify);
        if(obj.opened){
            notify.addClass("opened");
        }
        var html = '<div class="pull-left notify-thumb">\
            <img class="author-thumb" src="">\
            </div>\
                <div>\
                    <strong class="author-name"></strong>\
                    <span class="badge pull-right">N</span>\
                    <div>\
                        <small class="notify-message">\
                        Create order\
                        </small>\
                    </div>\
                </div>\
                <div class="clearfix"></div>';

        notify.html(html);
        var user = obj.user;
        var order = obj.order;
        $('.author-thumb', notify).attr('src', user.picture.link + '?width=43&height=43');
        $('.author-name', notify).text(user.display_name);
        $('.notify-message', notify).text('Order '+order.product_length+' list');

        notify.click(function(e){
            e.preventDefault();
            window.location.href = "/order/index/"+obj.order.id+"?notify_id="+obj.id;
        });

        return el;
    };

    var last_id = 0;
    var pollURL = "http://mingmitrapi.pla2api.com/longpoll/admin/location";
    var poll = function(json){
        //var newCount = data.new_count;
        //var list = data.list;
        var loop = function(data){
            console.log(data);
            var obj = data.pop();
            if(typeof obj == "undefined")
            return;

            var el = makeEL(obj);
            el.hide();
            el.prependTo(listEL);
            el.slideDown(function(){
                loop(data);
            });
        };

        loop(json.data);

        $.get(pollURL, { last_id: json.last_id }, poll, 'json');
    };

    var next = 0;
    var sendData = {};
    if(typeof locationId != "undefined"){
        sendData.location_id = locationId;
    }
    if(typeof accessToken != "undefined"){
        sendData.access_token = accessToken;
    }
    $.get("http://mingmitrapi.pla2api.com/notify/location", sendData, function(json){
        var obj = {};
        var last_id = 0;
        while(typeof (obj = json.data.pop()) != "undefined"){
            (function(){
                var el = makeEL(obj);
                el.prependTo(listEL);
                last_id = obj.id;
            }());
        }
        next = json.paginate.page + 1;

        poll({
            last_id: last_id,
            data: []
        });
    }, "json");

    var loadingEl = $('<div>' +
        '<div class="pull-left notify-thumb">' +
        '<img alt="17" src="/public/assets/images/ajax-loaders/17.gif">' +
        '</div>');

    listWrap.scroll(function(e){
        if($(listWrap).scrollTop() + $(listWrap).height() == $(listEL).height()){
            // loading
            loadingEl.appendTo(listEL);

            setTimeout(function(){
                $.get("http://mingmitrapi.pla2api.com/notify/location", { location_id: 249, page: next }, function(json){
                    loadingEl.remove();
                    next = json.paginate.page + 1;
                    var obj = {};
                    while(typeof (obj = json.data.shift()) != "undefined"){
                        (function(){
                            var el = makeEL(obj);
                            el.appendTo(listEL);
                        }());
                    }
                }, "json");
            }, 1000);
        }
    });
});