<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <link rel="Stylesheet" type="text/css" href="/Public/css/popstyle.css" />
    <script type="text/javascript" src="/Public/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/js/choose.js"></script>
<script>
var getKonw="<?php echo U('Choose/know','','');?>";
var getNote="<?php echo U('Choose/noteUpdate','','');?>";
</script>
<style>
	ul{padding: 0;margin: 0}
	.ul_list{margin: 0 auto;width: 95%}
</style>
</head>

<body>
<div id="loginalert1" >
<div class="lolist lolist1" >
<form action="know" method="post">
<ul class="ul_list">
		<li><span>1.</span><input name="know1" type="text" value="<?php echo (explodestr0($know)); ?>" /></li>
		<li><span>2.</span><input name="know2" type="text" value="<?php echo (explodestr1($know)); ?>"/></li>
		<li><span>3.</span><input name="know3" type="text" value="<?php echo (explodestr2($know)); ?>"/></li>
		<li><span>4.</span><input name="know4" type="text" value="<?php echo (explodestr3($know)); ?>"/></li>
		<input type="hidden" value="<?php echo ($id); ?>">
</ul>
<input type="button"  value="添加" style="margin:12px auto;" class="popbut" />



	<ul class="ul_list">
			<li><span>备注</span><textarea name="note" class="note"cols="" rows="" value="<?php echo ($note); ?>"><?php echo ($note); ?></textarea></li>
	</ul>
<div class="clear"></div>

<input type="button" id="note" value="确定" style="margin-top:45px;" />
</form>

</div>

</div>
</body>
</html>