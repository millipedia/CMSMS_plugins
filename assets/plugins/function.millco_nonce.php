<?php

/*
Return a nonce we can use in CSP header and then
related script $tags
*/

function smarty_function_millco_nonce($params, &$smarty) {

	$nonce = base64_encode(random_bytes(20));

	if( isset($params['assign']) ){

			$smarty->assign(trim($params['assign']),$nonce);
			return;

	}else{

		return $nonce;

	}

}

function smarty_cms_about_function_millco_nonce() {
?>
	<p>Author: millipedia</p>
	<p><a href="https://www.millipedia.co.uk/">www.millipedia.co.uk</a></p>

	<p>Change History:</p>
	<ul>
		<li>1.0 - initial commit. </li>
	</ul>
<?php
}


function smarty_cms_help_function_millco_nonce() {
	?>
	<h3>What does this do?</h3>
	<p>Just generates a nonce you can use as part of your CSP for inline javascript.</p>
	<h3>How do I use it?</h3>
	<p>Generate the nonce at the start of your template with global scope and then you can add it to both your CSP rules and any inline scripts you add.</p>
	<p>There's a more detailed explanation <a href="https://www.millipedia.co.uk/2018/01/Adding-a-Content-Security-Policy-in-CMSMS.html">over in this blog post</a>.
	<?php
}