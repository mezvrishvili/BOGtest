<?php
if(!defined("PROTECT")) { exit("STOP!"); }

//-- MySQL interface 
interface iMySQL {
	public function connect();
	static function query($query);
	public function close();
}

//-- MySQL class start
class MySQL implements iMySQL {
	// Cvladebis gamocxadeba
	private $mysql_host = MYSQL_HOST;
	private $mysql_user = MYSQL_USER;
	private $mysql_pass = MYSQL_PASS;
	private $mysql_database = MYSQL_DATABASE;
	public static $db_link;
	static $query;

	public function connect() {
		if(!self::$db_link) { // tu connect jer ar gamodzaxebula
			self::$db_link = $this;
			self::$db_link = mysql_connect($this->mysql_host, $this->mysql_user, $this->mysql_pass) or die("<p align=\"center\">".mysql_error()."</p>");
			mysql_select_db($this->mysql_database) or die("<p align=\"center\">".mysql_error()."</p>");	
		} else { // tu connect gamodzaxebulia
			self::$db_link = null; 
			echo "<script type=\"text/javascript\">\n<!--\nalert(\"Connection interrupted\")\n-->\n</script>";
		}
	}

	static function query($query) {
		if(self::$db_link) {
			MySQL::$query = mysql_query($query, self::$db_link) or die("<p align=\"center\">".mysql_error()."</p>");
			return MySQL::$query;
		}
	}

	public function close() {
		if(self::$db_link) {
			mysql_close(self::$db_link) or die("<p align=\"center\">".mysql_error()."</p>");
		}
	}

} // MySQL class end

?>