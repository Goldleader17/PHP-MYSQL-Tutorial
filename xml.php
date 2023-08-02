<?php

// THE SimpleXML Parser

$myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
<note>
<to>Tove</to>
<from>Jani</from>
<heading>Reminder</heading>
<body>Don't forget me this weekend!</body>
</note>";

$xml=simplexml_load_string($myXMLData) or die("Error: Cannot create object");
print_r($xml);
echo "<br>","<br>";

libxml_use_internal_errors(true);
$myXMLData = "<?xml version='1.0' encoding='UTF-8'?>
<note>
<document>
<user>John Doe</user>
<email>john@example.com</wrongemail>
</document>";

$xml = simplexml_load_string($myXMLData);
if ($xml === false) 
{ echo "Failed loading XML: "; foreach(libxml_get_errors() as $error) 
    {echo "<br>", $error->message;
    }
} else { print_r($xml);}
echo "<br>","<br>","<br>";

$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
print_r($xml);
echo "<br>","<br>";

$xml=simplexml_load_file("note.xml") or die("Error: Cannot create object");
echo $xml->to . "<br>";
echo $xml->from . "<br>";
echo $xml->heading . "<br>";
echo $xml->body;
echo "<br>","<br>";

$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
echo $xml->book[0]->title . "<br>";
echo $xml->book[1]->title;
echo "<br>","<br>";

$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
foreach($xml->children() as $books){
    echo $books->title . ", ";
    echo $books->author . ", ";
    echo $books->year . ", ";
    echo $books->price . "<br>";
}
echo "<br>";

$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
echo $xml->book[0]['category'] . "<br>";
echo $xml->book[1]->title['lang'];
echo "<br>","<br>";

$xml=simplexml_load_file("books.xml") or die("Error: Cannot create object");
foreach($xml->children() as $books){
    echo $books->title['lang'];
    echo "<br>";
}
echo "<br>";

$xmlDoc = new DOMDocument();
$xmlDoc->load("note.xml");

print $xmlDoc->saveXML();
echo "<br>","<br>";

$xmlDoc = new DOMDocument();
$xmlDoc->load("note.xml");

$x = $xmlDoc->documentElement;
foreach ($x->childNodes AS $item) {
    print $item->nodeName . " = " . $item->nodeValue . "<br>";
}

?>
