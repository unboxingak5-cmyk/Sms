<?php
$status="";

if(isset($_POST['send'])){

$apiKey="4yS2LxjLMa0X8v11vPWzxGvXyyex7Uf2";

$number=$_POST['number'];
$message=$_POST['message'];

$url="https://api.smsmode.com/http/1.6/sendSMS.do";

$data=array(
"accessToken"=>$apiKey,
"numero"=>$number,
"message"=>$message,
"emetteur"=>"DuckShop"
);

$options=array(
'http'=>array(
'header'=>"Content-type: application/x-www-form-urlencoded\r\n",
'method'=>'POST',
'content'=>http_build_query($data)
)
);

$context=stream_context_create($options);
$result=file_get_contents($url,false,$context);

$status="SMS Sent (Response: ".$result.")";

}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>DuckShop SMS Sender</title>

<style>
body{
font-family:Arial;
background:#0f2027;
display:flex;
justify-content:center;
align-items:center;
height:100vh;
color:white;
}

.box{
background:#1e3c47;
padding:25px;
border-radius:15px;
width:90%;
max-width:400px;
}

input,textarea{
width:100%;
padding:10px;
margin-top:10px;
border-radius:8px;
border:2px solid #00eaff;
background:transparent;
color:white;
}

button{
width:100%;
padding:12px;
margin-top:15px;
border-radius:10px;
border:2px solid #00eaff;
background:transparent;
color:white;
cursor:pointer;
}

button:hover{
background:#00eaff;
color:black;
}

.status{
margin-top:10px;
}
</style>
</head>

<body>

<div class="box">

<h2>DuckShop SMS Sender</h2>

<form method="post">

<input type="text" name="number" placeholder="Phone Number" required>

<textarea name="message" placeholder="Message"></textarea>

<button name="send">Send SMS</button>

</form>

<div class="status"><?php echo $status; ?></div>

</div>

</body>
</html>