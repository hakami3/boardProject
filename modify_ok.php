<?
include 'db.php';
header("Content-Type:text/html;charset=utf-8");


$sql = "select * from board where idx = '".$_POST[b_idx]."'";
$result = mysql_query($sql);
$data = mysql_fetch_array($result);

$sql = "update board set title = '".addslashes(htmlspecialchars($_POST[title]))."',
 body = '".addslashes(htmlspecialchars($_POST[body]))."' where idx = '".$_POST[b_idx]."'";
mysql_query($sql);

?>
<script>
alert("글이 저장 되었습니다.");
location.replace(".threecolumn.php");
</script>
