<?php
/**
 * Template Name: music-info
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

// セッションデータ取得
$search_data = isset($_SESSION["search_data"]) ? $_SESSION["search_data"] : array();

// セッションデータの有無をチェック
if (count($search_data) == 0) {
	header("Location: ../search-error/"); // データ取得できない場合はエラー画面へ遷移
	exit;
}

$music = isset($search_data["music"]) ? $search_data["music"] : "";

//操作アクションを取得
$act = isset($_POST["act"]) ? intval($_POST["act"]) : 1;

	
// wpdbオブジェクト
global $wpdb;

// ★デバッグ用
$wpdb->show_errors();
	
$sql = $wpdb->prepare("
SELECT MT.music_nm, MT.cnt_lylics CNT, COUNT( DISTINCT TL.lylics ) DISTCNT
/*, CONCAT( LEFT( MT.LYLICSTR, 20 ) ,  '...' ) LYL*/
, MT.LYLICSTR LYL
, MS.singer_nm
, MS.img_url
FROM lylics TL
INNER JOIN musics MT ON MT.id = TL.music_id
LEFT JOIN singers MS ON MT.singer_id = MS.id
WHERE TL.music_id =%d
" , $music);

//echo $sql;

$rows = $wpdb->get_results($sql);
$message = (!$rows) ? "曲の指定が正しくありません。" : "";
echo $message;
if($rows){
	foreach ($rows as $row) {
	  //$title_str =  "<p>【".$row->TITLE_NM."】</p>";
	  $title_str =  $row->music_nm;
	  $lyl_cnt =  $row->CNT;
	  $lyl_distcnt =  $row->DISTCNT;
	  $lyl_str =  $row->LYL;
	  $singer_nm =  $row->singer_nm;
	  $img_url =  isset($row->img_url) ? $row->img_url : 'https://ck200-konno.c9users.io/wp-content/uploads/2017/09/tori.jpg';
	}
}

