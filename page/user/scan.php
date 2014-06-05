<script type="text/javascript">
function alert_call(thiswindow){
    var newwindow = window.open('', '', 'width=200, height=200, top=300, left=500');
    newwindow.document.write("<p>This window's name is: " + myWindow.name + "</p>");
    thiswindow.close();
}
</script>
<div class='text-center' style="padding: 20px;">
    <!-- <a class='btn btn-success' href='#' onclick="alert_call(window);"> -->
    <a class='btn btn-success' href='#'>
        <i class='icon-bullhorn'></i>
        Call
    </a>
    <a class='btn' href='#' onclick="window.close();">
        <i class='icon-mail-forward'></i>
        Skip
    </a>
    <a class='btn btn-danger' href='#' onclick="window.close();">
        <i class='icon-remove'></i>
        Delete
    </a>
</div>