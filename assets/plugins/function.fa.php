<?php
// A simple function to embed Font^H^HrkAwesome icons on the page
// Simply outputs the appropriate <i> element and assumes you have already inluded / linked the css 
//
// Drafted by Calguy1000 in IRC
// tweaked very slightly by stephen@millipedia.
// Place in /assets/plugins/function.fa.php
// Use i param for shorthand
// Use icon param for full/spaces
// Examples:  
//		{fa i=cube}
//		{fa icon="fa-cube fa-lg"}

function smarty_function_fa($params, &$smarty) {
	$icon = get_parameter_value($params,'i');
	$icon = get_parameter_value($params,'icon',"fa-".$icon);
	return  "<i class=\"fa {$icon}\"  aria-hidden=\"true\"></i> ";
}
