<?php


function ChromeVersion(){

    return(VersionFromWikipedia('Google_Chrome'));
/*
	$html = file_get_html('http://en.wikipedia.org/wiki/Google_Chrome');
	
	$VersionTexts = array();
	foreach($html->find('.infobox tr') as $element){
        $Heads = '';
        foreach($element->find('th') as $Head){
            $Heads = $Head->plaintext;
        }
        if($Heads == "Stable release"){
            foreach($element->find('td p') as $Value){
		        $VersionTexts[] = $Value->plaintext;
            }
        }
	}

	if(count($VersionTexts) != 1){
        var_dump($VersionTexts);
		throw new SourceChangeException("Less Or more than one element.");
	}
	
	return(strstr($VersionTexts[0], " (", true));*/
}
