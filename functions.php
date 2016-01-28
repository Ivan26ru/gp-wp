<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage your-clean-template
 */

function typical_title() { // функция вывода тайтла
	global $page, $paged; // переменные пагинации должны быть глобыльными
	wp_title('|', true, 'right'); // вывод стандартного заголовка с разделителем "|"
	bloginfo('name'); // вывод названия сайта
	$site_description = get_bloginfo('description', 'display'); // получаем описание сайта
	if ($site_description && (is_home() || is_front_page())) //если описание сайта есть и мы на главной
		echo " | $site_description"; // выводим описание сайта с "|" разделителем
	if ($paged >= 2 || $page >= 2) // если пагинация была использована
		echo ' | '.sprintf(__( 'Страница %s'), max($paged, $page)); // покажем номер страницы с "|" разделителем
}

register_nav_menus(array( // Регистрируем 3 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Внизу', // Внизу
	'mesta' => 'Места' // Внизу
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'Колонка слева', // Название в админке
	'id' => "left-sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Обычная колонка в сайдбаре', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

register_sidebar(array( // регистрируем левую колонку, этот кусок можно повторять для добавления новых областей для виджитов
	'name' => 'верхняя строчка', // Название в админке
	'id' => "top-sidebar", // идентификатор для вызова в шаблонах
	'description' => 'Верхняя строка сайдбар', // Описалово в админке
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // разметка до вывода каждого виджета
	'after_widget' => "</div>\n", // разметка после вывода каждого виджета
	'before_title' => '<span class="widgettitle">', //  разметка до вывода заголовка виджета
	'after_title' => "</span>\n", //  разметка после вывода заголовка виджета
));

class clean_comments_constructor extends Walker_Comment { // класс, который собирает всю структуру комментов
	public function start_lvl( &$output, $depth = 0, $args = array()) { // что выводим перед дочерними комментариями
		$output .= '<ul class="children">' . "\n";
	}
	public function end_lvl( &$output, $depth = 0, $args = array()) { // что выводим после дочерних комментариев
		$output .= "</ul><!-- .children -->\n";
	}
    protected function comment( $comment, $depth, $args ) { // разметка каждого комментария, без закрывающего </li>!
    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // берем стандартные классы комментария и если коммент пренадлежит автору поста добавляем класс author-comment
        echo '<li id="li-comment-'.get_comment_ID().'" class="'.$classes.'">'."\n"; // родительский тэг комментария с классами выше и уникальным id
    	echo '<div id="comment-'.get_comment_ID().'">'."\n"; // элемент с таким id нужен для якорных ссылок на коммент
    	echo get_avatar($comment, 64)."\n"; // покажем аватар с размером 64х64
    	echo '<p class="meta">Автор: '.get_comment_author()."\n"; // имя автора коммента
    	//echo ' '.get_comment_author_email(); // email автора коммента
    	echo ' '.get_comment_author_url(); // url автора коммента
    	echo ' <br>Добавлено '.get_comment_date('F j, Y').' в '.get_comment_time()."\n"; // дата и время комментирования
    	if ( '0' == $comment->comment_approved ) echo '<em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n"; // если комментарий должен пройти проверку
        comment_text()."\n"; // текст коммента
        $reply_link_args = array( // опции ссылки "ответить"
        	'depth' => $depth, // текущая вложенность
        	'reply_text' => 'Ответить', // текст
			'login_text' => 'Вы должны быть залогинены' // текст если юзер должен залогинеться
        );
        echo get_comment_reply_link(array_merge($args, $reply_link_args)); // выводим ссылку ответить
        echo '</div>'."\n"; // закрываем див
    }
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // конец каждого коммента
		$output .= "</li><!-- #comment-## -->\n";
	}
}

function pagination() { // функция вывода пагинации
	global $wp_query; // текущая выборка должна быть глобальной
	$big = 999999999; // число для замены
	echo paginate_links(array( // вывод пагинации с опциями ниже
		'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // что заменяем в формате ниже
		'format' => '?paged=%#%', // формат, %#% будет заменено
		'current' => max(1, get_query_var('paged')), // текущая страница, 1, если $_GET['page'] не определено
		'type' => 'list', // ссылки в ul
		'prev_text'    => 'Назад', // текст назад
    	'next_text'    => 'Вперед', // текст вперед
		'total' => $wp_query->max_num_pages, // общие кол-во страниц в пагинации
		'show_all'     => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
		'end_size'     => 15, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
		'mid_size'     => 15, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
		'add_args'     => false, // массив GET параметров для добавления в ссылку страницы
		'add_fragment' => '',	// строка для добавления в конец ссылки на страницу
		'before_page_number' => '', // строка перед цифрой
		'after_page_number' => '' // строка после цифры
	));
}

function meta_arr($meta_name){ //Функция для вывода массива по ключу произвольных полей
	$meta_arr_name = get_post_custom_values($meta_name); //получаем массив введенного ключа произвольного поля
	return $meta_arr_name; //выводим результат
}

			$telefon_cod_svetlograd = '8 (86547) ';//вывод телефонного кода
			$adres_svetlograd_little = 'г.Светлоград, ';//вывод адреса Светлограда только город
			$adres_svetlograd = 'Ставропольский край, Петровский район, г.Светлоград, ';//вывод адреса Светлограда полностью

	function meta_teg(//функция выбора всех значений метатегов по названию и помещение их в определенный список. переменные:
						$teg,	// $teg тег в которые будет помещено значение,
						$teg_title,		// $teg_title оборачивающий тег title,
						$teg_class,		//$teg_class какой класс будет у тега $teg
						$no_data,	// $no_data что выводится, если данных нет,
						$title,		// $title название категории,
						$name,	// $name значение категории.
						$prev_name, // $prev_name что будет выподиться перед значением
						$next_name, // $next_name что будет выподиться после значения
						$on_off){	//$on_off если поставить любое значение, то при отсутствии данных будет выводиться подобное Телефон: нет данных, если это не нужно можно оставить пустым либо вообще ни чего не вводить
		//должно получиться подобное <li class="$teg_class"><span>Телефон:</span> текст ПЕРЕД текстом 777 текст ПОСЛЕ текста</li>


			$arr = meta_arr($name); //переменная с массивом из названия ключа
			$count_arr = count($arr);//количество элементов в массиве
			if($count_arr > 0 ) { //условие, если массив не пустой выполняется действие
				for ($i=0; $i<$count_arr; $i++){//цикл перебирает все значения массива
					switch ($name) { //условие проверки категории и вывод соответствующей статьи
						case 'сайт'://если сайт
							echo '<' . $teg . ' class = "'. $teg_class .'"><' . $teg_title . '>' . $title . ': </'. $teg_title . '><a href="http://' . $arr[$i] . '">' . $arr[$i] .'</a></' . $teg . '>';
							break;

						case 'E-mail'://если мыло
							echo '<' . $teg . ' class = "'. $teg_class .'"><' . $teg_title . '>' . $title . ': </'. $teg_title . '><a href="mailto:' . $arr[$i] . '">' . $arr[$i] .'</a></' . $teg . '>';
							break;

						// case 'Телефон(86547)'://если телефон в городе с кодом 8(86547)
						// 	echo '<' . $teg . ' class = "'. $teg_class .'"><' . $teg_title . '>' . $title . ': </'. $teg_title . '>' . $telefon_cod . $arr[$i] . '</' . $teg . '>';
						// 	break;

						// case 'Адрес(Светлоград)'://если телефон в городе с кодом 8(86547)
						// 	echo '<' . $teg . ' class = "'. $teg_class .'"><' . $teg_title . '>' . $title . ': </'. $teg_title . '>' . $adres_svetlograd . $arr[$i] . '</' . $teg . '>';
						// 	break;

						case 'yandex.maps'://если скрипт карты(не актуально но для резерва оставлю) P.S. использую плагин из yandex сделал функцию выводящую карту по данным произвольного поля
							echo '<' . $teg . ' class = "'. $teg_class .'">' . $arr[$i] . '</' . $teg . '>';//вывод карты яндекса
							break;

						default://если ни чего не подошло(стандартная запись)
							echo '<' . $teg . ' class = "'. $teg_class .'"><' . $teg_title . '>' . $title . ': </'. $teg_title . '>' . $prev_name . $arr[$i] . $next_name . '</' . $teg . '>';
							break;
					}//конец switch
				}//цикл перебора
			}elseif ($name =='Почтовый индекс') {
							echo '<' . $teg . ' class = "'. $teg_class .'"><' . $teg_title . '>' . $title . ': </'. $teg_title . '>' . '356530' . '</' . $teg . '>';
			}elseif(!$on_off){//если массив пустой
				echo '<' . $teg . ' class = "'. $teg_class .'"><' . $teg_title . '>' . $title . ': </'. $teg_title . '>' . $no_data . '</' . $teg . '>';//значение выводимое при отсутствии данных
			}//условие перебора конец
	}//конец фунуции вывода произвольных полей

	function yandex_maps_shortcode($div_class){//функция вывода яндекс карты берет адрес из произвольного поля Адрес(Светлоград) и вставляет его в шорткод из плагина oi-yamaps.zip
		$adres_map ='';//полный адрес
		$adres_svetlograd = 'Ставропольский край, Петровский район, г.Светлоград, ';//адрес до г.Светлограда
		$adres_svetlograd_this_arr = meta_arr('Адрес(Светлоград)');//текущий массив адресов
		$adres_svetlograd_this = $adres_svetlograd_this_arr[0];//текущий массив адреса
		$adres_map = $adres_svetlograd . $adres_svetlograd_this;//склеивание полного адреса

		$maps_shortcode = do_shortcode('[showyamap][placemark address="' . $adres_map . '"][/showyamap]'); //код вывода шорткода с местом взятым из произвольного поля
		if ($adres_svetlograd_this) {//условие проверки есть ли произвольное поле адреса или нет для этого поста, если нет, то ничего не выполняется

			if($div_class){//условие если переменную для функции назначили тогда
				echo '<div class="' . $div_class . '">' . $maps_shortcode . '</div>';//оборачиваем карту в блок div и задаем ему класс согласно переменной
			}else {//если для функции данные не передавались выполняется
				echo $maps_shortcode;//просто выводится карта без блока
			}//конец условия по назначению блока и класса
		}//конец условия проверки введения адреса

	}//конец функции вывода карты

function yandex_maps_shortcode_all(){//функция вывода МЕТОК яндекс карты берет адрес из произвольного поля Адрес(Светлоград) и вставляет его в шорткод из плагина oi-yamaps.zip
		$adres_map ='';//полный адрес
		$adres_svetlograd = 'Ставропольский край, Петровский район, г.Светлоград, ';//адрес до г.Светлограда
		$adres_svetlograd_this_arr = meta_arr('Адрес(Светлоград)');//текущий массив адресов
		$adres_svetlograd_this = $adres_svetlograd_this_arr[0];//текущий массив адреса
		$adres_map = $adres_svetlograd . $adres_svetlograd_this;//склеивание полного адреса

		$maps_shortcode = '[placemark address="' . $adres_map . '"]'; //код вывода шорткода с местом взятым из произвольного поля
		echo $adres_map;
	}//конец функции вывода МЕТОК карты


//обрезание описания рубрик и меток в админке сайта start
function wph_trim_cats() {
    add_filter('get_terms', 'wph_truncate_cats_description', 10, 2);
}
function wph_truncate_cats_description($terms, $taxonomies) {
    if('category' != $taxonomies[0] and 'post_tag' != $taxonomies[0])
        return $terms;
    foreach($terms as $key=>$term) {
        $terms[$key]->description = mb_substr($term->description, 0, 80);
        if($terms[$key]->description != '') {
            $terms[$key]->description .= '...';
        }
    }
    return $terms;
}
add_action('admin_head-edit-tags.php', 'wph_trim_cats');
//обрезание описания рубрик и меток в админке сайта end

function more_posts() {
  global $wp_query;
  return $wp_query->current_post + 1 < $wp_query->post_count;
};

//НИ В КОЕМ СЛУЧАЕ НЕ ОСТАВЛЯТЬ ПУСТЫХ СТРОК ПОСЛЕ СИМВОЛА КОНЦА СТРОК
?>