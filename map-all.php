<?php
/**
 * Запись в цикле(вывод всех меток для карты) (map-all.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	<div>

		<!-- <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> -->

		<?php
			$adress_svetl = get_post_custom_values('Адрес(Светлоград)');
			$arr_adress_svetl = $adress_svetl[0];
			echo [placemark address="' . $arr_adress_svetl . '"];
		?>
		<?php //$phone = get_post_custom_values('phone');?>
		<?php //the_meta(); ?>
		<!-- Телефон: <?php echo $phone[0];?><br /> -->
	</div>