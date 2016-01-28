<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<h1><?php the_title(); // заголовок ?></h1>
		<?php the_content(); // контент ?>
	</section>
<?php endwhile; // конец цикла ?>


<?//php get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>