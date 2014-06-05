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
<div class='row-fluid'>
    <div class='span12 box'>
        <div class="box-content">
            <script type="text/javascript">
                $(function(){
                    $('#form-scan').submit(function(){
                        window.open('http://localhost.dev/que/index.php?page=user/scan&skip=true', '', 'width=300, height=100, top=0');
                    });
                });
            </script>
            <form id="form-scan" class="form form-horizontal" method="post" action="" style="margin: 0;">
                <input type="text" name="search" style="margin: 0;">
                <button class="btn">Search</button>
                <a class="btn" href="#" onclick="window.open('', '', 'width=800, height=600');">Show User List</a>
            </form>
        </div>
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