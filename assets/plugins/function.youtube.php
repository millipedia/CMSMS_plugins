<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#Visit our homepage at: http://www.cmsmadesimple.org
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA


/**
 * Writes out an embed tag for a youtube vid
 */

function smarty_function_youtube($params, &$smarty)
{
    // lets set some defaults.
    if(isset($params['code']) && $params['code']!=''){
        $ytCode=$params['code'];
    }else{
        $ytCode="qb_hqexKkw8"; // you know what.
    }

    if(isset($params['height'])){
        $height=$params['height'];
    }else{
        $height=390;
    }

    if(isset($params['width'])){
        $width=$params['width'];
    }else{
        $width=640;
    }

    if(isset($params['use_cookies']) && $params['use_cookies']){
        $yt_url='https://www.youtube.com';
    }else{
        $yt_url='https://www.youtube-nocookie.com';
    }


    $vidString='<div class="millco-yt embed-responsive embed-responsive-16by9">';

    if(isset($params['playlist'])){

        $vidString.='<iframe width="'.$width.'" height="'. $height .'" src="' . $yt_url . '/embed/?listType=playlist&list=' . $params['playlist'] . '" frameborder="0" allowfullscreen></iframe>';

    }else{

        $vidString.='<iframe width="'.$width.'" height="'. $height .'" src="' . $yt_url . '/embed/' . $ytCode .'?rel=0" frameborder="0" allowfullscreen></iframe>';
    }
    
    $vidString.='</div>'; 

	if( isset($params['assign']) ) {
	    $smarty->assign(trim($params['assign']),$vidString);
	    return;
    }
    return $vidString;
}

function smarty_cms_about_function_youtube() {

?>
	<p>Author: millipedia</p>
	<p>www.millipedia.co.uk</p>

	<p>Change History:</p>
	<ul>
		<li>190710 Defaults to no-cookie domain</li>
	</ul>

<?php

}

function smarty_cms_help_function_youtube() {
	?>
	<h3>What does this do?</h3>
	<p>Adds a YouTube video wrapped in a div using the Bootstrap responsive embed classes (which can of course be added if you're using something other than Bootstrap).</p>
	<h3>How do I use it?</h3>
	<p>Insert the tag into your template/page in the page body like: <code>{youtube code="qb_hqexKkw8"}</code> - where <i>code</i> is the ID of your video from youTube.<br></p>
	<h3>Parameters</h3>
	<ul>
		<li><em>code</em> - the ID of your video from youTube</li>
        <li><em>playlist</em> - the ID of your playlist. You'll want to use either code or playlist or silly things will happen.</li>
        <li><em>height</em> - set a value for the height of your embed iframe if you're not using the responsive layout.</li>
        <li><em>width</em> - set a value for the width of your embed iframe if you're not using the responsive layout.</li>
        <li><em>assign</em> - not sure why you'd want to but you can assign the output to a variable.</li>
        <li><em>use_cookies</em> - set true if you want to use the normal YouTube domain rather than the no-cookie domain.</li>
	</ul>
	<?php
}