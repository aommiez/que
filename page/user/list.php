<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-list'></i>
                <span>User List</span>
            </h1>
            <div class='pull-right'>
                <div class='btn-group'>
                    <a href="index.php?page=user/form" class="btn btn-success"><i class='icon-plus'></i>
                        Add User
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header red-background'>
            <div class='title'>User List</div>
        </div>
        <div class='box-content'>
            

            <div class='responsive-table'>
                <div class='scrollable-area'>
                    <table class='table table-bordered table-hover table-striped' style='margin-bottom:0;'>
                        <thead>
                        <tr>
                            <th>
                                Username
                            </th>
                            <th>
                                Email
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $em = Local::getEM();
                        $users = $em->getRepository('Main\Entity\Que\User')->findAll();
                        foreach ($users as $user) {
                        ?>
                        <tr>
                            <td><?php echo $user->getName();?></td>
                            <td><?php echo $user->getEmail();?></td>
                            <td>
                                <div class='text-center'>
                                    <a class='btn btn-success btn-mini' href='index.php?page=user/form&id=<?php echo $user->getId();?>' title="Edit">
                                        <i class='icon-pencil'></i>
                                    </a>
                                    <?php 
                                    if ($_SESSION['user']['level'] > 1) {
                                    ?>
                                    <a class='btn btn-danger btn-mini' href='index.php?page=user/delete&id=<?php echo $user->getId();?>&noTemp=true' title="Delete">
                                        <i class='icon-remove'></i>
                                    </a>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </td>
                        </tr>
                        <?php 
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</div>