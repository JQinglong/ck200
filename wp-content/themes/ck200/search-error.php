<?php
/**
 * Template Name: search-error
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

<div class="page-content">
	<p class="mb30 text-danger">
		予期せぬエラーが発生しましたため、検索が完了しませんでした。
	</p>
</div>

</main><!-- #main -->
</div><!-- #class -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
