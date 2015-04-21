<?php
/* 
* +--------------------------------------------------------------------------+
* | Copyright (c) ShemOtechnik Profitquery Team shemotechnik@profitquery.com |
* +--------------------------------------------------------------------------+
* | This program is free software; you can redistribute it and/or modify     |
* | it under the terms of the GNU General Public License as published by     |
* | the Free Software Foundation; either version 2 of the License, or        |
* | (at your option) any later version.                                      |
* |                                                                          |
* | This program is distributed in the hope that it will be useful,          |
* | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
* | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
* | GNU General Public License for more details.                             |
* |                                                                          |
* | You should have received a copy of the GNU General Public License        |
* | along with this program; if not, write to the Free Software              |
* | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA |
* +--------------------------------------------------------------------------+
*/
/**
* Plugin Name: Share + Subscribe + Contact | AIO Widget
* Plugin URI: http://profitquery.com/aio_widgets.html
* Description: All in one widgets for any website to get more shares, email subscribers, contact information, followers in social network and all fo free.
* Version: 1.1.12
*
* Author: Profitquery Team <support@profitquery.com>
* Author URI: http://profitquery.com/?utm_campaign=aio_widgets_wp
*/


$profitquery = get_option('profitquery');

if (!defined('PROFITQUERY_SMART_WIDGETS_PLUGIN_NAME'))
	define('PROFITQUERY_SMART_WIDGETS_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('PROFITQUERY_SMART_WIDGETS_PAGE_NAME'))
	define('PROFITQUERY_SMART_WIDGETS_PAGE_NAME', 'free_profitquery_aio_widgets');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_CSS_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_CSS_PATH', 'css/');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_JS_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_JS_PATH', 'js/');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PATH', 'images/');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PREVIEW_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PREVIEW_PATH', 'preview/');

$pathParts = pathinfo(__FILE__);
$path = $pathParts['dirname'];

if (!defined('PROFITQUERY_SMART_WIDGETS_FILENAME'))
	define('PROFITQUERY_SMART_WIDGETS_FILENAME', $path.'/free_profitquery_aio_widgets.php');


require_once 'free_profitquery_aio_widgets_class.php';
new ProfitQuerySmartWidgetsClass();

add_action('init', 'profitquery_smart_widgets_init');



function profitquery_smart_widgets_init(){
	global $profitquery;	
	if ( !is_admin() && $profitquery[apiKey] && !$profitquery['errorApiKey']){
		wp_register_script('lite_profitquery_lib', plugins_url().'/'.PROFITQUERY_SMART_WIDGETS_PLUGIN_NAME.'/js/lite.profitquery.min.js?apiKey='.$profitquery[apiKey]);		
		wp_enqueue_script('lite_profitquery_lib');		
		add_action('wp_footer', 'profitquery_smart_widgets_insert_code');
	}
}

