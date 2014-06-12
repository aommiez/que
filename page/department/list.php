<?php
$em = Local::getEM();
$deps = $em->getRepository('Main\Entity\Que\Dep')->findAll();
$configs = $em->getRepository('Main\Entity\Que\Config')->findAll();
?>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-list'></i>
                <span>Department List</span>
            </h1>
            <div class='pull-right'>
                <div class='btn-group'>
                    <a href="index.php?page=department/form" class="btn btn-success"><i class='icon-plus'></i>
                        Add Config
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header red-background'>
            <div class='title'>Department List</div>
        </div>
        <div class='box-content'>
            <div class='responsive-table'>
                <div class='scrollable-area'>
                    <table class='table table-bordered table-hover table-striped' style='margin-bottom:0;'>
                        <thead>
                        <tr>
                            <th>
                                Config name
                            </th>
                            <th>
                                Departmant name
                            </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($configs as $key=> $conf){?>
                        <tr>
                            <td><a href="index.php?page=user/queue&id=<?php echo $conf->getId();?>"><?php echo $conf->getName();?></a></td>
                            <td>
                                <?php
                                /** @var Main\Entity\Que\Config $conf */
                                $dep_configs = json_decode($conf->getDepsId());
                                if(!is_array($dep_configs)) $dep_configs = array();
                                $name = array();
                                foreach($dep_configs as $key=> $value){
                                    $dep_configs[$key] = array('name'=> '');
                                    foreach($deps as $dep){
                                        /** @var Main\Entity\Que\Dep $dep */
                                        if($dep->getId()==(int)$value){
                                            $dep_configs[$key]['name'] = $dep->getName();
                                        }
                                    }
                                    $name[] = $dep_configs[$key]['name'];
                                }
                                echo implode(', ', $name);
                                ?>
                            </td>
                            <td>
                                <div class='text-center'>
                                    <a class='btn btn-success btn-mini' href='javascript:void(0);' title="List" onclick="window.open('index.php?page=user/show2&config_id=<?php echo $conf->getId();?>', '', 'width=400, height=600');">
                                        <i class='icon-list'></i>
                                    </a>
                                    <a class='btn btn-success btn-mini' href='index.php?page=department/form&id=<?php echo $conf->getId();?>' title="Edit">
                                        <i class='icon-pencil'></i>
                                    </a>
                                    <a class='btn btn-danger btn-mini' href='#' title="Delete">
                                        <i class='icon-remove'></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php }?>

                        <tr>
                            <td><a href="index.php?page=user/queue_dru">ห้องยา</a></td>
                            <td>ห้องยา</td>
                            <td>
                                <div class='text-center'>
                                    <a class='btn btn-success btn-mini' href='javascript:void(0);' title="List" onclick="window.open('index.php?page=user/show2_dru', '', 'width=400, height=600');">
                                        <i class='icon-list'></i>
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