<?php
/**
 * Template Name: contact-index
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

////////////////////////////////////////////////////////
// ここから下がcontact/index.phpのソース引用部分
////////////////////////////////////////////////////////
 
// ファイル読み込み
require_once( __DIR__ . '/contact/pcf_lib/init.php');
require_once( __DIR__ . '/contact/pcf_lib/validate.php');

global $param;

// ページタイトル
$param['title'] = 'お問い合わせ | 無料ダウンロード';

//操作アクションを取得
$act = isset($_POST["act"]) ? intval($_POST["act"]) : 1;


if ($act == 1) {
	// セッションデータクリア
	$contact_data = array();
	// 初期値セット
	$err_msg = array();
	$name = '';
	$email = '';
	$message = '';

} elseif ($act == 2) { // 確認ボタンを押下された場合
	// POSTデータをセッションに格納
	$_SESSION["contact_data"] = isset($_POST["contact_data"]) ? $_POST["contact_data"] : array();
	// セッションデータを配列にセット
	$contact_data = $_SESSION["contact_data"];
	// 各項目データをセット
	$name = isset($contact_data["name"]) ? $contact_data["name"] : "";
	$email = isset($contact_data["email"]) ? $contact_data["email"] : "";
	$message = isset($contact_data["message"]) ? $contact_data["message"] : "";
	// 入力チェック
	// $err_msg = checkInputData($contact_data);
	// if(!$err_msg){
	// 	header("Location: confirm.php");
	// 	exit();
	// }
	
	
	// wpdbオブジェクト
	global $wpdb;
	
	// ★デバッグ用
	$wpdb->show_errors();
	
	// SQL
    //$sql = $wpdb->prepare("SELECT p.name, p.price FROM $wpdb->products p WHERE p.name LIKE %s", '%'.$product_name.'%' );
    $sql = $wpdb->prepare("SELECT TL.MUSIC_CD, MT.TITLE_NM, TL.LYLICS, Count(TL.LYLICS) AS CNT FROM CK200_T_LYLICS TL INNER JOIN CK200_M_TITLE MT ON TL.MUSIC_CD = MT.MUSIC_CD GROUP BY TL.MUSIC_CD, MT.TITLE_NM, TL.LYLICS ORDER BY TL.MUSIC_CD, Count(TL.LYLICS) DESC" , '');
    # -> "SELECT p.name, p.price FROM wp_products p WHERE p.name LIKE '%製品名（検索キーワード）%'"

	// クエリ実行
    $rows = $wpdb->get_results($sql);

	// 検索結果メッセージ
    $message = (!$rows) ? "該当する製品が見つかりませんでした。" : count($rows)."件の製品が見つかりました。";

	// // 情報を表示
	// if($rows){
	// 	foreach ($rows as $row) {
	// 	  echo "<p>【".$row->TITLE_NM."】文字：".$row->LYLICS."　登場数：".$row->CNT."</p>";
	// 	}
	// }

} else {
	// セッションデータ取得
	$contact_data = isset($_SESSION["contact_data"]) ? $_SESSION["contact_data"] : array();
	// 各項目データをセット
	$name = isset($contact_data["name"]) ? $contact_data["name"] : "";
	$email = isset($contact_data["email"]) ? $contact_data["email"] : "";
	$message = isset($contact_data["message"]) ? $contact_data["message"] : "";
}
///////////////////////////////////////////////////////
// ここから上がcontact/index.phpのソース引用部分
////////////////////////////////////////////////////////

get_header(); ?>

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


	// 情報を表示
	if($rows){
	  //echo "<img src=""http://chart.apis.google.com/chart?chs=300x300&chd=t:100,35,0,25,0,0,10&cht=v"" alt=""Google Chart API - Example"" height=""250"" width=""300"">";
?>

	  <img src="http://chart.apis.google.com/chart?chs=300x300&chd=t:100,35,0,25,0,0,10&cht=v" alt="Google Chart API - Example" height="150" width="200" />
<?php 
	}


?>

<div class="page-content">
	<p class="mb30">以下を入力し確認するボタンを押してください。<span class="red">*</span>は入力必須です。</p>

	<form class="form-horizontal" name="contactform" role="form" method="post" action="" novalidate>
		<div class="form-group">
			<label for="inputName" class="col-sm-3 control-label">お名前<span class="red">*</span></label>
			<div class="col-sm-9">
				<input type="text" class="form-control" name="contact_data[name]" placeholder="お名前" value="<?php echo h($name); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputEmail" class="col-sm-3 control-label">メールアドレス<span class="red">*</span></label>
			<div class="col-sm-9">
				<input type="email" class="form-control" name="contact_data[email]" placeholder="メールアドレス" value="<?php echo h($email); ?>">
			</div>
		</div>
		<div class="form-group">
			<label for="inputMessage" class="col-sm-3 control-label">お問い合わせ内容<span class="red">*</span></label>
			<div class="col-sm-9">
				<textarea class="form-control" name="contact_data[message]" rows="5"><?php echo h($message); ?></textarea>
			</div>
		</div>
		<div class="btn-area">
			<button type="submit" name="btnSubmit" class="btn btn-success">確認する<i class="fa fa-arrow-circle-right"></i></button>
			<input type="hidden" name="act" value="2">
		</div>
	</form>

</div>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
