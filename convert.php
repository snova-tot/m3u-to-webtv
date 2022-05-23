<?php

$m3u=$_POST['m3u'];
$type=$_POST['type'];
$m3u2mtbcoma=$_POST['m3u2mtbcoma'];

$m3u.="\n";
$matches = array(); 

$re = "/#EXTINF(.*?),(.*?)[\\r\\n?|\\n\\r?](#EXTGRP.*?[\\r\\n?|\\n\\r?])?((https?|udp):\/\/.*)[\\r\\n?|\\n\\r?]/i";

preg_match_all($re, $m3u, $matches, PREG_SET_ORDER); 

if ($type=='txt') {
	$out="#NAME IPTV"; 
	foreach ($matches as $match) {
		$out.="\r\n"."Channel name:".trim($match[2])."\r\n"."URL:".trim($match[4]);
		}		
	$filename = "WebTV List.txt";
	}

if ($type=='xml') {
	$out="<?xml version=\"1.0\"?>\n<webtvs>"; 
	foreach ($matches as $match) {
		
		$description = ((strlen($match[3])>0)? mb_str_replace('#EXTGRP:','', $match[3]) : trim($match[2]));		
		
		$out.="\n"."<webtv title=\"".trim($match[2])."\" urlkey=\"0\" url=\"".trim($match[4])."\" description=\"".$description."\" type=\"1\" group=\"1\" iconsrc=\"\"/>"; 
		}		
	$out.="\n</webtvs>";
	$filename = "webtv_usr.xml";
	}

	
if ($type=='mtb') {
	$out=""; $i=0; $j=count($matches)-1;
	foreach ($matches as $match) {
		
		$delimiter=	((isset($m3u2mtbcoma) && $m3u2mtbcoma==1)?$delimiter=', ':' ');
		$out.=trim($match[2]).$delimiter.trim($match[4]);
		if ($i<$j) { 
			$out.="\r\n";
			$i++;			
			}		
		}		
	$filename = "mtb_list.txt";
	}	
	
$out = preg_replace("/[\r\n]+/", "\n", $out);

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.$filename.'"');
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . strlen($out));

echo $out;

?>