<?php
	// Der må kun være en header i et dokument
	// eller vil der bliev kastet en fejl : 
	// Cannot modify header information - headers already sent by ...

	ob_start(); //ob_flush();
	// ob_start gør at alt output kan buffers til OB itedet for at bruge dokumentet.
	// Output bliver streamet til bufferen, undtagen headers.
	// ob_start gør at vi kan have flere headers.

	//Content-type. Sæt dokumenttype. F.eks Plain/text, PDF, jpg, png, json, xml, html, etc..
	header('Content-type: text/plain');
	header('Content-type: application/pdf');
	
	//http://php.net/manual/en/function.header.php
	header('location:http://google.com'); //302 Midlertidig Redirect


	header("HTTP/1.0 404 Not Found"); //Set HTTP headers. F.eks 404 eller andre status koder.

	// Send vedhæftet fil med i http forespørgelsen.
	header('Content-Disposition: attachment; filename="downloaded.pdf"');
?>