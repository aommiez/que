<?php 
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0 ;

$em = Local::getEM();
$vem = Local::getVEM();
$item = $em->getRepository('Main\Entity\Que\Que')->findOneBy(array('vn_id' => $user_id));

// image path
$pImgPath = 'public/img/users/'.$item->getHnId().'.bmp';
if(!file_exists($pImgPath)){
    $pImgPath = "public/img/users/default.png";
}

$dImgPath = 'public/img/dep/'.$item->getDepId().'.jpg';
if($item->getDru()){
    $dImgPath = 'public/img/dep/drug.jpg';
}
if(!file_exists($dImgPath)){
    $dImgPath = "public/img/dep/hqdefault.jpg";
}

$doorbell_path = 'public/sounds/doorbell.wav';

$suffix_path = 'public/sounds/suffix.wav?t='.time();

/*
$room = $em->getRepository('Main\Entity\Que\Dep')->findOneBy(array('id' => intval($item->getDepId()) ));
$room_path = 'public/sounds/room/'.$item->getDepId().'.mp3';
$room_name = $room->getGSpeak();
if($item->getDru()){
    $room_name = 'รับยา';
    $room_path = 'drug';


}
*/
/*
$room_id = $item->getDepId();
if (!is_file($room_path)) {
	$scontent = file_get_contents('http://translate.google.com/translate_tts?tl=th&ie=UTF-8&q='.urlencode($room_name));
	$fp = fopen($room_path, 'w');
	fwrite($fp, $scontent);
	fclose($fp);
}
*/

$first_name = $item->getPName();
$firstname_path = 'public/sounds/firstname/'.$item->getVnId().'.mp3';

$last_name = $item->getPSurname();
$lastname_path = 'public/sounds/lastname/'.$item->getVnId().'.mp3';

if (!is_file($firstname_path)) {
	$fcontent = file_get_contents('http://translate.google.com/translate_tts?tl=th&ie=UTF-8&q='.urlencode($first_name));
	$fp = fopen($firstname_path, 'w');
	fwrite($fp, $fcontent);
	fclose($fp);
}

if (!is_file($lastname_path)) {
	$lcontent = file_get_contents('http://translate.google.com/translate_tts?tl=th&ie=UTF-8&q='.urlencode($last_name));
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

<audio id="startCall" controls style="display:none;">
    <source src="<?php echo $doorbell_path;?>" type="audio/wav">
</audio>

<audio id="prefix1" controls autoplay  style="display:none;">
  <source src="public/sounds/s1-2.wav" type="audio/wav">
</audio>

<audio id="firstname" controls style="display:none;">
  <source src="<?php echo $firstname_path; ?>" type="audio/mpeg">
</audio>

<audio id="lastname" controls style="display:none;">
  <source src="<?php echo $lastname_path; ?>" type="audio/mpeg">
</audio>

<!--
<audio id="prefix2" controls style="display:none;">
	<source src="public/sounds/prefix2.mp3" type="audio/wav">
</audio>
-->

<audio id="room" controls style="display:none;">
  <source src="<?php echo $suffix_path?>" type="audio/mpeg">
</audio>

<!--
<audio id="suffix" controls style="display:none;">
	<source src="public/sounds/suffix.mp3" type="audio/mpeg">
</audio>
-->
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
                    <h1 style="text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);font-size: 90px; line-height: 80px;"><?php echo $item->getPName()." ".$item->getPSurname();?></h1>
                </div>
                <div style="display: inline-block;vertical-align: top;">
                    <img src="<?php echo $dImgPath;?>" height="350" style="height: 350px;" class="boxshadow">
                    <h1 style="text-shadow: 4px 4px 2px rgba(150, 150, 150, 1);font-size: 90px; line-height: 80px;">ห้องรับยา</h1>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

/*
document.getElementById('startCall').addEventListener('ended', function(){
        this.currentTime = 0;
        this.pause();
        document.getElementById('prefix1').play();
}, false);
*/

document.getElementById('prefix1').addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	document.getElementById('firstname').play();
}, false);

document.getElementById('firstname').addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	document.getElementById('lastname').play();
}, false);

document.getElementById('lastname').addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	document.getElementById('room').play();
}, false);
 /*
document.getElementById('prefix2').addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	document.getElementById('room').play();
}, false);
*/

document.getElementById('room').addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();
	//document.getElementById('suffix').play();
    setTimeout(function(){ window.close(); }, 3000);
}, false);

/*
document.getElementById('suffix').addEventListener('ended', function(){
	this.currentTime = 0;
	this.pause();

	setTimeout(function(){ window.close(); }, 3000);
}, false);
*/

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