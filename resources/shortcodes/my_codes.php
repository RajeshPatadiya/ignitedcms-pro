<?php 


	include('./resources/shortcodes/shortcodes.php');

	function startsWith($haystack, $needle)
	{
    	// search backwards starting from haystack length characters from the end
    	return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
	}

	function col_func($atts, $content='') 
	{
		
		if (startsWith($content,"[img"))
		{

			preg_match("/'(.*?)'/", $content, $f);

			$content = $f[1];
			$id = random_string('alnum', 16);
			$sd = '[/col]';

		$string ="<div class='col-sm-{$atts['foo']} move' id='$id' mwidth='{$atts['foo']}'> 
			<header class='panel-heading font-bold'> 
				<span style='color:#fff;'>ss</span> 
				<div class='handle fa fa-arrows'></div> 
				<div class='shrink fa fa-minus-square'></div> 
				<div class='grow fa fa-plus-square'></div> 
				<div class='remove fa fa-trash-o'></div>
			</header> 
			<section class='panel'> 
				<div class='panel-body'> 
					<div class='form-group'> 
						<label>Content</label> 
						 <img class='img-responsive' src='$content' alt='image' />

							
						
						<div class='image'></div>
					</div> 
					<div class='shorttag' id='shorttag-$id' style='display:none;'>[col foo='{$atts['foo']}'][img src='$content'][/img]{$sd}</div> 
				<button type='submit' class='btn btn-info btn-s-xs pp-img' mid='$id' mpath='$content'><strong>Save</strong></button> 
				</div> 

			</section>
		 </div>";
		 return $string;
	
		}
		else
		{



		$id = random_string('alnum', 16);
		$sd = '[/col]';

		$string ="<div class='col-sm-{$atts['foo']} move' id='$id' mwidth='{$atts['foo']}'> 
			<header class='panel-heading font-bold'> 
				<span style='color:#fff;'>fds</span> 
				<div class='handle fa fa-arrows'></div> 
				<div class='shrink fa fa-minus-square'></div> 
				<div class='grow fa fa-plus-square'></div> 
				<div class='remove fa fa-trash-o'></div>
			</header> 
			<section class='panel'> 
				<div class='panel-body'> 
					<div class='form-group'> 
						<label>Content</label> 
						<textarea name='content' 
							id='inp-$id' 
							class='form-control' 
							rows='5' 
							data-maxlength='500' 
							data-required='true' 
							placeholder='Type here' 
							data-toggle='tooltip' 
							data-placement='top' 
							title='' 
							data-original-title='content'>$content</textarea> 
					</div> 
					<div class='shorttag' id='shorttag-$id' style='display:none;'>[col foo='{$atts['foo']}']$content{$sd}</div> 
				<button type='submit' class='btn btn-info btn-s-xs pp-text ' mid='$id'><strong>Save</strong></button> 
				</div> 

			</section>
		 </div>";
		 return $string;
		}
	}
	add_shortcode('col', 'col_func');


	function img_func($atts, $content='') 
	{
		
		$id = random_string('alnum', 16);
		$sd = '[/col]';

		$string ="<div class='col-sm-{$atts['foo']} move' id='$id' mwidth='{$atts['foo']}'> 
			<header class='panel-heading font-bold'> 
				<span style='color:#fff;'>ff</span> 
				<div class='handle fa fa-arrows'></div> 
				<div class='shrink fa fa-minus-square'></div> 
				<div class='grow fa fa-plus-square'></div> 
				<div class='remove fa fa-trash-o'></div>
			</header> 
			<section class='panel'> 
				<div class='panel-body'> 
					<div class='form-group'> 
						<label>Content</label> 
						 <img class='img-responsive' src='$content' alt='image' />

							
						
						<div class='image'></div>
					</div> 
					<div class='shorttag' id='shorttag-$id' style='display:none;'>[col foo='{$atts['foo']}'][img src='$content'][/img]{$sd}</div> 
				<button type='submit' class='btn btn-info btn-s-xs pp-img' mid='$id' mpath='$content'><strong>Save</strong></button> 
				</div> 

			</section>
		 </div>";
		 return $string;
	}

	add_shortcode('img', 'img_func');

	



	



		


 ?>