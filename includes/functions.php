<?php
if(!function_exists('redirect'))
{	
	/**
	*Redirect to specified url
	*@param string $url
	**/
	function redirect($url)
	{
	  header('location:'.url($url));
	}

}
if(!function_exists('config'))
{/**
*fetches specific configuration values.
* @param datatype $paramname description

**/

	function config($key)
 		{
 			require __DIR__.'/config.php';
	
 		if(isset($config[$key]))
 		{
 			return $config[$key];
 		}
 		else
 		{
 			return false;
 		}
	}
}

if(!function_exists('url'))
{
	/**
     *generates url based on site url from configuration
     *@param string $uri
     *@return string
	**/
function url($uri ='')
{
	$base=config('site_url');
	if($base[(strlen($base)-1)]!='/')

	{
		$base.='/';
	}
     return $base.$uri;
  }
}

if(!function_exists('getFirstPara')){
	/**
	 * Generates first paragraph from the string
	 * 
	 * @param   $string string
	 * @return string
	 */
	function getFirstPara($string){
    $string = substr($string,0, strpos($string, "</p>")+4);
    return $string;
}}

?>