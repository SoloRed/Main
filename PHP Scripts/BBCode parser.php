<?php
/**
*****************************************************************
* Проста PHP BBCode анализираща функция с лесен начин на промяна.
*
* @category   PHP
* @package    BBCode Parser
* @author     Кристиан 'SoloRed' Петров; <witchycz@icloud.com>
* @copyright  2018 SoloRed
* @license    GNU General Public License v3.0
* @version    1.2
* @link       https://github.com/SoloRed
*****************************************************************
**/

function BBCodeParser($text) {

	// Масив съдържащ стандартните BBCode
	$BBCodes = array(
		'~\[b\](.*?)\[/b\]~s',
		'~\[i\](.*?)\[/i\]~s',
		'~\[u\](.*?)\[/u\]~s',
		'~\[quote\](.*?)\[/quote\]~s',
		'~\[size=(.*?)\](.*?)\[/size\]~s',
		'~\[color=(.*?)\](.*?)\[/color\]~s',
		'~\[url\]((?:ftp|http|https?)://.*?)\[/url\]~s',
    '~\[attachment=(.*?)\](.*?)\[/attachment\]~s',
		'~\[img\](http|https|ftp?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s'
	);

	// HTML тагове заменящи BBCode-овете
	$HTMLTags = array(
		'<b>$1</b>',
		'<i>$1</i>',
		'<span style="text-decoration:underline;">$1</span>',
		'<pre>$1</'.'pre>',
		'<span style="font-size:$1px;">$2</span>',
		'<span style="color:$1;">$2</span>',
		'<a href="$1">$1</a>',
    '<img src="$1" />',
		'<img src="$1" alt="" />'
	);

	// Подмяна на BBCode-овете със съответните HTML тагове
	return preg_replace($BBCodes,$HTMLTags,$text);
}
