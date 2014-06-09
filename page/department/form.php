<?php
$em = Local::getEM();
if(isset($_GET['id'])){
    $conf = $em->getRepository('Main\Entity\Que\Config')->find($_GET['id']);
    $attr = $conf->toArray();
    $attr['deps_id'] = json_decode($conf->getDepsId());
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $attr = $_POST;
    $attr['deps_id'] = @json_encode($_POST['deps_id']);
    if(!is_array($attr)){
        $attr['deps_id'] = array();
    }

    /** @var Main\Entity\Que\Dep $conf */

    if(isset($conf)){
        $em->merge($conf);
    }
    else {
        $conf = new \Main\Entity\Que\Config();
        $em->persist($conf);
    }
    $conf->importAttr($attr);
    $em->flush();

    //

    // file
    /*
    if(isset($_FILES['picture'])){
        if(file_exists($_FILES['picture']['tmp_name'])){
            $ext = array_pop(explode('.', $_FILES['picture']['tmp_name']));
            $name = uniqid('config').'.'.$ext;
            $destination = 'picture/dep/'.$name;
            move_uploaded_file($_FILES['picture']['tmp_name'], $destination);

            $attr['picture'] = $name;
        }
    }
    */

    echo '<meta http-equiv="refresh" content="0;url=index.php?page=department/list">';
    exit();
}
$deps = $em->getRepository('Main\Entity\Que\Dep')->findAll();
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
            <div class='title'>Add Config</div>
        </div>
        <div class='box-content'>
            <form class='form form-horizontal validate-form' method="post" style='margin-bottom: 0;' />
                <div class='control-group'>
                    <label class='control-label' for='name'>name</label>
                    <div class='controls'>
                        <input data-rule-minlength='2' data-rule-required='true' id='name' name='name' placeholder='Name' type='text' value="<?php echo @$attr['name'];?>" />
                    </div>
                </div>
                <div class='control-group'>
                    <label class='control-label'>Department</label>
                    <div class='controls'>
                        <?php foreach($deps as $dep){?>
                        <label class='checkbox'>
                            <input type='checkbox' name="deps_id[]" value='<?php echo $dep->getId();?>' <?php if(@in_array(@$dep->getId(), $attr['deps_id'])) echo "checked";?> />
                            <?php echo $dep->getName();?>
                        </label>
                        <?php }?>
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