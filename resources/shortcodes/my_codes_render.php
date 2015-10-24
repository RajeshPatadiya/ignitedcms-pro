<?php 

 include('./resources/shortcodes/shortcodes.php');

	//for blocks

	function col_func($atts, $content='') 
	{
		return "<div class='col-sm-{$atts['foo']}' style='margin-top:20px;'>".do_shortcode($content)." </div>";

	}
	add_shortcode('col', 'col_func');

	//for images

	function img_func($atts, $content='') 
	{
		return "<img src='{$atts['src']}' class='img-responsive my-center'>";

	}
	add_shortcode('img', 'img_func');

	//for code blocks

	function code_func($atts, $content='') 
	{
		return "<pre> ".($content)." </pre>";

	}
	add_shortcode('code', 'code_func');


 ?> 