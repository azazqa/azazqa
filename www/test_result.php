<?	
	include "pdo/connect.php";

	$connect = new Database();

	$con = $connect->connect();

	$idx = $_GET['idx'];

	$stmt = $con->prepare("SELECT * FROM test WHERE idx = ?");
	$stmt->execute(array($idx));
	$result = $stmt->fetch();


	$name = $result['name'];
	$title = $result['title'];
	$description = $result['description'];
	$image = $result['image'];

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta property="og:type"          content="website" />
<!-- 페북 공유 메타 데이터 시작 -->
	<meta property="og:url"           content="http://azazqa.cafe24.com/test_view.php?idx=<?=$idx?>" />
	<meta property="og:title"         content="<?=$title?>" />
	<meta property="og:description"   content="<?=$description?>" />
	<meta property="og:image"         content="<?=$image?>" />
<!-- 페북 공유 메타 데이터 종료 -->
</head>
<body>
	<form action="test_result.php" method="post">
		<input type="text" name="user_text">
	</form>
</body>
</html>