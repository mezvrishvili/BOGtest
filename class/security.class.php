<?php if(!defined("PROTECT")) { exit("STOP!"); } 

//-- interface
interface iSecurity {
	static function filter_text($text_data);

}

class Security implements iSecurity {

	static function filter_text($text_data) {
		$text_data = htmlspecialchars($text_data);
		$text_data = trim($text_data);
		$text_data = str_replace("\"", "&#34;", $text_data);
		$text_data = str_replace("order", "", $text_data);
		$text_data = str_replace("union", "", $text_data);
		$text_data = str_replace(",", "", $text_data);
		$text_data = str_replace(";", "", $text_data);
		$text_data = str_replace("'", "&#39;", $text_data);
		$text_data = nl2br($text_data);
		return $text_data;
	}	
	

} //-- Class end

?>