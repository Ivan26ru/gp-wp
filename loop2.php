<?php
/**
 * Запись в цикле (loop2.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix category'); ?>> <?php // контэйнер с классами и id ?>
		<div class="category-img">
			<?php if ( has_post_thumbnail() ) the_post_thumbnail(); // выводим миниатюру поста, если есть ?>
		</div>

		<span class="category-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span> 	<?php // заголовок поста и ссылка на его полное отображение (single.php) ?>

		<div class="category-meta">
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

meta_teg($li,$span,$teg_class,$no_data,'Адрес','Адрес(Светлоград)','г.Светлоград, ','',$on_off);//вывод адреса работы
meta_teg($li,$span,$teg_class,$no_data,'Адрес','Адрес','','',$on_off);//вывод адреса работы
meta_teg($li,$span,$teg_class,$no_data,'Телефон','Телефон(86547)','8 (86547) ','',$on_off);//вывод номеров телефона городских
meta_teg($li,$span,$teg_class,$no_data,$name_title,$phone,'','',$on_off);//вывод номеров телефона

//meta_teg($li,$span,$teg_class,'Время работы','время работы');//вывод время работы
?>
		</ul>



<?php //$phone = get_post_custom_values('phone');?>

<?php //the_meta(); ?>
<!-- Телефон: <?php echo $phone[0];?><br /> -->

		</div>
	</article>