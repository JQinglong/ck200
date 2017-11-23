<?php
/**
 * Template Name: search-form
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package islemag
 */
 
session_start();


//操作アクションを取得
$act = isset($_POST["act"]) ? intval($_POST["act"]) : 1;
//1:初期
//2:曲を選択
//3:文章を入力
//4:HSKの級から検索


if ($act == 1) {
	// セッションデータクリア
	$contact_data = array();
	// 初期値セット
	$err_msg = array();
	// $name = '';
	// $email = '';
	// $message = '';

	// wpdbオブジェクト
	global $wpdb;
    $sql = $wpdb->prepare("SELECT MT.id, MT.music_nm FROM musics MT ORDER BY music_nm" , '');
	// クエリ実行
    $rows_title = $wpdb->get_results($sql);
	// 検索結果メッセージ
    $message = (!$rows_title) ? "曲名情報が不正です。" : count($rows_title)."件の曲名が見つかりました。";


} elseif ($act == 2) { // おすすめ曲を見るボタンを押下された場合

	// POSTデータをセッションに格納
	$_SESSION["search_data"] = isset($_POST["search_data"]) ? $_POST["search_data"] : array();
	// セッションデータを配列にセット
	$search_data = $_SESSION["search_data"];
	// 各項目データをセット
	$music = isset($search_data["music"]) ? $search_data["music"] : "";
	// 入力チェック
	// $err_msg = checkInputData($contact_data);
	// if(!$err_msg){
	// 	header("Location: confirm.php");
	// 	exit();
	// }
	if(!$err_msg){
		header("Location: ../music-info");
		exit();
	}
	
	
	// wpdbオブジェクト
	global $wpdb;
	
	// ★デバッグ用
	$wpdb->show_errors();
	
	// // SQL
 //   //$sql = $wpdb->prepare("SELECT p.name, p.price FROM $wpdb->products p WHERE p.name LIKE %s", '%'.$product_name.'%' );
 //   $sql = $wpdb->prepare("SELECT TL.MUSIC_CD, MT.TITLE_NM, TL.LYLICS, Count(TL.LYLICS) AS CNT FROM CK200_T_LYLICS TL INNER JOIN CK200_M_TITLE MT ON TL.MUSIC_CD = MT.MUSIC_CD GROUP BY TL.MUSIC_CD, MT.TITLE_NM, TL.LYLICS ORDER BY TL.MUSIC_CD, Count(TL.LYLICS) DESC" , '');
 //   # -> "SELECT p.name, p.price FROM wp_products p WHERE p.name LIKE '%製品名（検索キーワード）%'"

	// // クエリ実行
 //   $rows = $wpdb->get_results($sql);

	// // 検索結果メッセージ
 //   $message = (!$rows) ? "該当する製品が見つかりませんでした。" : count($rows)."件の製品が見つかりました。";

	// // 情報を表示
	// if($rows){
	// 	foreach ($rows as $row) {
	// 	  echo "<p>【".$row->TITLE_NM."】文字：".$row->LYLICS."　登場数：".$row->CNT."</p>";
	// 	}
	// }
} elseif ($act == 3) { // おすすめ曲を見るボタンを押下された場合
	// POSTデータをセッションに格納
	$_SESSION["search_data"] = isset($_POST["search_data"]) ? $_POST["search_data"] : array();
	// セッションデータを配列にセット
	$search_data = $_SESSION["search_data"];
	// 各項目データをセット
	$hsk = isset($search_data["hsk"]) ? $search_data["hsk"] : "";
	if(!$err_msg){
		header("Location: ../text-info");
		exit();
	}
	
} elseif ($act == 4) { // おすすめ曲を見るボタンを押下された場合
	// POSTデータをセッションに格納
	$_SESSION["search_data"] = isset($_POST["search_data"]) ? $_POST["search_data"] : array();
	// セッションデータを配列にセット
	$search_data = $_SESSION["search_data"];
	// 各項目データをセット
	$hsk = isset($search_data["hsk"]) ? $search_data["hsk"] : "";
	if(!$err_msg){
		header("Location: ../hsk-info");
		exit();
	}
	
} else {
	// セッションデータ取得
	$contact_data = isset($_SESSION["search_data"]) ? $_SESSION["search_data"] : array();
	// 各項目データをセット
	$name = isset($contact_data["name"]) ? $contact_data["name"] : "";
	$email = isset($contact_data["email"]) ? $contact_data["email"] : "";
	$message = isset($contact_data["message"]) ? $contact_data["message"] : "";
}


