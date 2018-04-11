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
	
$sql = $wpdb->prepare("SELECT MT.music_nm, MT.cnt_lylics CNT, COUNT( DISTINCT TL.lylics ) DISTCNT
, CONCAT( LEFT( MT.lylics, 20 ) ,  '...' ) LYL, MS.img_url
FROM lylics TL
INNER JOIN musics MT ON MT.id = TL.music_id
LEFT JOIN singers MS ON MT.singer_id = MS.id
WHERE TL.music_id =%d " , $music);

//echo $sql;

$rows = $wpdb->get_results($sql);
$message = (!$rows) ? "曲の指定が正しくありません。" : "";
echo $message;
if($rows){
	foreach ($rows as $row) {
	  //$title_str =  "<p>【".$row->TITLE_NM."】</p>";
	  $title_str =  $row->music_nm;
	  $lylics_cnt =  $row->CNT;
	  $lylics_distcnt =  $row->DISTCNT;
	  $lyl_str =  $row->LYL;
	  $img_url =  isset($row->img_url) ? $row->img_url : 'https://ck200-konno.c9users.io/wp-content/uploads/2017/09/tori.jpg';
	}
}

//マッチ情報
$sql = $wpdb->prepare("SELECT MT.music_nm,MT.cnt_lylics CNT,COUNT( DISTINCT TL.lylics ) DISTCNT
,COUNT(DISTINCT TL1.lylics) INCNT
,COUNT(DISTINCT TL1.lylics)/COUNT( DISTINCT TL.lylics )
,CONCAT(LEFT(MT.lylics,20),'...') LYL
,MS.img_url
 FROM lylics TL
 INNER JOIN musics MT
  ON MT.id = TL.music_id
 LEFT JOIN (SELECT music_id,lylics FROM lylics WHERE music_id=%d GROUP BY music_id,lylics) TL1
  ON TL1.lylics = TL.lylics
 LEFT JOIN singers MS ON MT.singer_id = MS.id
WHERE TL.music_id<>%d
GROUP BY MT.music_nm,MT.cnt_lylics,CONCAT(LEFT(MT.lylics,20),'...') ,MS.img_url
ORDER BY (COUNT(DISTINCT TL1.lylics)/COUNT( DISTINCT TL.lylics )) desc
LIMIT 3 " , $music, $music);

//echo $sql;

$rows = $wpdb->get_results($sql);
if($rows){
	$i = 0;
	foreach ($rows as $row) {
	  $title_strs[$i] =  $row->music_nm;
	  $lylics_cnts[$i] =  $row->CNT;
	  $lylics_distcnts[$i] =  $row->DISTCNT;
	  $lylics_incnts[$i] =  $row->INCNT;
	  $lyl_strs[$i] =  $row->LYL;
	  //$img_url1 =  $row->IMG_URL;
	  $img_urls[$i] =  isset($row->img_url) ? $row->img_url : 'https://ck200-konno.c9users.io/wp-content/uploads/2017/09/tori.jpg';
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
// 	  $lylics_cnt1 =  $row->CNT;
// 	  $lylics_distcnt1 =  $row->DISTCNT;
// 	  $lylics_incnt1 =  $row->INCNT;
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
// 		  $lylics_cnt2 =  $row->CNT;
// 		  $lylics_distcnt2 =  $row->DISTCNT;
// 		  $lylics_incnt2 =  $row->INCNT;
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
// 		  $lylics_cnt3 =  $row->CNT;
// 		  $lylics_distcnt3 =  $row->DISTCNT;
// 		  $lylics_incnt3 =  $row->INCNT;
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
	<img class='img-circle pull-left img-responsive' style='padding:0;margin:0 15px 15px 0;' src='<?php echo $img_url; ?>'>
    <div class="entry-title"><?php echo $title_str; ?></div>
	<div><?php echo $lyl_str; ?></div>
	<div>文字数　　:<?php echo $lylics_cnt; ?></div>
	<div>文字種類数:<?php echo $lylics_distcnt; ?></div>
	
	<h2 class="title-border title-bg-line pink mb30">
		<span>次に覚える曲はこれ！！</span>
	</h2>
<?php echo $i+1; ?>
<?php for($i=0;$i<=2;$i++) { ?>
	<h3 class="title-underblock custom orange mb30">
		<span><?php echo $i+1; ?> <?php echo $title_strs[$i]; ?></span>
	</h3>
	<div class="row">
		<div class="col-sm-12">
			<img class='img-circle pull-left img-responsive' style='padding:0;margin:0 15px 15px 0;' src='<?php echo $img_urls[$i]; ?>'>
			<div><?php echo $lyl_strs[$i]; ?></div>
			<div>文字数　　:<?php echo $lylics_cnts[$i]; ?></div>
			<div>文字種類数:<?php echo $lylics_distcnts[$i]; ?></div>
			<div>重複種類数:<?php echo $lylics_incnts[$i]; ?></div>
		</div>
	</div>
<?php } ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
