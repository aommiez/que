<?php
$em = Local::getEM();
$config = $em->getRepository('Main\Entity\Que\Config')->find($_GET['config_id']);
$deps_id = json_decode($config->getDepsId());

$qb = $em->getRepository('Main\Entity\Que\Dep')->createQueryBuilder('a');
$qb
    ->where($qb->expr()->in('a.id', $deps_id));

$deps = $qb->getQuery()->getResult();
?>

<?php foreach($deps as $dep){
$value = $dep->toArray();
?>
<div class="row-fluid dep-ctx" dep-id="<?php echo $value['id'];?>">
    <div class="span12 box">
        <div class="box-header red-background">
            <div class="title">
                <?php echo $value['name'];?>
            </div>
        </div>
        <div class="box-content">

        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    var id = <?php echo $value['id'];?>;
    var ctx = $('.dep-ctx[dep-id="<?php echo $value['id'];?>"]');
    var last_ts = 0;

    function pull(){
        $.post('index.php?page=pull/show2', {dep_id: <?php echo $value['id'];?>, last_ts: last_ts}, function(data){
            last_ts = data.last_ts;
            if(data.update){
                var html = data.html;
                $('.box-content', ctx).html(html);
            }
            pull();
        }, 'json');
    }
    pull();
});
</script>
<?php }?>