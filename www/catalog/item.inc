<?php
	if ($item_info['image'] != '') echo '<a href="' . $module->DATA_URL . '/items/' . $item_info['image'] . '" rel="lightbox"><img src="' . $module->DATA_URL . '/items/s_' . $item_info['image'] . '" alt="" class="image-block"/></a>';
	if ($item_info['text'] != '') echo '<p>' . $item_info['text'] . '</p>';
	if ($item_info['file'] != '') echo '<p><a href="' . $module->DATA_URL . '/items/' . $item_info['file'] . '">Скачать</a></p>';
	if ($item_info['url'] != '') echo '<p><a href="' . $item_info['url'] . '">' . $item_info['url'] . '</a></p>';
	if ($item_info['email'] != '') echo '<p><a href="' . $item_info['email'] . '">' . $item_info['email'] . '</a></p>';
	if ($item_info['date'] != '0000-00-00') echo '<p>' . strftime('%d.%m.%Y', strtotime($item_info['date'])) . '</p>';
?>