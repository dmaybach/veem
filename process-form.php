<?php
$sendformto = "david@veem.it";

ini_set("display_errors",0);

$fields = array(
  'name' => 'Name',
  'carrier' => 'Mobile Carrier',
  'email' => 'Email',
);
$required = array(
  'name',
  'carrier',
  'email',
);

foreach($required as $f){
  if(trim($_REQUEST[$f]) == ''){
    $data = array();
    echo(json_encode($data));
    exit();
  }
}

$message = '';
foreach($fields as $f => $n){
  $val = ' ';
  if(isset($_REQUEST[$f])){
    $val = strip_tags($_REQUEST[$f]);
  }
  $message .= "$n:  $val\n\n";
}

// Mail it
mail($sendformto, "Signup form submitted", $message);


$data = array('success'=>'success');
echo(json_encode($data));
exit();
