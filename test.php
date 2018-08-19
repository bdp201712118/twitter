<?php 
// header('Content-type: text/xml');
// header('Content-Disposition: attachment; filename="text.xml"');

// echo $xml_contents;

$xml = new SimpleXMLElement("<root/>");
 $xml->addChild("foo", "bar");

 ob_end_clean();
 header_remove();

 header("Content-type: text/xml");
 header('Content-Desposition: attachment; filename="foobar.xml"');
 echo $xml->asXML();
//  exit();

?>