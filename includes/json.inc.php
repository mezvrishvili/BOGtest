<?php
if(!defined("PROTECT")) { exit("STOP!"); }

$data = json_decode($HTTP_RAW_POST_DATA, true);



### search by any property
if ($data['cmd'] == 'anypropertysearch') {

$limit = $data['limit'];

$search = Payment::FilterPayments(str_replace('filter by any property...','',$data['keyword']),$data['category'],$limit);


echo json_encode($search);
}
### search by any property END



### Add Payment Start
if ($data['cmd'] == 'addpayment') {

$payment = Payment::addPayment($data['paymentTitle'],$data['paymentAmount'],$data['paymentCategory'],$data['paymentDate'],$data['paymentComment']);

$data = array('status' => $payment);

echo json_encode($data);

}
### Add Payment End






//die
if(isset($data)) {exit;}
?>