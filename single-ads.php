<?php
/**
 * Шаблон отдельной записи для ОБЪЯВЛЕНИЙ(single-ads.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<section>
<!-- <h1>Страница в разработке</h1> -->
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
	<article id="post-<?php the_ID(); ?> single" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<h1><?php the_title(); // заголовок поста ?></h1>
		<div class="meta">
			<!-- <p>Опубликовано: <?php the_time('F j, Y'); ?> в <?php the_time('g:i a'); ?></p> <?php // дата и время создания ?> -->
			<p class="meta-category">Навигация: <?php the_category('<i class="fa fa-angle-double-right"></i>') ?></p> <?php // ссылки на категории в которых опубликован пост, через зпт ?>
			<?php the_tags('<p>Тэги: ', ', ', '</p>'); // ссылки на тэги поста ?>
		</div>

<div class="block-2lv">
		<ul class="post-meta">
<?php
//вывод данных произвольных полей на страничке category
$li = 'li';//оборачиватель строки метаназваний
$span = 'span';//оборачиватель названий мета тегов
$teg_class = '';//класс тега строки
$no_data = 'неизвестно';//что выводить, если данных по этому названию нет
$name_title = 'Телефон';//какого рода значение
$phone = 'Телефон';//задаем переменную

$on_off = 'true';//крайняя переменная, если запись выводить не надо при отсутствующем значении ставим true иначе можно вообще не ставить ничего
//<li class="$teg_class"><span>Телефон:</span> 777</li>

meta_teg($li,$span,$teg_class,$no_data,'Контактное лицо','контактное_лицо','','',$on_off);//вывод адреса
meta_teg($li,$span,$teg_class,$no_data,'Картинка','изображение','','',$on_off);//вывод адреса
meta_teg($li,$span,$teg_class,$no_data,'Цена','цена','','',$on_off);//вывод адреса
meta_teg($li,$span,$teg_class,$no_data,$name_title,'телефон','','',$on_off);//вывод номеров телефона
meta_teg($li,$span,$teg_class,$no_data,'Категория объявления','Тип','','',$on_off);//вывод номеров телефона




meta_teg($li,$span,$teg_class,$no_data,'Контактное лицо','Контактное лицо','','',$on_off);//вывод адреса

meta_teg($li,$span,$teg_class,$no_data,'Адрес','Адрес','','',$on_off);//вывод адреса
meta_teg($li,$span,$teg_class,$no_data,'Адрес','Адрес(Светлоград)',$adres_svetlograd,'',$on_off);//вывод адреса

meta_teg($li,$span,$teg_class,$no_data,'Городской телефон','Телефон(86547)',$telefon_cod_svetlograd,'',$on_off);//вывод номеров телефона
meta_teg($li,$span,$teg_class,$no_data,$name_title,$phone,'','',$on_off);//вывод номеров телефона

meta_teg($li,$span,$teg_class,$no_data,'Адрес сайта','сайт','','',$on_off);//вывод адреса сайта
meta_teg($li,$span,$teg_class,$no_data,'Время работы','время работы','','',$on_off);//вывод E-mail
//meta_teg($li,$span,$teg_class,'Время работы','время работы');//вывод время работы

?>
		</ul>
<?php
yandex_maps_shortcode('yandex-maps');//функция вывода карты из адреса произвольного поля, указываю класс блока, если не указывать, будет просто карта, без блока
?>
	</div>

	<div class="block-2lv single-img">
		<?php the_content(); // контент ?>
<?php $image = get_field('изображение');
?>
<a href="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
</a>
			</div>
	</article>
<?php endwhile; // конец цикла ?>
<div class="clearfix div-next-prev">
<?php previous_post_link('%link', '%title', TRUE); // ссылка на предыдущий пост ?>
<?php next_post_link('%link', '%title', TRUE); // ссылка на следующий пост ?>
</div>

	<div class="block-2lv">
	<!-- отключение стандартных комментариев -->
		<?php //if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
<!-- НАЧАЛО ВК кнопка сохранить -->
<!-- Put this script tag to the place, where the Share button will be -->
<script type="text/javascript">
document.write(VK.Share.button(false,{type: "round", text: "Сохранить в ВК"}));
</script>
<!-- КОНЕЦ ВК кнопка сохранить -->

<br>
<noindex>
	<!-- НАЧАЛО комментарии из ВК -->
	<!-- Put this div tag to the place, where the Comments block will be -->
	<div id="vk_comments"></div>
	<script type="text/javascript">
	VK.Widgets.Comments("vk_comments", {limit: 10, width: "800", attach: "*"});
	</script>
	<!-- КОНЕЦ комментарии из ВК -->
</noindex>

	</div>
</section>

<div class="block2 width960">
	<p class="text-center">Немного развлечений</p>
	<EMBED src="http://zmoe.ru/wp-content/banner/shariki.swf" tppabs="http://zmoe.ru/wp-content/banner/shariki.swf" menu=false quality=autohigh bgcolor=#FFFFFF  WIDTH="600" HEIGHT="450" NAME="brb" ALIGN="center"  TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
</div>

<?php //get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>

