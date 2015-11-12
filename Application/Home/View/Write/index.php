
<include file="Public:header"/>
<body style='background:#eaeaea'>
<table cellpadding="0" cellspacing="0" width="100%" style='background:#eaeaea' id="main">
    <tr>
        <include file="Public:left"/>

        <td id="index_right" style="" >

            <include file="Public:right"/>

            <iframe src="__APP__/home/Public/main_content.html" frameborder="1" style="width:100%;margin-top:-9px" id="right_bt"></iframe>


        </td>
    </tr>
</table>

<form id="form1">
<?php
if(!empty($test)){
?>
    <div style="width: 1px; height: 1px; overflow: hidden;">
        <iframe id="iframe1" name="iframe1" src="/uteach/Word/FileMakerSingle.php?id={$_SESSION['uid']}&type={$test}"></iframe>
    </div>
<?php
}
if(empty($answer)){
?>
    <div style="width: 1px; height: 1px; overflow: hidden;">
        <iframe id="iframe2" name="iframe2" src="/uteach/Word/FileMakerSingle.php?id={$_SESSION['uid']}&type={$answer}"></iframe>
    </div>

<?php
}
if(empty($analytical)){
?>
    <div style="width: 1px; height: 1px; overflow: hidden;">
        <iframe id="iframe3" name="iframe3" src="/uteach/Word/FileMakerSingle.php?id={$_SESSION['uid']}&type={$analytical}"></iframe>
    </div>

    <script language="javascript" type="text/javascript">
        var url="{:U('Write/index')}";
        //location.href = url;
        </script>
<?php
}

?>
</form>


</body>



</html>