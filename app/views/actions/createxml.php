<?php
error_reporting(0);
require_once ('config.php'); // database connection
$page_title=TITLE;
$site_url=URL;
$site_email=EMAIL;
$site_desc=DSC;
require 'incfiles/bbparser.php'; // phpbb code parser


$xml = new DomDocument("1.0","UTF-8");

$urlset = $xml->createElement("urlset");
$urlset = $xml->appendChild($urlset);

$url = $xml->createElement("url");
$url = $urlset->appendChild($url);
//========================================================
$sql = "SELECT * FROM `topics` ORDER BY topic_id DESC "; 
$query = $db->query($sql);

while($row = mysqli_fetch_assoc($query)) // loop all topics from databse
{
$title1=$row['title']; 
$link1=$row['link']; 
$tid1 = $row["topic_id"];

$date = date("r", $row["time"]);
$mmessage = $row["content_text"];
$mmessage = str_replace('&', 'and', $mmessage); // Replaces all & symbol with and.
$bbcodes = new bbParser(); 
$message = $bbcodes->getHtml($mmessage);
$link2 = urldecode($site_url . '/' . $tid1 . '/' . $link1);

$loc = $xml->createElement("loc","$link2");
$loc = $url->appendChild($loc);

$lastmod = $xml->createElement("lastmod","$date");
$lastmod = $url->appendChild($lastmod);

$changefreq = $xml->createElement("changefreq", "always");
$changefreq = $url->appendChild($changefreq);

$priority = $xml->createElement("priority","1.00");
$priority = $url->appendChild($priority);
}

$xml->FormatOutput = true;
$string_value = $xml->saveXML();
$xml->save("sitemap.xml"); // your desire sitemap file

?>