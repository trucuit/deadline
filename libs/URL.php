<?php 
class URL
{
	public static function createLink($module, $controller, $action, $params = null)
	{		
		$linkParam = '';
		if(!empty($params)){
			foreach ($params as $key => $value) {
				$linkParam .="&$key=$value";
			}
		}
		return ROOT_URL."/$module/$controller/$action$linkParam";
	}

	public static function redirect($module, $controller, $action , $params = null){
		$link	= self::createLink($module, $controller, $action, $params);
		header('location: '.$link);
		exit();
	}
}
?>