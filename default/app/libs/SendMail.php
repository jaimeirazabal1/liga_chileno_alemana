<?php

class SendMail{
	public $request;
	public function __construct($mailto,$subject,$message,$path='',$filename=''){
		// $filename = 'myfile';
	 //    $path = getcwd().'/files/upload/';
	 //    if ($path == '') {
	 //    	# code...
	 //    }
	     $file = $path  . $filename;

	    // $mailto = 'mail@mail.com';
	    // $subject = 'Subject';
	    // $message = 'My message';

	    $content = file_get_contents(getcwd().'/files/upload/'.$filename);
	    $content = chunk_split(base64_encode($content));

	    // a random hash will be necessary to send mixed content
	    $separator = md5(time());

	    // carriage return type (RFC)
	    $eol = "\r\n";

	    // main header (multipart mandatory)
	    $headers = "From: LaPera <admin@lapera.com>" . $eol;
	    $headers .= "MIME-Version: 1.0" . $eol;
	    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
	    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
	    $headers .= "This is a MIME encoded message." . $eol;

	    // message
	    $body = "--" . $separator . $eol;
	    $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
	    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
	    $body .= $message . $eol;

	    // attachment
	    if ($filename) {
	    	# code...
		    $body .= "--" . $separator . $eol;
		    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
		    $body .= "Content-Transfer-Encoding: base64" . $eol;
		    $body .= "Content-Disposition: attachment" . $eol;
		    $body .= $content . $eol;
		    $body .= "--" . $separator . "--";
	    }

	    //SEND Mail
	    // echo "<pre>";
	    // echo $body;
	    // echo "</pre>";

	    if (mail($mailto, $subject, $body, $headers)) {
	    	$this->request = true;
	        echo "<br>El email ha sido enviado con exito hacia $mailto <br>"; // or use booleans here
	    } else {
	    	$this->request = false;

	        echo "<br/>mail send ... ERROR!<br/>";
	        print_r( error_get_last() );
	    }
	}
}