<?php if(!defined("PROTECT")) { exit("STOP!"); }

//-- interface
interface iPayment {
	static function getCategoryList();
	static function addPayment($title,$amount,$category,$date,$comment);
	static function FilterPayments($keyword,$category,$limit);
	static function format_money($amount,$decimals);

}

class Payment implements iPayment {


//-- category list
static function getCategoryList() {

	$query = MySQL::query("select id,name from category order by priority");

	while ($row = mysql_fetch_array($query)) {

		echo "<option value=\"".$row['id']."\">".$row['name']."</option>";

	}

}
//-- category list END




//send data to database
static function addPayment($title,$amount,$category,$date,$comment) {

	$paymentTitle = Security::filter_text($title);
	$paymentAmount = Security::filter_text($amount);
	$paymentCategory = intval($category);
	$paymentDate = Security::filter_text($date);
	$paymentComment = Security::filter_text($comment);
	
	$paymentAmount = self::format_money($amount,2,true);

	$paymentDate = !isset($paymentDate) ? $paymentDate : date('Y-m-d H:i:s');

	$query = MySQL::query("insert into payments set 
	`title`=\"".$paymentTitle."\",
	`amount`=\"".$paymentAmount."\",
	`category`=\"".$paymentCategory."\",
	`date`=\"".$paymentDate."\",
	`comment`=\"".$paymentComment."\" ");

 

	if($query) {$status = 1;} else {$status = 0;}



	return $status;

}
//send data to database






static function FilterPayments($keyword,$category = false,$limit = false) {


	if($limit) {$limit = "limit ".$limit;} else {$limit = "";}

	if(!empty($keyword)) {$keywords = " where (p.title like '%$keyword%' OR p.comment like '%$keyword%' OR p.amount like '%$keyword%' OR p.date like '%$keyword%')";}

	if(!empty($category)) { if(isset($keywords)) {$cats = " AND p.category IN (".$category.")";} else {$cats = " where p.category IN (".$category.")";}}


	$query = MySQL::query("select p.id,p.title,p.amount,c.name,p.date,p.comment from payments  p inner join category  c on p.category=c.id  ".$keywords." ".$cats." ".$limit." ");


$data = [];

for($x = 0; $x < mysql_num_rows($query); $x++){ 

	$single = array();

	while ($row = mysql_fetch_assoc($query)) {

	$single[] = $row;

	}

$data = array_merge($data, $single);

}


return $data;
}









static function format_money($amount,$decimals,$without_dot = false) {


	if($without_dot == true) {$dot = '';} else {$dot = '.';}

	return number_format((float)$amount, 2, $dot, '');

}






} //class end

?>