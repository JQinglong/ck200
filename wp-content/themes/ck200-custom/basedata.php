<?php
/**
 * Template Name: basedata
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
		foreach ($rows as $row) {
		  echo "<p>【".$row->TITLE_NM."】文字：".$row->LYLICS."　登場数：".$row->CNT."</p>";
		}
	}


?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
