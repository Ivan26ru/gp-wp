<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // вывод атрибутов языка ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // кодировка ?>">
	<?php /* RSS и всякое */ ?>

		<!-- Обнуление -->
	<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/css/normalize.css">

	<!-- иконки fa -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/fa/css/font-awesome.min.css">
	<link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/css/main.css">


	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // абсолютный путь до темы ?>/style.css">
	 <!--[if lt IE 9]>
	 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
	<title><?php typical_title(); // выводи тайтл, функция лежит в function.php ?></title>
	<?php wp_head(); // необходимо для работы плагинов и функционала ?>
</head>
<body <?php body_class(); // все классы для body ?>>
	<header>
			<!-- Базовая информация Светлоград -->
			<div class="block1 block-title">
				<h1><a href="<?php echo home_url(); ?>">Городской портал г.Светлоград</a></h1>
				<h1 class="logo-name"><a href="<?php echo home_url(); ?>">v-Svetlograde.ru</a></h1>
				<div class="block2 block-title-2">
					<ul>
						<li><i class="fa fa-map-signs fa-2x"></i>Россия, Ставропольский край, Петровский район</li>
						<li><i class="fa fa-globe fa-2x"></i>Основан в 1786</li>
						<li><i class="fa fa-child fa-2x"></i>37 819 человек</li>
						<li><i class="fa fa-map fa-2x"></i>41 км&sup2;</li>
						<li><i class="fa fa-phone fa-2x"></i>+7(86547)</li>
						<li><i class="fa fa-bus fa-2x"></i>14 рублей</li>
						<li><i class="fa fa-taxi fa-2x"></i>от 50 рублей</li>
						<li><i class="fa fa-envelope-o fa-2x"></i>356530</li>
					</ul>
				</div>
			</div>
			<!-- конец базовой информации Светлоград -->

<!-- 					<?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
			'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в function.php
			'container'=> 'nav', // обертка списка
			'menu_class' => 'bottom-menu', // класс для ul
	  		'menu_id' => 'bottom-nav', // id для ul
  			);
			wp_nav_menu($args); // выводим верхнее меню
		?> -->

	</header>

	<!-- левая колонка -->
<div class="sidebar">
<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>
</div>
<!-- конец левой колонки -->