<?
// 1. 공통 인클루드 파일
include 'db.php';
header("Content-Type:text/html;charset=utf-8");


$sql = "select * from board where idx = '".$_GET[b_idx]."'";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);


$sql_delete = "delete from board where idx = '".$data[idx]."'";
sql_query($sql_delete);


?>
<script>
alert("글이 삭제 되었습니다.");
location.replace("./threecolumn.php");
</script>