get_header();

?>

<div id="primary" class="content-area">
<?php $archive_content_classes = apply_filters( 'islemag_archive_content_classes',array( 'islemag-content-left', 'col-md-9' ) ); ?>
<div 
<?php
if ( ! empty( $archive_content_classes ) ) {
	echo 'class="' . implode( ' ', $archive_content_classes ) . '"';
}
?>
>
<main id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>
<h1><?php the_title(); ?></h1>
<?php endwhile; ?>
  

<?php if (isset($err_msg) && count($err_msg) > 0) { ?>
<div>
	<ul class="error">
		<?php foreach ($err_msg as $msg) { ?>
		<li><?php echo $msg; ?></li>
		<?php } ?>
	</ul>
</div>

<?php }
?>

<div class="page-content">

<h2 class="title-border title-bg-line pink mb30">
	<span>曲を選択2</span>
</h2>

<form class="form-horizontal" name="contactform" role="form" method="post" action="" novalidate>
	<div class="form-group">
		<label for="inputMusic" class="col-sm-3">歌える曲を選択</label>
		<div class="col-sm-9">
<?php
	if ($rows_title) {
	  echo "<select class=\"form-control\" name=\"search_data[music]\">";
		foreach ($rows_title as $row) {
		  echo "<option value=\"".$row->id."\">".$row->music_nm."</option>";
		}
	  echo "</select>";
	}

?>

			<div class="btn-area">
				<button type="submit" name="btnSubmit" class="btn btn-success">おすすめ曲を見る<i class="fa fa-arrow-circle-right"></i></button>
				<input type="hidden" name="act" value="2">
			</div>

		</div>
	</div>
</form>
	
<h2 class="title-border title-bg-line pink mb30">
	<span>文章を入力2</span>
</h2>
<form class="form-horizontal" name="contactform" role="form" method="post" action="" novalidate>
	<div class="form-group">
		<label for="inputHsk" class="col-sm-3">学習したフレーズやお気に入りのフレーズを記載</label>
		<div class="col-sm-9">
			<textarea name="search_data[hsk]" class="form-control"></textarea>
			<div class="btn-area">
				<button type="submit" name="btnSubmit" class="btn btn-success">おすすめ曲を見る<i class="fa fa-arrow-circle-right"></i></button>
				<input type="hidden" name="act" value="3">
			</div>
		</div>
	</div>
</form>


<h2 class="title-border title-bg-line pink mb30">
	<span>HSKの級から検索</span>
</h2>
<form class="form-horizontal" name="contactform" role="form" method="post" action="" novalidate>
	<div class="form-group">
		<label for="inputHsk" class="col-sm-3">マスターした級を選択</label>
		<div class="col-sm-9">
			<select class="form-control" name="search_data[hsk]">
				<option value="1">HSK1級</option>
				<option value="2">HSK2級</option>
				<option value="3">HSK3級</option>
				<option value="4">HSK4級</option>
				<option value="5">HSK5級</option>
				<option value="6">HSK6級</option>
			</select>
			<div class="btn-area">
				<button type="submit" name="btnSubmit" class="btn btn-success">おすすめ曲を見る<i class="fa fa-arrow-circle-right"></i></button>
				<input type="hidden" name="act" value="4">
			</div>
		</div>
	</div>
</form>

</div><!-- #page-content -->

</main><!-- #main -->
</div><!-- #class -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

 