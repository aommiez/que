<?php
echo <<<HTML
<script type="text/javascript">
setTimeout(function(){ window.close(); }, 15000);
</script>
HTML;
$em = Local::getEM();
$vem = Local::getVEM();

$item = $em->getRepository('Main\Entity\Que\CallDru')->find($_GET['id']);
$que = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id' => $item->getVnId()));

// image path
$pImgPath = 'public/img/users/'.$que->getHnId().'.bmp';
if(!file_exists($pImgPath)){
    $pImgPath = "public/img/users/default.png";
}

$dImgPath = $item->getRoomPath();
if(!file_exists($dImgPath)){
    $dImgPath = "public/img/users/default.png";
}

$suffix_path = $item->getSuffixPath();

// name sound
$first_name = $que->getPName();
$firstname_path = 'public/sounds/firstname/'.$que->getHnId().'.mp3';
// $firstname_path = 'public/sounds/firstname/0000.mp3';

$last_name = $que->getPSurname();
$lastname_path = 'public/sounds/lastname/'.$que->getHnId().'.mp3';
// $lastname_path = 'public/sounds/lastname/0000.mp3';

$firstname_len = file_get_contents($firstname_path);
if (!is_file($firstname_path) || strlen($firstname_len)===0) {
    $lang = preg_match('/[ก-๙]/i', $first_name)? 'th': 'en';
	$fcontent = file_get_contents("http://translate.google.com/translate_tts?tl={$lang}&ie=UTF-8&q=".urlencode(trim($first_name)));
	$fp = fopen($firstname_path, 'w');
	fwrite($fp, $fcontent);
	fclose($fp);
}

$lastname_len = file_get_contents($lastname_path);
if (!is_file($lastname_path) || strlen($lastname_len)===0) {
    $lang = preg_match('/[ก-๙]/i', $last_name)? 'th': 'en';
	$lcontent = file_get_contents("http://translate.google.com/translate_tts?tl={$lang}&ie=UTF-8&q=".urlencode(trim($last_name)));
	$fp = fopen($lastname_path, 'w');
	fwrite($fp, $lcontent);
	fclose($fp);
}

?>
<style>
    body {
        background: url(public/img/patterns/4.png);
    }
</style>

<audio id="prefix1" controls autoplay style="display:none;">
  <source src="public/sounds/s1-2.wav" type="audio/wav">
</audio>

<audio id="firstname" controls style="display:none;">
  <source src="<?php echo $firstname_path; ?>" type="audio/mpeg">
</audio>

<audio id="lastname" controls style="display:none;">
  <source src="<?php echo $lastname_path; ?>" type="audio/mpeg">
</audio>

<audio id="room" controls style="display:none;">
  <source src="<?php echo $suffix_path?>" type="audio/mpeg">
</audio>

<style>
    .boxshadow {
        border-radius: 10px 10px 10px 10px;
        -moz-border-radius: 10px 10px 10px 10px;
        -webkit-border-radius: 10px 10px 10px 10px;
        border: 0px solid #000000;
        -moz-box-shadow: 0 0 10px 1px #333;
        -webkit-box-shadow: 0 0 10px 1px #333;
        box-shadow: 0 0 10px 1px #333;
        margin-bottom: 16px;
    }
</style>
<div class='row-fluid' >
    <div class='span12'>
        <div class="box-content box-double-padding text-center">

            <div style="padding-top: 50px;">
                <h1 style="text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);font-size: 90px;line-height: 80px;padding-bottom: 46px;"><i class="icon-volume-up"></i> ขอเชิญคุณ</h1>
                <div style="display: inline-block;vertical-align: top;margin-right: 200px;">
                    <img src="<?php echo $pImgPath;?>" height="350" class="boxshadow" style="height: 350px;">
                    <h1 style="text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);font-size: 90px; line-height: 80px;"><?php echo $que->getPName()." ".$que->getPSurname();?></h1>
                </div>
                <div style="display: inline-block;vertical-align: top;">
                    <img src="<?php echo $dImgPath;?>" height="450" style="height: 450px;" class="boxshadow">
                    <h1 style="text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);font-size: 90px; line-height: 80px;">ห้องรับยา</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
var prefix1 = document.getElementById('prefix1');
var firstname = document.getElementById('firstname');
var lastname = document.getElementById('lastname');
var room = document.getElementById('room');

prefix1.addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	firstname.play();
}, false);

firstname.addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	lastname.play();
}, false);
firstname.addEventListener('error', function failed(e){
    prefix1.addEventListener('ended', function(){
        this.currentTime = 0;
        this.pause();
        lastname.play();
    }, false);
}, true);

lastname.addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	room.play();
}, false);
lastname.addEventListener('error', function failed(e){
    // room.play();
    firstname.addEventListener('ended', function(){
        this.currentTime = 0;
        this.pause();
        room.play();
    }, false);
}, true);

room.addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
    setTimeout(function(){ window.close(); }, 3000);
}, false);

$(function(){
    /*
    function requestFullscreen( element ) {
        if ( element.requestFullscreen ) {
            element.requestFullscreen();
        } else if ( element.mozRequestFullScreen ) {
            element.mozRequestFullScreen();
        } else if ( element.webkitRequestFullScreen ) {
            element.webkitRequestFullScreen( Element.ALLOW_KEYBOARD_INPUT );
        }
    }

    requestFullscreen(document.body);
    $(document.body).click();
    */
});
</script>