//マッチ情報
$sql = $wpdb->prepare("SELECT MT.id
,MT.music_nm,MT.cnt_lylics CNT,COUNT( DISTINCT TL.lylics ) DISTCNT
,COUNT(DISTINCT TL1.lylics) INCNT
,COUNT(DISTINCT TL1.lylics)/COUNT( DISTINCT TL.lylics )
,CONCAT(LEFT(MT.LYLICSTR,20),'...') LYL
,MS.singer_nm
,MS.img_url
,(COUNT(DISTINCT TL1.lylics)/COUNT( DISTINCT TL.lylics )) HITRATE
 FROM lylics TL
 INNER JOIN musics MT
  ON MT.id = TL.music_id
 LEFT JOIN (SELECT music_id,lylics FROM lylics WHERE music_id=%d GROUP BY music_id,lylics) TL1
  ON TL1.lylics = TL.lylics
 LEFT JOIN singers MS ON MT.singer_id = MS.id
WHERE TL.music_id<>%d
GROUP BY MT.music_nm,MT.cnt_lylics,CONCAT(LEFT(MT.LYLICSTR,20),'...') ,MS.img_url
ORDER BY (COUNT(DISTINCT TL1.lylics)/COUNT( DISTINCT TL.lylics )) desc
LIMIT 3 " , $music, $music);

//echo $sql;

$rows = $wpdb->get_results($sql);
if($rows){
	$i = 0;
	foreach ($rows as $row) {
	  $m_id[$i] =  $row->id;
	  $title_strs[$i] =  $row->music_nm;
	  $lyl_cnts[$i] =  $row->CNT;
	  $lyl_distcnts[$i] =  $row->DISTCNT;
	  $lyl_incnts[$i] =  $row->INCNT;
	  $lyl_strs[$i] =  $row->LYL;
	  $lyl_hitrate[$i] =  $row->HITRATE;
	  $singer_nms[$i] =  $row->singer_nm;
	  //$img_url1 =  $row->IMG_URL;
	  $img_urls[$i] =  isset($row->img_url) ? $row->img_url : '/wp-content/uploads/2017/09/tori.jpg';
	  $i++;
	}
}


// //マッチ情報1
// $sql = $wpdb->prepare("SELECT MT.music_nm,MT.cnt_lylics CNT,COUNT( DISTINCT TL.lylics ) DISTCNT
// ,COUNT(DISTINCT TL1.lylics) INCNT
// ,CONCAT(LEFT(MT.lylics,20),'...') LYL
// ,MS.img_url
//  FROM lylics TL
//  INNER JOIN musics MT
//   ON MT.id = TL.music_id
//  LEFT JOIN (SELECT music_id,lylics FROM lylics WHERE music_id=%d GROUP BY music_id,lylics) TL1
//   ON TL1.lylics = TL.lylics
//  LEFT JOIN singers MS ON MT.singer_id = MS.id
//  WHERE TL.music_id=31 " , $music);
// # -> "SELECT p.name, p.price FROM wp_products p WHERE p.name LIKE '%製品名（検索キーワード）%'"
// $rows = $wpdb->get_results($sql);
// $message = (!$rows) ? "曲の指定が正しくありません。" : "";
// echo $message;
// if($rows){
// 	foreach ($rows as $row) {
// 	  $title_str1 =  $row->music_nm;
// 	  $lyl_cnt1 =  $row->CNT;
// 	  $lyl_distcnt1 =  $row->DISTCNT;
// 	  $lyl_incnt1 =  $row->INCNT;
// 	  $lyl_str1 =  $row->LYL;
// 	  //$img_url1 =  $row->IMG_URL;
// 	  $img_url1 =  isset($row->img_url) ? $row->img_url : 'https://ck200-konno.c9users.io/wp-content/uploads/2017/09/tori.jpg';
// 	}
// }
// //マッチ情報2
// $sql = $wpdb->prepare("SELECT MT.music_nm,MT.cnt_lylics CNT,COUNT( DISTINCT TL.lylics ) DISTCNT
// ,COUNT(DISTINCT TL1.lylics) INCNT
// ,CONCAT(LEFT(MT.lylics,20),'...') LYL
// ,MS.img_url
//  FROM lylics TL
//  INNER JOIN musics MT
//   ON MT.id = TL.music_id
//  LEFT JOIN (SELECT music_id,lylics FROM lylics WHERE music_id=%d GROUP BY music_id,lylics) TL1
//   ON TL1.lylics = TL.lylics
//  LEFT JOIN singers MS ON MT.singer_id = MS.id
//  WHERE TL.music_id=142 " , $music);
//     # -> "SELECT p.name, p.price FROM wp_products p WHERE p.name LIKE '%製品名（検索キーワード）%'"
//     $rows = $wpdb->get_results($sql);
//     $message = (!$rows) ? "曲の指定が正しくありません。" : "";
// 	echo $message;
// 	if($rows){
// 		foreach ($rows as $row) {
// 		  $title_str2 =  $row->music_nm;
// 		  $lyl_cnt2 =  $row->CNT;
// 		  $lyl_distcnt2 =  $row->DISTCNT;
// 		  $lyl_incnt2 =  $row->INCNT;
// 		  $lyl_str2 =  $row->LYL;
// 		  //$img_url2 =  $row->IMG_URL;
// 		  $img_url2 =  isset($row->img_url) ? $row->IMG_URL : 'https://ck200-konno.c9users.io/wp-content/uploads/2017/09/tori.jpg';
// 		}
// 	}
// //マッチ情報3
// $sql = $wpdb->prepare("SELECT MT.music_nm,MT.cnt_lylics CNT,COUNT( DISTINCT TL.lylics ) DISTCNT
// ,COUNT(DISTINCT TL1.lylics) INCNT
// ,CONCAT(LEFT(MT.lylics,20),'...') LYL
// ,MS.img_url
//  FROM lylics TL
//  INNER JOIN musics MT
//   ON MT.id = TL.music_id
//  LEFT JOIN (SELECT music_id,lylics FROM lylics WHERE music_id=%d GROUP BY music_id,lylics) TL1
//   ON TL1.lylics = TL.lylics
//  LEFT JOIN singers MS ON MT.singer_id = MS.id
//  WHERE TL.music_id=79 " , $music);
//     # -> "SELECT p.name, p.price FROM wp_products p WHERE p.name LIKE '%製品名（検索キーワード）%'"
//     $rows = $wpdb->get_results($sql);
//     $message = (!$rows) ? "曲の指定が正しくありません。" : "";
// 	echo $message;
// 	if($rows){
// 		foreach ($rows as $row) {
// 		  $title_str3 =  $row->music_nm;
// 		  $lyl_cnt3 =  $row->CNT;
// 		  $lyl_distcnt3 =  $row->DISTCNT;
// 		  $lyl_incnt3 =  $row->INCNT;
// 		  $lyl_str3 =  $row->LYL;
// 		  $img_url3 =  isset($row->img_url) ? $row->IMG_URL : 'https://ck200-konno.c9users.io/wp-content/uploads/2017/09/tori.jpg';
// 		}
// 	}


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
	<div class="entry-title">選択した曲の情報</div>
	<h2 class="title-border title-bg-line pink mb30">
		<span><?php echo $title_str; ?></span>
	</h2>
	<div style="width:200px"><img class='img-circle pull-left img-responsive' style='padding:0;margin:0 15px 15px 0;' src='<?php echo $img_url; ?>'></div>
	<div><strong>アーティスト名:<?php echo $singer_nm; ?></strong></div>
	<div>文字数　　:<?php echo $lyl_cnt; ?></div>
	<div>文字種類数:<?php echo $lyl_distcnt; ?></div>
	<div><?php echo $lyl_str; ?></div>

	<h2 class="title-border title-bg-line purple mb30">
		<span>次に覚える曲はこれ！！</span>
	</h2>
<?php for($i=0;$i<=2;$i++) {

	//残り文字取得
	$sql = $wpdb->prepare("
	SELECT DISTINCT lylics.lylics lyl
	FROM lylics
	WHERE music_id = %d
	AND lylics NOT IN (SELECT lylics FROM lylics l2 WHERE l2.music_id = %d)
	" ,$m_id[$i] ,$music);
	
	$rows_lyls = $wpdb->get_results($sql);
	$lyls_str = "";
	foreach ($rows_lyls as $row) {
	  $lyls_str = $lyls_str.$row->lyl;
	}

?>
	<h3 class="title-underblock custom orange mb30">
		<span><?php echo $i+1; ?> <?php echo $title_strs[$i]; ?></span>
	</h3>
	<div class="row">
		<div class="col-sm-12">
			<div style="width:110px"><img class='img-circle pull-left img-responsive' style='padding:0;margin:0 15px 15px 0;' src='<?php echo $img_urls[$i]; ?>'></div>
			<div><strong>アーティスト名:<?php echo $singer_nms[$i]; ?></strong></div>
			<div>文字数　　:<?php echo $lyl_cnts[$i]; ?></div>
			<div>文字種類数:<?php echo $lyl_distcnts[$i]; ?></div>
			<div>重複種類数:<?php echo $lyl_incnts[$i]; ?></div>
			<div>あと<?php echo $lyl_distcnts[$i] - $lyl_incnts[$i]; ?>文字</div>
			<div>ヒット率　:<?php echo $lyl_hitrate[$i] * 100; ?>％</div>
			<div>残り文字　:<?php echo $lyls_str ?></div>
			<!--<div><?php echo $lyl_strs[$i]; ?></div>-->
		</div>
	</div>
<?php } ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
