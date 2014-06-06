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
    <div class="box-content">
        <script type="text/javascript">
            $(function(){
                $('#form-scan').submit(function(){
                    window.open('index.php?page=user/scan', '', 'width=300, height=100, top=0');
                });
            });

            $(window).keydown(function(e) {
                if (e.keyCode == 120) {
                    $("#search").focus();
                }
            });


        </script>
        <form id="form-scan" class="form pull-left" method="post" action="" style="margin: 0;">
            <input type="text" name="search" style="margin: 0;" id="search">
            <button class="btn">Search</button>
            <a class="btn" href="#" onclick="window.open('index.php?page=user/show', '', 'width=400, height=600');">Show User List</a>
        </form>
        <div class="pull-right">
            <span>Select Department</span>
            <select id="inputSelect">
                <option>OPD 1</option>
                <option>OPD 2</option>
            </select>
        </div>
    </div>
</div>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header red-background'>
            <div class='title'>User queue</div>
        </div>
        <div class='box-content'>

            <div class='responsive-table'>
                <div class='scrollable-area'>
                    <table class='table table-bordered table-hover table-striped' style='margin-bottom:0;'>
                        <thead>
                        <tr>
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
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
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
                                        Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>