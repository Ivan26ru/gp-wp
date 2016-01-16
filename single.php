<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<section>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
	<article id="post-<?php the_ID(); ?> single" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<h1><?php the_title(); // заголовок поста ?></h1>
		<div class="meta">
			<!-- <p>Опубликовано: <?php the_time('F j, Y'); ?> в <?php the_time('g:i a'); ?></p> <?php // дата и время создания ?> -->
			<p>Категории: <?php the_category(',') ?></p> <?php // ссылки на категории в которых опубликован пост, через зпт ?>
			<?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
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

meta_teg($li,$span,$teg_class,$no_data,'Адрес','Адрес','','',$on_off);//вывод адреса
meta_teg($li,$span,$teg_class,$no_data,'Адрес','Адрес(Светлоград)',$adres_svetlograd,'',$on_off);//вывод адреса
meta_teg($li,$span,$teg_class,$no_data,'Почтовый индекс','Почтовый индекс','','');//вывод индекса(если его нет выводится 356530)
meta_teg($li,$span,$teg_class,$no_data,'Городской телефон','Телефон(86547)',$telefon_cod_svetlograd,'');//вывод номеров телефона
meta_teg($li,$span,$teg_class,$no_data,$name_title,$phone,'','',$on_off);//вывод номеров телефона
meta_teg($li,$span,$teg_class,$no_data,'Факс','факс','','',$on_off);//вывод номеров телефона
meta_teg($li,$span,$teg_class,$no_data,'Факс','факс(86547)',$telefon_cod_svetlograd,'',$on_off);//вывод номеров телефона
meta_teg($li,$span,$teg_class,$no_data,'Руководитель','Руководитель','','');//вывод руководителя
meta_teg($li,$span,$teg_class,$no_data,'Адрес сайта','сайт','','');//вывод адреса сайта
meta_teg($li,$span,$teg_class,$no_data,'E-mail','E-mail');//вывод E-mail
meta_teg($li,$span,$teg_class,$no_data,'Время работы','время работы','','');//вывод E-mail
// meta_teg('div','','yandex-maps','','','yandex.maps',$on_off);//вывод карты яндекса
//meta_teg($li,$span,$teg_class,'Время работы','время работы');//вывод время работы

?>
		</ul>
<?php
yandex_maps_shortcode('yandex-maps');//функция вывода карты из адреса произвольного поля, указываю класс блока, если не указывать, будет просто карта, без блока
?>
	</div>

	<div class="block-2lv single-img">
		<?php the_content(); // контент ?>
			</div>
	</article>
<?php endwhile; // конец цикла ?>
<div class="clearfix div-next-prev">
<?php previous_post_link('%link', '%title', TRUE); // ссылка на предыдущий пост ?>
<?php next_post_link('%link', '%title', TRUE); // ссылка на следующий пост ?>
</div>

	<div class="block-2lv">
		<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
	</div>
</section>
<?php //get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>
