<?php
// A simple function to embed Font^H^HrkAwesome icons on the page
// Simply outputs the appropriate <i> element and assumes you have already linked the css 
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
	return  "<i class=\"fa {$icon}\" aria-hidden=\"true\"></i> ";
}



function smarty_cms_help_function_fa() {
	?>
	<h3>What does this do?</h3>
	<p>
    A simple function to embed FontAwesome icons on the page<br>
    Simply outputs the appropriate <i> element and assumes you have already linked the css<br>
    <br>
    Drafted by Calguy1000 in IRC<br>
    tweaked very slightly by stephen@millipedia.<br>
    <br>
    Use i param for shorthand<br>
    Use icon param for full/spaces<br>
    Examples:<br>
            {fa i=cube}<br>
            {fa icon="fa-cube fa-lg"}<br>
    </p>
	<?php
}