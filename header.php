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
	<meta name="description" content="<?php
the_title();//Заголовок страницы
//the_meta();//вывод данных произвольных полей на страничке
//краткое описание страницы?>" />
	<!-- <meta name="keywords" content="<?php the_tags('',',',''); // ссылки на тэги поста  //ключевые слова страницы?>" /> -->
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
				<h1 class="block2"><a class="logo-titile" href="<?php echo home_url(); ?>">v-Svetlograde.ru Городской портал Светлограда</a></h1>
				<!-- <h1 class="logo-name"><a href="<?php echo home_url(); ?>">v-Svetlograde.ru</a></h1> -->
				<div class="block2 block-title-2">
					<ul class="info-li">
						<li><i class="fa fa-map-signs fa-2x"></i>Россия, Ставропольский край, Петровский район</li>
						<li><i class="fa fa-globe fa-2x"></i>Основан в 1786</li>
						<li><i class="fa fa-child fa-2x"></i>37 819 человек</li>
						<li><i class="fa fa-map fa-2x"></i>41 км&sup2;</li>
						<li><i class="fa fa-phone fa-2x"></i>+7(86547)</li>
						<li><i class="fa fa-bus fa-2x"></i>14 рублей</li>
						<li><i class="fa fa-taxi fa-2x"></i>от 50 рублей</li>
						<li><i class="fa fa-envelope-o fa-2x"></i>356530</li>

						<li><a href="http://ok.ru/vsvetlograde"><i class="fa fa-odnoklassniki fa-2x"></i>группа в портала в ОК</a></li>
						<li><a href="http://vk.com/v_svetlograde"><i class="fa fa-vk fa-2x"></i>группа в портала в VK</a></li>
					</ul>
					<div class="yandex-pogoda">
						<a href="https://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*https://pogoda.yandex.ru/svetlograd" target="_blank"><img src="//info.weather.yandex.net/svetlograd/3.ru.png?domain=ru" border="0" alt="Яндекс.Погода"/><img width="1" height="1" src="https://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*https://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>
					</div>
				</div>
			</div>
			<!-- конец базовой информации Светлоград -->

	</header>

<!-- форма авторизации -->
<!-- <div class="block2 authorization">

</div> -->
<div class="width960 block2">
<!-- верхнее меню -->
<?php $menu_top = array(
        'menu'            => 'top',              // (string) Название выводимого меню (указывается в админке при создании меню, приоритетнее 
                                                                                  // чем указанное местоположение theme_location - если указано, то параметр theme_location игнорируется)
        'container'       => '',           // (string) Контейнер меню. Обворачиватель ul. Указывается тег контейнера (по умолчанию в тег div)
        'container_class' => '',              // (string) class контейнера (div тега)
        'container_id'    => '',              // (string) id контейнера (div тега)
        'menu_class'      => 'menu menu-top',          // (string) class самого меню (ul тега)
        'menu_id'         => '',              // (string) id самого меню (ul тега)
        'echo'            => true,            // (boolean) Выводить на экран или возвращать для обработки
        'fallback_cb'     => 'wp_page_menu',  // (string) Используемая (резервная) функция, если меню не существует (не удалось получить)
        'before'          => '',              // (string) Текст перед <a> каждой ссылки
        'after'           => '',              // (string) Текст после </a> каждой ссылки
        'link_before'     => '',              // (string) Текст перед анкором (текстом) ссылки
        'link_after'      => '',              // (string) Текст после анкора (текста) ссылки
        'depth'           => 0,               // (integer) Глубина вложенности (0 - неограничена, 2 - двухуровневое меню)
        'walker'          => '',              // (object) Класс собирающий меню. Default: new Walker_Nav_Menu
        'theme_location'  => ''               // (string) Расположение меню в шаблоне. (указывается ключ которым было зарегистрировано меню в функции register_nav_menus)
        );

wp_nav_menu($menu_top);

 if ( is_user_logged_in() ) {
 	global $current_user;
	get_currentuserinfo();
	echo "<a class=\"button\" href=\"http://v-svetlograde.ru/forums/user/" . $current_user->user_login . "/\">Привет " . $current_user->user_login . "</a>";
}
else {
	echo '<a class="button" href="http://v-svetlograde.ru/wp-login.php"><i class="fa fa-sign-in fa-1x"></i>Вход или регистрация</a>';
}
 ?>
</div>
<!-- Конец верхнего меню -->

<!-- верхний сайдбар -->
<!-- <div class="sidebar">
  <?php dynamic_sidebar( 'top-sidebar' ); ?>
</div> -->
<!-- конец верхнего сайдбара -->

	<!-- левая колонка -->
<div class="sidebar">
<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>
</div>
<!-- конец левой колонки -->