<?php
/*  * smarty_function_socmed
 * 
 * Generates share links and writes out inline svg icons for fb / twitter and linkedin 
 * 
 * @Author: stephen@millipedia.com 
 * @Date: 2019-07-18 12:56:22 
 * @Last Modified by: Stephen
 * @Last Modified time: 2019-07-18 12:56:59
 */


function smarty_function_socmed($params, &$smarty) {

    $url = get_parameter_value($params,'url');
    $url_escaped=urlencode($url);

    $status=get_parameter_value($params,'status');
    $status_escaped=urlencode($status);

     if(isset($params['fill'])){
        $fill='fill="' . get_parameter_value($params,'fill') .'"';
    }else{
        $fill='fill="#333;"';
    }
    
    if(isset($params['nostyle']) && $params['nostyle']){
        
        $style='';

    }else{ // some default styles

        $style="display: inline-block; padding: 5px; height: 44px; width: 44px; border-radius: 19px;margin: 5px 2px 5px 0;";

    }

    
    $output='';
   
    $output.='<div class="socmed">';
    
    $output.='<a class="socmed-icon socmed-fb" href="http://www.facebook.com/sharer.php?u=' . $url_escaped . '" style="'. $style . '" aria-label="Share on Facebook">
    <svg viewBox="0 0 471 471" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M271.521 154.17v-40.541c0-6.086.28-10.8.849-14.13.567-3.335 1.857-6.615 3.859-9.853 1.999-3.236 5.236-5.47 9.706-6.708 4.476-1.24 10.424-1.858 17.85-1.858h40.539V0h-64.809c-37.5 0-64.433 8.897-80.803 26.691-16.368 17.798-24.551 44.014-24.551 78.658v48.82h-48.542v81.086h48.539v235.256h97.362V235.256h64.805l8.566-81.086h-73.37z" class="socmed-fill" ' . $fill .' fill-rule="nonzero"/></svg>
    </a>';
    
     $output.='    
        <a class="socmed-icon socmed-twit" href="https://twitter.com/intent/tweet?url=' . $url_escaped . '&status='.$status_escaped . ' ' . $url_escaped . '"  style="'. $style . '" aria-label="Share on Twitter"><svg viewBox="0 0 450 450" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><path d="M449.956 85.657c-17.702 7.614-35.408 12.369-53.102 14.279 19.985-11.991 33.503-28.931 40.546-50.819-18.281 10.847-37.787 18.268-58.532 22.267-18.274-19.414-40.73-29.125-67.383-29.125-25.502 0-47.246 8.992-65.24 26.98-17.984 17.987-26.977 39.731-26.977 65.235 0 6.851.76 13.896 2.284 21.128-37.688-1.903-73.042-11.372-106.068-28.407C82.46 110.158 54.433 87.46 31.403 59.101c-8.375 14.272-12.564 29.787-12.564 46.536 0 15.798 3.711 30.456 11.138 43.97 7.422 13.512 17.417 24.455 29.98 32.831-14.849-.572-28.743-4.475-41.684-11.708v1.142c0 22.271 6.995 41.824 20.983 58.674 13.99 16.848 31.645 27.453 52.961 31.833a95.543 95.543 0 0 1-24.269 3.138c-5.33 0-11.136-.475-17.416-1.42 5.9 18.459 16.75 33.633 32.546 45.535 15.799 11.896 33.691 18.028 53.677 18.418-33.498 26.262-71.66 39.393-114.486 39.393-8.186 0-15.607-.373-22.27-1.139 42.827 27.596 90.03 41.394 141.612 41.394 32.738 0 63.478-5.181 92.21-15.557 28.746-10.369 53.297-24.267 73.665-41.686 20.362-17.415 37.925-37.448 52.674-60.097 14.75-22.651 25.738-46.298 32.977-70.946 7.23-24.653 10.848-49.344 10.848-74.092 0-5.33-.096-9.325-.287-11.991 18.087-13.127 33.504-29.023 46.258-47.672z" class="socmed-fill" ' . $fill .' fill-rule="nonzero"/></svg></a>';

        $output.='  
        <a class="socmed-icon socmed-li" href="https://www.linkedin.com/shareArticle?mini=true&url=' . $url_escaped . '&title=' . $status_escaped . '&summary=&source="  style="'. $style . '" aria-label="Share on LinkedIn"><svg viewBox="0 0 439 439" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="1.414"><g class="socmed-fill" ' . $fill .'><path d="M5.424 145.895H99.64v282.932H5.424z"/><path d="M408.842 171.739c-19.791-21.604-45.967-32.408-78.512-32.408-11.991 0-22.891 1.475-32.695 4.427-9.801 2.95-18.079 7.089-24.838 12.419-6.755 5.33-12.135 10.278-16.129 14.844-3.798 4.337-7.512 9.389-11.136 15.104v-40.232h-93.935l.288 13.706c.193 9.139.288 37.307.288 84.508 0 47.205-.19 108.777-.572 184.722h93.931V270.942c0-9.705 1.041-17.412 3.139-23.127 4-9.712 10.037-17.843 18.131-24.407 8.093-6.572 18.13-9.855 30.125-9.855 16.364 0 28.407 5.662 36.117 16.987 7.707 11.324 11.561 26.98 11.561 46.966V428.82h93.931V266.664c-.007-41.688-9.897-73.328-29.694-94.925zM53.103 9.708c-15.796 0-28.595 4.619-38.4 13.848C4.899 32.787 0 44.441 0 58.529 0 72.42 4.758 84.034 14.275 93.358c9.514 9.325 22.078 13.99 37.685 13.99h.571c15.99 0 28.887-4.661 38.688-13.99 9.801-9.324 14.606-20.934 14.417-34.829-.19-14.087-5.047-25.742-14.561-34.973C81.562 14.323 68.9 9.708 53.103 9.708z" fill-rule="nonzero"/></g></svg></a>  ';

    $output.='</div>';

	return  $output;
}



function smarty_cms_help_function_socmed() {
	?>
	<h3>What does this do?</h3>
	<p>
        Writes out share icons and links for Facebook, Twitter and LinkedIn.
    
    </p>
    <p>
        Most commonly you want to pass the current url of your page and title.<br>
        You can use cms_self link to get the current url so adding the following tags to your template is a good start: <br><br>

        {cms_selflink href=$page_alias assign=currenturl scope=global}<br>
        {socmed url=currenturl status= {title} }
        
    </p>

    <h3>Parameters</h3>
	<ul>
		<li><em>url</em> - the URL of the page you want to include. This is normally the page you're on. We </li>
        <li><em>status</em> - the text to include in the share link</li>
        <li><em>nostyle</em> - the tag will apply some defaults for styling. They're a bit dull so you'll probably want to add your own in a stylesheet and then use <em>nostyle=1</em> to switch off the embedded styles</li>
        <li><em>fill</em> - a hex value for the colour of your icon. You can of course set your fill colour in a stylesheet.</li>
    </ul>

    <h3>Styles</h3>
    <p>Use your browser developer tools to see the available classes, but the following CSS will get you started:<br></p>
<pre>
.socmed-icon {
    display: inline-block;
    padding: 5px;
    height: 44px;
    width: 44px;
    margin: 5px 2px 5px 0;
}

.socmed-fill{
    fill:pink;
}

.socmed-icon:hover .socmed-fill{
    fill:blue;
}
</pre>
	<?php
}