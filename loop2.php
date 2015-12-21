<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span> <?php // заголовок поста и ссылка на его полное отображение (single.php) ?>
		<div class="meta">
<?php the_meta(); ?>
			<?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
		</div>
		<?php if ( has_post_thumbnail() ) the_post_thumbnail(); // выводим миниатюру поста, если есть ?>
		<?php the_content(''); // пост превью, до more ?>
	</article>