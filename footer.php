<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>

<!-- левая колонка -->
<div class="sidebar">
<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>

<!-- Yandex.Metrika informer --><a href="https://metrika.yandex.ru/stat/?id=34893870&amp;from=informer"target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/34893870/2_0_FFFFFFFF_EFEFEFFF_0_pageviews"style="width:80px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры)" onclick="try{Ya.Metrika.informer({i:this,id:34893870,lang:'ru'});return false}catch(e){}" /></a><!-- /Yandex.Metrika informer --> <!-- Yandex.Metrika counter --><script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter34893870 = new Ya.Metrika({ id:34893870, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="https://mc.yandex.ru/watch/34893870" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</div>
<!-- конец левой колонки -->



	<footer>
		<?php $args = array( // опции для вывода нижнего меню, чтобы они работали, меню должно быть создано в админке
			'theme_location' => 'bottom', // идентификатор меню, определен в register_nav_menus() в function.php
			'container'=> false, // обертка списка, false - это ничего
			'menu_class' => 'bottom-menu', // класс для ul
	  		'menu_id' => 'bottom-nav', // id для ul
	  	);
		//wp_nav_menu($args); // выводим нижние меню
		?>
	</footer>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>

<!-- плавающий фон начало -->
<script language="JavaScript">
  <!--
  var backgroundOffset = 0;
  var bgObject = eval('document.body');
  function scrollBG(maxSize) {
  backgroundOffset = backgroundOffset + 1;
  if (backgroundOffset > maxSize) backgroundOffset = 0;
  bgObject.style.backgroundPosition = "0 " + backgroundOffset;
  }
  var ScrollTimer = window.setInterval("scrollBG(307)", 64);
  // -->
  </script>
<!-- плавающий фон конец -->
</body>
</html>