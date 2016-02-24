<?php


if (!defined("G_JWU_MAIL")) {

define("G_JWU_MAIL",1);

function jwu_mail($to,$subject,$message) {
    $curl = curl_init('http://tageninformatics.com/client/jwu/email/');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, array(
        'to' => $to,
        'subject' => $subject,
        'message' => $message
        )
    );
    $curl_response = curl_exec($curl);


    if ($curl_response === false) {
        $info = curl_getinfo($curl);
        curl_close($curl);
        die('Unable to run network request. Additional info: ' . var_export($info));
    }
    curl_close($curl);
    $ret = json_decode($curl_response);
    if ($ret->success != true) {
        echo "Unable to send email due to the following errors: \n";
        foreach ($ret->errors as $num=>$error)
                echo $error . ". \n";
    }
    return $ret->success;
}


}//end global define