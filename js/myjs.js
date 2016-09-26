jQuery(document).ready(function(){
// alert(jQuery.fn.jquery); //проверка верии jq, заодно и проверка подключения библиотеки
// создаем переменные
	var block_click = jQuery('.block_click');//элемент на который будем нажимать для перехода
		var attr_a = jQuery(this).find('.block_click_a');//поиск помеченного элемента классом .block_click_a
		var attr_a_href = attr_a.attr('href');//вытаскиваем ссылку

	block_click.hover(function(){//две функции при наводе и уводе с элемента
			jQuery(this).find('.block_click_a').addClass('hover_a');//добавляем класс

		}, function(){//при уводе с элемента
			jQuery(this).find('.block_click_a').removeClass('hover_a');//убираем класс

		}).click(function(e){//функция клил по тегу article
			var attr_a = jQuery(this).find('.block_click_a');//поиск помеченного элемента классом .block_click_a
			var attr_a_href = attr_a.attr('href');//вытаскиваем ссылку
			window.location = attr_a_href;//переходим по сссылке
		// alert('ссылка на рублику' + attr_a);
	});
});//Конец ready