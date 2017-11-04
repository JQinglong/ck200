<?php
/**
 * Template Name: hsk-info
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

// ファイル読み込み
require_once( __DIR__ . '/contact/pcf_lib/init.php');
require_once( __DIR__ . '/contact/pcf_lib/validate.php');

global $param;

// ページタイトル
$param['title'] = 'HSK級別おすすめ | おすすめ曲検索';

// セッションデータ取得
$search_data = isset($_SESSION["search_data"]) ? $_SESSION["search_data"] : array();
// セッションデータの有無をチェック
if (count($search_data) == 0) {
	header("Location: ../search-error/"); // データ取得できない場合はエラー画面へ遷移
	exit;
}

$hsk = isset($search_data["hsk"]) ? $search_data["hsk"] : "";

//操作アクションを取得
$act = isset($_POST["act"]) ? intval($_POST["act"]) : 1;


// wpdbオブジェクト
global $wpdb;

// ★デバッグ用
$wpdb->show_errors();

// 指定された曲の情報
//$sql = $wpdb->prepare("SELECT p.name, p.price FROM $wpdb->products p WHERE p.name LIKE %s", '%'.$product_name.'%' );
//$sql = $wpdb->prepare("SELECT MT.TITLE_NM FROM CK200_M_TITLE MT WHERE MT.MUSIC_CD=%s " , $music);
$sql = $wpdb->prepare("SELECT MT.MUSIC_CD, MT.TITLE_NM, CONCAT(LEFT(MT.LYLICS,20),'...')  LYL
,IFNULL(SUB.CNT,0) LEFTCNT
FROM CK200_M_TITLE MT
LEFT JOIN
(
SELECT TL.MUSIC_CD, COUNT(DISTINCT TL.LYLICS) CNT FROM CK200_T_LYLICS TL
WHERE NOT EXISTS(SELECT 1 FROM CK200_M_HSK MH WHERE MH.LEVEL=%s AND INSTR(MH.WORD, TL.LYLICS) > 0)
AND TL.LYLICS NOT IN('.','：','-','/',':','&',',','、','，','。','<','>','~','+','【','】','《','》','／','“','!','?')
AND TL.LYLICS NOT REGEXP '[a-z]'
AND TL.LYLICS NOT REGEXP '[0-9]'
GROUP BY TL.MUSIC_CD
) SUB
ON MT.MUSIC_CD = SUB.MUSIC_CD
WHERE LENGTH(IFNULL(MT.LYLICS,'')) > 10
ORDER BY IFNULL(SUB.CNT,0)
LIMIT 10 " , $hsk);

$rows = $wpdb->get_results($sql);
$message = (!$rows) ? "条件の指定が正しくありません。" : "";
echo $message;

// 6級の場合は難しいチャレンジ曲も紹介
if ( $hsk == 6) {
$sql = $wpdb->prepare("SELECT MT.MUSIC_CD, MT.TITLE_NM, CONCAT(LEFT(MT.LYLICS,20),'...')  LYL
,IFNULL(SUB.CNT,0) LEFTCNT
FROM CK200_M_TITLE MT
LEFT JOIN
(
SELECT TL.MUSIC_CD, COUNT(DISTINCT TL.LYLICS) CNT FROM CK200_T_LYLICS TL
WHERE NOT EXISTS(SELECT 1 FROM CK200_M_HSK MH WHERE MH.LEVEL=%s AND INSTR(MH.WORD, TL.LYLICS) > 0)
AND TL.LYLICS NOT IN('.','：','-','/',':','&',',','、','，','。','<','>','~','+','【','】','《','》','／','“','!','?')
AND TL.LYLICS NOT REGEXP '[a-z]'
AND TL.LYLICS NOT REGEXP '[0-9]'
GROUP BY TL.MUSIC_CD
) SUB
ON MT.MUSIC_CD = SUB.MUSIC_CD
WHERE LENGTH(IFNULL(MT.LYLICS,'')) > 10
ORDER BY IFNULL(SUB.CNT,0) DESC
LIMIT 10 " , $hsk);

$rows6 = $wpdb->get_results($sql);
$message = (!$rows) ? "条件の指定が正しくありません。" : "";
echo $message;
}

//詳細情報
// $sql = $wpdb->prepare("SELECT MT.TITLE_NM,COUNT(TL.LYLICS) CNT,COUNT( DISTINCT TL.LYLICS ) DISTCNT
// ,COUNT(DISTINCT TL1.LYLICS) INCNT
// ,CONCAT(LEFT(MT.LYLICS,20),'...') LYL
//  FROM CK200_T_LYLICS TL
//  INNER JOIN CK200_M_TITLE MT
//   ON MT.MUSIC_CD = TL.MUSIC_CD
//  LEFT JOIN (SELECT MUSIC_CD,LYLICS FROM CK200_T_LYLICS WHERE MUSIC_CD=%s GROUP BY MUSIC_CD,LYLICS) TL1
//   ON TL1.LYLICS = TL.LYLICS
//  WHERE TL.MUSIC_CD=51 " , $music);
// # -> "SELECT p.name, p.price FROM wp_products p WHERE p.name LIKE '%製品名（検索キーワード）%'"
// $rows = $wpdb->get_results($sql);
// $message = (!$rows) ? "曲の指定が正しくありません。" : "";
// echo $message;


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

<?php if (isset($err_msg) && count($err_msg) > 0) { ?>
<div>
	<ul class="error">
		<?php foreach ($err_msg as $msg) { ?>
		<li><?php echo $msg; ?></li>
		<?php } ?>
	</ul>
</div>

<?php } ?>

<div class="page-content">

<img class='img-circle pull-left img-responsive' style='padding:0;margin:0 15px 15px 0;' src='https://ck200-konno.c9users.io/wp-content/uploads/2017/10/hskimages.png' width="100px">
<div class="entry-title clearfix">HSK <?php echo $hsk; ?> 級をマスターした方にお勧めの曲</div>

<div class="table-responsive">
  <table class="table table-striped">
	<thead>
		<tr><th>曲名</th><th>歌詞（抜粋）</th><th>残り何文字？</th></tr>
	</thead>
	<tbody>
<?php
	if ($rows) {
		foreach ($rows as $row) {
		  echo "<tr><td>".$row->TITLE_NM."</td><td>".$row->LYL."</td><td>".$row->LEFTCNT."</td></tr>";
		}
	}

?>
	</tbody>
  </table>
</div>

<?php
	if ($rows6) {
?>
<div class="entry-title">HSK <?php echo $hsk; ?> 級をマスターした方はこちらもチャレンジ？！</div>

<div class="table-responsive">
  <table class="table table-striped">
	<thead>
		<tr><th>曲名</th><th>歌詞（抜粋）</th><th>残り何文字？</th></tr>
	</thead>
	<tbody>
<?php
		foreach ($rows6 as $row) {
		  echo "<tr><td>".$row->TITLE_NM."</td><td>".$row->LYL."</td><td>".$row->LEFTCNT."</td></tr>";
		}
?>
	</tbody>
  </table>
</div>
<?php
	}
?>

	</main><!-- #main -->
</div><!-- #page-content -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
