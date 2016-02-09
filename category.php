<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<section>
	<h1 class="category-h1"><?php wp_title(''); // Заголовок категории ?></h1>
	<?php $category_description = category_description();//выводит описание рублики
if ( ! empty( $category_description ) )//есть описание
echo '<div class="archive-meta">' . $category_description . '</div>';//вставляет описание в тег arhive-meta ?>

<!-- ВСТАВКА КАРТЫ С ОТМЕТКАМИ ВСЕХ МЕСТ -->
<!-- <div class="yandex-maps">

<?php //do_shortcode('') ?>

</div> -->

<!-- КОНЕЦ ВСТАВКИ КАРТЫ С ОТМЕТКАМИ ВСЕХ МЕСТ -->


<!-- ПОСТЫ -->
	<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
	<?php if (is_category('ads')) {
		get_template_part('loop-ads');
	}else{ get_template_part('loop2');} // для отображения каждой записи берем шаблон loop2.php ?>
	<?php endwhile; // конец цикла
	else: echo '<h2>Нет записей.</h2>';endif; // если записей нет, напишим "простите" ?>
	<?php pagination(); // пагинация, функция нах-ся в function.php ?>
<!-- КОНЕЦ ПОСТОВ -->

</section>

<?php get_footer(); // подключаем footer.php ?>