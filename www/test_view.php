<?	
	include "pdo/connect.php";

	$connect = new Database();

	$con = $connect->connect();

	$idx = ($_GET['idx'] == "")?"1":$_GET['idx'];
 


	$stmt = $con->prepare("SELECT * FROM test WHERE idx = ?");
	$stmt->execute(array($idx));
	$result = $stmt->fetch();


	$name = $result['name'];
	$title = $result['title'];
	$description = $result['description'];
	$dir = "test_upload/".$idx."/test_img";
	$image = array_splice(scandir($dir), 2);

	$main_img = $dir."/".$image[0];


	//print_r($image);

	//echo count($image);

	$share_code = "https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fazazqa.cafe24.com%2Ftest_view.php%3Fidx%3D".$idx."&amp;src=sdkpreparse";

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<meta property="og:type"          content="website" />
	<meta property="fb:app_id" content="451659441898335" />
<!-- 페북 공유 메타 데이터 시작 -->
	<meta property="og:url"           content="http://azazqa.cafe24.com/test_view.php?idx=<?=$idx?>" />
	<meta property="og:title"         content="<?=$title?>" />
	<meta property="og:description"   content="<?=$description?>" />
	<meta property="og:image"         content="http://alltest.kr/<? echo $main_img;?>" />
<!-- 페북 공유 메타 데이터 종료 -->
<? include "script/adsense.php"; //adsense script?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/ko_KR/sdk.js#xfbml=1&version=v2.11&appId=451659441898335';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<!-- header start -->
	<header>
		
		<div class="logo">
			<span style="color:#d34341">All</span> <span color="">T</span>est
		</div>
		<nav>
			<ul>
				<li>
					<a>About</a>
				</li>
				<li>
					<a>All-Test</a>
				</li>
				<li>
					<a>Orter Site</a>
				</li>
				<li>
					<a>Contact</a>
				</li>
			</ul>
		</nav>
	</header>
	<!-- header end -->

	<!-- main start -->
	<main>
		<style type="text/css">
			section div img{
				max-width: 600px;
				width:100%;
			}
			main aside{
				border: 1px solid black;
				width: 300px;
			}
		</style>
		
		<?
			//single start
			if(false){
		?>
		
		<section>
			<div><img src="<? echo $main_img; ?>"></div>
			<form action="test_result.php" method="post">
				<input type="hidden" name="idx" value="<?=$idx?>">
				<input type="text" name="user_text">
				<input type="submit" value="결과 확인">
			</form>
			<div class="fb-share-button" data-href="http://azazqa.cafe24.com/test_view.php?idx=1" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="<?=$share_code?>">공유하기</a></div>
		</section>
		<?
			}//single end
		?>

		<!-- slider start -->
		<script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$('.slider').bxSlider({
					mode: 'fade',
					auto: false,
  					autoControls: false,
					captions: false,
					
				});
			});			
		</script>
		<section>
			<div class="slider">
				<?
					foreach($image as $img){
						$src_img = $dir."/".$img;
				?>
					<div><img src="<?=$src_img?>"></div>
				<? } ?>
			</div>
			<form action="test_result.php" method="post">
				<input type="hidden" name="idx" value="<?=$idx?>">
				<input type="text" name="user_text">
				<input type="submit" value="결과 확인">
			</form>
			<div class="fb-share-button" data-href="http://azazqa.cafe24.com/test_view.php?idx=1" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="<?=$share_code?>">공유하기</a></div>			
		</section>
		<!-- slider end -->
		<aside>
			it's banner
		</aside>
	</main>
	<!-- main end -->

<? include "common/footer.php"; ?>