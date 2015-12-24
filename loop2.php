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
$teg_class = 'hobbi';
$name_title = 'Телефон';//какого рода значение
$phone = 'Телефон';//задаем переменную

meta_teg($li,$span,$teg_class,'Адрес','Адрес');//вывод адреса работы
meta_teg($li,$span,$teg_class,$name_title,$phone);//вывод номеров телефона
//meta_teg($li,$span,$teg_class,'Время работы','время работы');//вывод время работы

?>
		</ul>



<?php //$phone = get_post_custom_values('phone');?>

<?php //the_meta(); ?>
<!-- Телефон: <?php echo $phone[0];?><br /> -->

		</div>
	</article>