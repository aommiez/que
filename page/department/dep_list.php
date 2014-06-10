<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/9/14
 * Time: 2:56 PM
 */

$em = Local::getEM();
$deps = $em->getRepository('Main\Entity\Que\Dep')->findAll();

$configs = $em->getRepository('Main\Entity\Que\Config')->findAll();

foreach($configs as $key=> $conf){
    /** @var Main\Entity\Que\Config $conf */
    $dep_configs = json_decode($conf->getDepsId());
    if(!is_array($dep_configs)) $dep_configs = array();
    foreach($dep_configs as $key=> $value){
        $dep_configs[$key] = array('name'=> '');
        foreach($deps as $dep){
            /** @var Main\Entity\Que\Dep $dep */
            if($dep->getId()==$key){
                $dep_configs[$key]['name'] = $dep->getName();
            }
        }
    }


}
?>

<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-list'></i>
                <span>Department List</span>
            </h1>
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
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>User name 1</td>
                            <td>
                                <div class='text-center'>
                                    <a class='btn btn-success btn-mini' href='index.php?page=user/form' title="Edit">
                                        <i class='icon-pencil'></i>
                                    </a>
                                    <a class='btn btn-danger btn-mini' href='#' title="Delete">
                                        <i class='icon-remove'></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>User name 1</td>
                            <td>
                                <div class='text-center'>
                                    <a class='btn btn-success btn-mini' href='index.php?page=user/form' title="Edit">
                                        <i class='icon-pencil'></i>
                                    </a>
                                    <a class='btn btn-danger btn-mini' href='#' title="Delete">
                                        <i class='icon-remove'></i>
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