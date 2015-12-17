<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<?php wp_nav_menu( array(
'container' => 'div', // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
'container_class' => 'mesta-div', // (string) class контейнера (div тега)
'menu_class'=>'mesta-menu',
'theme_location'=>'mesta',
'after'=>'') );?>
<section>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<h1><?php the_title(); // заголовок ?></h1>
		<?php the_content(); // контент ?>
	</article>
<?php endwhile; // конец цикла ?>
</section>
<?php get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>