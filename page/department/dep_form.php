<?php
/**
 * Created by PhpStorm.
 * User: p2
 * Date: 6/9/14
 * Time: 2:07 PM
 */

$dep = null;
if($_SERVER['REQUEST_METHOD']=="POST"){
    $attr = $_POST;
    // $dep = new \Main\Entity\Que\Dep($attr);

    $em = Local::getEM();
    /** @var Main\Entity\Que\Dep $dep */
    $dep = $em->getRepository('Main\Entity\Que\Dep')->find($_GET['id']);

    // file
    if(isset($_FILES['picture'])){
        if(file_exists($_FILES['picture']['tmp_name'])){
            $ext = array_pop(explode('.', $_FILES['picture']['tmp_name']));
            $name = $dep->getId().'.'.$ext;
            $destination = 'picture/dep/'.$name;
            move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

            $attr['picture'] = $name;
        }
    }
    $dep->importAttr($attr);
    $em->merge($dep);
    $em->flush();
}
?>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-cog'></i>
                <span>Department Form</span>
            </h1>
        </div>
    </div>
</div>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-header red-background'>
            <div class='title'>Department Form</div>
        </div>
        <div class='box-content'>
            <form class='form form-horizontal validate-form' method="post" style='margin-bottom: 0;' />
            <div class='control-group'>
                <label class='control-label' for='name'>name</label>
                <div class='controls'>
                    <input data-rule-minlength='2' data-rule-required='true' id='name' name='name' placeholder='Name' type='text' />
                </div>
            </div>
            <div class='control-group'>
                <label class='control-label'>Department</label>
                <div class='controls'>
                    <input data-rule-minlength='2' data-rule-required='true' id='title' name='title' placeholder='Name' type='text' />
                </div>
            </div>

            <div class='form-actions' style='margin-bottom:0'>
                <button class='btn btn-primary' type='submit'>
                    Save
                </button>
                <a class='btn' href="index.php?page=department/list">
                    Cancle
                </a>
            </div>
            </form>
        </div>
    </div>
</div>