function printr($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

/* Adding action links on plugin list*/
function profitquery_wordpress_admin_link($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="options-general.php?page=free_profitquery_aio_widgets">Settings</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}


//check subsccribe enabled
function profitquery_is_subscribe_enabled($profitquery){	
	$return = false;
	if((int)$profitquery[subscribeBar][disabled] == 0 || (int)$profitquery[subscribeExit][disabled] == 0){
		$return = true;
	}
	return $return;
}

function profitquery_is_follow_enabled_and_not_setup($profitquery){
	$return = false;
	$ifSetFollowAfterProceed = false;
	$isFollowSocnetSetuped = false;
	if((int)$profitquery[contactUs][disabled] == 0 && (int)$profitquery[contactUs][afterProceed][follow] == 1){
		$ifSetFollowAfterProceed = true;
	}
	if((int)$profitquery[callMe][disabled] == 0 && (int)$profitquery[callMe][afterProceed][follow] == 1){
		$ifSetFollowAfterProceed = true;
	}
	if((int)$profitquery[subscribeExit][disabled] == 0 && (int)$profitquery[subscribeExit][afterProceed][follow] == 1){
		$ifSetFollowAfterProceed = true;
	}
	if((int)$profitquery[subscribeBar][disabled] == 0 && (int)$profitquery[subscribeBar][afterProceed][follow] == 1){
		$ifSetFollowAfterProceed = true;
	}
	if((int)$profitquery[sharingSideBar][disabled] == 0 && (int)$profitquery[sharingSideBar][afterProceed][follow] == 1){
		$ifSetFollowAfterProceed = true;
	}
	if((int)$profitquery[imageSharer][disabled] == 0 && (int)$profitquery[imageSharer][afterProceed][follow] == 1){
		$ifSetFollowAfterProceed = true;
	}
	
	if($ifSetFollowAfterProceed){
		foreach((array)$profitquery[follow][follow_socnet] as $soc_id => $v){
			if($v){
				$isFollowSocnetSetuped = true;
			}
		}
		if(!$isFollowSocnetSetuped){
			$return = true;
		}
	}
		
	return $return;	
}


//Prepare output sctructure
function profitquery_prepare_sctructure_product($data){	
	$return = $data;	
	//After Proceed		
	if(isset($data[afterProceed])){		
		unset($return[afterProceed]);
		if((int)$data[afterProceed][follow] == 1 || (int)$data[afterProceed][thank] == 1){
			if((int)$data[afterProceed][follow] == 1){
				$return[afterProceed] = 'follow';
			}
			if((int)$data[afterProceed][thank] == 1){
				$return[afterProceed] = 'thank';
			}
		} else {
			$return[afterProceed] = '';
		}
	}
	//socnet
	if(isset($data[socnet])){
		unset($return[socnet]);
		foreach((array)$data[socnet] as $k => $v){
			if($v){
				$return[socnet][$k] = $v;
			}
		}
		
	}
	
	//socnet
	if(isset($data[follow_socnet])){
		unset($return[follow_socnet]);
		foreach((array)$data[follow_socnet] as $k => $v){
			if($v){
				if($k == 'FB') $return[follow_socnet][$k][url] = 'https://facebook.com/'.$v;
				if($k == 'TW') $return[follow_socnet][$k][url] = 'https://twitter.com/'.$v;
				if($k == 'GP') $return[follow_socnet][$k][url] = 'https://plus.google.com/'.$v;
				if($k == 'PI') $return[follow_socnet][$k][url] = 'https://pinterest.com/'.$v;
				if($k == 'VK') $return[follow_socnet][$k][url] = 'https://vk.com/'.$v;
				if($k == 'OD') $return[follow_socnet][$k][url] = 'https://ok.ru/'.$v;				
			}
		}
		
	}
	
	//img imgUrl
	if(isset($data[img]) || isset($data[imgUrl])){
		unset($return[img]);
		unset($return[imgUrl]);
		if($data[img] == 'custom' && $data[imgUrl]){
			$return[img] = $data[imgUrl];
		}elseif($data[img] != 'custom' && $data[img] != ''){
			$return[img] = plugins_url('images/'.$data[img], __FILE__);;
		} else {
			$return[img] = '';
		}
	}
	
	//design
	if(isset($data[design])){
		unset($return[design]);
		if($data[design][form] == 'square') $data[design][form]='';
		$return[design] = $data[design][size].$data[design][form]." ".$data[design][color]." ".$data[design][shadow];
	}
	
	return $return;
}

$preparedObject = profitquery_prepare_sctructure_product($profitquery[sharingSideBar]);
//printr($preparedObject);
//die();

function profitquery_smart_widgets_insert_code(){
	global $profitquery;	
	
	
	$profitquerySmartWidgetsStructure = array();
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[sharingSideBar]);
	$preparedObject[socnet][typeBlock] = 'pq-social-block '.$preparedObject[design];
	$profitquerySmartWidgetsStructure['sharingSideBarOptions'] = array(
		'typeWindow'=>'pq_icons '.$preparedObject[position],
		'socnetIconsBlock'=>$preparedObject[socnet],
		'disabled'=>(int)$preparedObject[disabled],
		'afterProfitLoader'=>$preparedObject[afterProceed]
	);
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[imageSharer]);
	$profitquerySmartWidgetsStructure['imageSharer'] = array(
		'typeDesign'=>$preparedObject[design].' '.$preparedObject[position],
		'minWidth'=>(int)$preparedObject[minWidth],
		'disabled'=>(int)$preparedObject[disabled],
		'activeSocnet'=>$preparedObject[socnet],
		'afterProfitLoader'=>stripslashes($preparedObject[afterProceed])
	);	
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[subscribeBar]);
	$profitquerySmartWidgetsStructure['subscribeBarOptions'] = array(
		'title'=>stripslashes($preparedObject[title]),		
		'disabled'=>(int)$preparedObject[disabled],
		'afterProfitLoader'=>$preparedObject[afterProceed],
		'typeWindow'=>'pq_bar '.stripslashes($preparedObject[position]).' '.stripslashes($preparedObject[background]).' '.stripslashes($preparedObject[button_color]),
		'inputEmailTitle'=>stripslashes($preparedObject[inputEmailTitle]),
		'buttonTitle'=>stripslashes($preparedObject[buttonTitle]),
		'formAction'=>stripslashes($profitquery[subscribeProviderUrl])
	);
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[subscribeExit]);
	$profitquerySmartWidgetsStructure['subscribeExitPopupOptions'] = array(
		'title'=>stripslashes($preparedObject[title]),
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'img'=>stripslashes($preparedObject[img]),
		'disabled'=>(int)$preparedObject[disabled],
		'afterProfitLoader'=>$preparedObject[afterProceed],
		'typeWindow'=>stripslashes($preparedObject[typeWindow]).' '.stripslashes($preparedObject[background]).' '.stripslashes($preparedObject[button_color]),
		'inputEmailTitle'=>stripslashes($preparedObject[inputEmailTitle]),
		'buttonTitle'=>stripslashes($preparedObject[buttonTitle]),
		'formAction'=>stripslashes($profitquery[subscribeProviderUrl])
	);
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[thankPopup]);
	$profitquerySmartWidgetsStructure['thankPopupOptions'] = array(
		'title'=>stripslashes($preparedObject[title]),
		'sub_title'=>stripslashes($preparedObject[sub_title]),
		'typeWindow'=>stripslashes($preparedObject[background]),
		'img'=>stripslashes($preparedObject[img]),
		'buttonTitle'=>stripslashes($preparedObject[buttonTitle])
	);
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[follow]);
	$profitquerySmartWidgetsStructure['followUsOptions'] = array(
		'title'=>stripslashes($preparedObject[title]),
		'sub_title'=>stripslashes($preparedObject[sub_title]),
		'typeWindow'=>stripslashes($preparedObject[background]),
		'socnetIconsBlock'=>$preparedObject[follow_socnet]
	);	

	$profitquerySmartWidgetsStructure['followUsFloatingPopup'] = array(
		'disabled'=>1		
	);
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[callMe]);
	$profitquerySmartWidgetsStructure['phoneCollectOptions'] = array(
		'disabled'=>(int)$preparedObject[disabled],
		'title'=>stripslashes($preparedObject[title]),
		'sub_title'=>stripslashes($preparedObject[sub_title]),
		'img'=>stripslashes($preparedObject[img]),
		'buttonTitle'=>stripslashes($preparedObject[buttonTitle]),
		'typeBookmark'=>stripslashes($preparedObject[position]).' '.stripslashes($preparedObject[loader_background]),			
		'typeWindow'=>stripslashes($preparedObject[typeWindow]).' '.stripslashes($preparedObject[background]).' '.stripslashes($preparedObject[button_color]),
		'afterProfitLoader'=>$preparedObject[afterProceed],
		'emailOption'=>array(
			'to_email'=>stripslashes($profitquery[adminEmail])			
		)
	);
	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[contactUs]);
	$profitquerySmartWidgetsStructure['contactUsOptions'] = array(
		'disabled'=>(int)$preparedObject[disabled],
		'title'=>stripslashes($preparedObject[title]),
		'sub_title'=>stripslashes($preparedObject[sub_title]),
		'img'=>stripslashes($preparedObject[img]),
		'buttonTitle'=>stripslashes($preparedObject[buttonTitle]),
		'typeBookmark'=>stripslashes($preparedObject[position]).' '.stripslashes($preparedObject[loader_background]),			
		'typeWindow'=>stripslashes($preparedObject[typeWindow]).' '.stripslashes($preparedObject[background]).' '.stripslashes($preparedObject[button_color]),
		'afterProfitLoader'=>$preparedObject[afterProceed],
		'emailOption'=>array(
			'to_email'=>stripslashes($profitquery[adminEmail])			
		)
	);
	print "
	<script>
	profitquery.loadFunc.callAfterPQInit(function(){
		var smartWidgetsBoxObject = ".json_encode($profitquerySmartWidgetsStructure).";	
		profitquery.widgets.smartWidgetsBox(smartWidgetsBoxObject);	
	});
	</script>
	";
}

add_filter('plugin_action_links', 'profitquery_wordpress_admin_link', 10, 2);