<?php

/*Cómo obtener su MailChimp API KEY - http://kb.mailchimp.com/article/where-can-i-find-my-api-key*/
/*How to Get Your  MailChimp API KEY - http://kb.mailchimp.com/article/where-can-i-find-my-api-key*/
$apiKey = 'your-api-key';

/*Cómo obtener su ID LISTA Mailchimp - http://kb.mailchimp.com/article/how-can-i-find-my-list-id*/
/*How to Get Your  MailChimp list id - http://kb.mailchimp.com/article/how-can-i-find-my-list-id*/
$listId = 'your-list-id';

$double_optin=false;
$send_welcome=false;
$email_type = 'html';
$email = ($_GET['email']) ?$_GET['email'] : $_POST['email'];


/*replace us2 with your actual datacenter - Log on to your account and look at the top of your browser. The first part of the address identifies your data center | - http://status.mailchimp.com/ */
/*Reemplazar us2 con su centro de datos actual - Inicie sesión en su cuenta y buscar en la parte superior de su navegador. La primera parte de la dirección identifica a su centro de datos | - http://status.mailchimp.com/ # find-su-centro de datos*/
$submit_url = "http://us7.api.mailchimp.com/1.3/?method=listSubscribe";
$data = array(
    'email_address'=$email,
    'apikey'=$apiKey,
    'id' = $listId,
    'double_optin' =$double_optin,
    'send_welcome' =$send_welcome,
    'email_type' =$email_type
);
$payload = json_encode($data);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
 
$result = curl_exec($ch);
curl_close ($ch);
$data = json_decode($result);
if ($data->error){
    echo $data->error;
} else {
    echo "Got it, you've been added to our email list.";
}
	
	
	

?>