<?
include 'db.php';
header("Content-Type:text/html;charset=utf-8");

$sql = "select * from board where idx = '".$_GET[idx]."'";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);


?>
<br/>
<table style="width:1000px;height:50px;border:5px #CCCCCC solid;">
    <tr>
        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">글수정</td>
    </tr>
</table>
<br/>
<form name="bWriteForm" method="post" action="./modify_ok.php" style="margin:0px;">
<input type="hidden" name="idx" value="<?=$data[idx]?>">
<table style="width:1000px;height:50px;border:0px;">
    <tr>
        <td align="center" valign="middle" style="width:200px;height:50px;background-color:#CCCCCC;">글제목</td>
        <td align="left" valign="middle" style="width:800px;height:50px;"><input type="text" name="title" style="width:780px;" value="<?=$data[b_title]?>"></td>
    </tr>
    <tr>
        <td align="center" valign="middle" style="width:200px;height:200px;background-color:#CCCCCC;">글내용</td>
        <td align="left" valign="middle" style="width:800px;height:200px;">
        <textarea name="body" style="width:800px;height:200px;"><?=$data[body]?></textarea>
        </td>
    </tr>
    <!-- 4. 글쓰기 버튼 클릭시 입력필드 검사 함수 write_save 실행 -->
    <tr>
        <td align="center" valign="middle" colspan="2"><input type="button" value=" 글수정 " onClick="write_ok();">&nbsp;&nbsp;&nbsp;<input type="button" value=" 뒤로가기 " onClick="history.back();"></td>
    </tr>
</table>
</form>
<script>
