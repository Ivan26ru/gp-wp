<?php
/**
 * Шаблон обычной страницы (front-page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>

<?php if (is_front_page()) {//если главная страница
 wp_nav_menu( array(
'container' => 'div', // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
'container_class' => 'mesta-div', // (string) class контейнера (div тега)
'menu_class'=>'mesta-menu',
'theme_location'=>'mesta',
'after'=>'') );
} ?>

<?//php get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>