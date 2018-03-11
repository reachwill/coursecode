<?php
class Theme{
	public function navigation($nav_items){//defining a method of the Theme class
		$htmlStr =  '<ul>';
		foreach($nav_items as $item){
			$htmlStr .= '<li><a href="' . $item['url'] . '">' . $item['label'] . '</a></li>';	
		}
		$htmlStr .= '</ul>';
		return $htmlStr;
	}
	
}

?>