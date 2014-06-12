<?php 
$id = isset($_GET['id']) ? intval($_GET['id']) : 0 ;
$user = null;
if ($id > 0) {
    $em = Local::getEM();
    $user = $em->getRepository('Main\Entity\Que\User')->find($id);
    $name = $user->getName();
    $email = $user->getEmail();

    if ($_SESSION['user']['level'] < 99 && $user->getId()!==$_SESSION['user']['id']) {
        ?>
        <meta http-equiv="Refresh" content="0; url=index.php?page=user/list">
        <?php
        exit;
    }
}

?>
<div class='row-fluid'>
    <div class='span12'>
        <div class='page-header'>
            <h1 class='pull-left'>
                <i class='icon-edit'></i>
                <span>User Form</span>
            </h1>
        </div>
    </div>
</div>
<div class='row-fluid'>
    <div class='span12 box'>
        <div class='box-content'>
            <form accept-charset="UTF-8" action="index.php?page=user/save&noTemp=true" class="form" method="post" style="margin-bottom: 0;" />
                <div style="margin:0;padding:0;display:inline">
                    <input name="utf8" type="hidden" value="&#x2713;" />
                    <input name="authenticity_token" type="hidden" value="CFC7d00LWKQsSahRqsfD+e/mHLqbaVIXBvlBGe/KP+I=" />
                </div>
                <div class='control-group'>
                    <label class='control-label' for='username'>Username</label>
                    <div class='controls'>
                        <input class='input-block-level' id='username' name="username" placeholder='Username' type='text' value="<?php echo isset($name) ? $name : "" ; ?>" required=""/>
                    </div>
                </div>
                <div class='control-group'>
                    <label class='control-label' for='email'>Email</label>
                    <div class='controls'>
                        <input class='input-block-level' id='email' name="email" placeholder='Username' type='email' value="<?php echo isset($email) ? $email : "" ; ?>" required=""/>
                    </div>
                </div>
                <div class='control-group'>
                    <label class='control-label' for='inputPassword'>Password</label>
                    <div class='controls'>
                        <?php
                        $require_field = $id > 0 ? "" : 'required=""' ;  
                        ?>
                        <input class='input-block-level' id='inputPassword' name="password" placeholder='Password' type='password' <?php echo $require_field; ?>/>
                    </div>
                </div>
                <div class='form-actions' style='margin-bottom: 0;'>
                    <button class='btn btn-primary btn-large' type="submit">
                        <i class='icon-save'></i>
                        Save
                    </button>
                    <?php 
                    if ($id > 0) {
                        ?>
                        <input type="hidden" name="user_id" value="<?php echo $user->getId();?>">
                        <?php
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>