<?php


function VersionFromWikipedia($WikipediaName){
	$html = file_get_html('http://en.wikipedia.org/wiki/'.$WikipediaName);
	
	$VersionTexts = array();
	foreach($html->find('.infobox tr') as $element){
        $Heads = '';
        foreach($element->find('th') as $Head){
            $Heads = $Head->plaintext;
        }
        if($Heads == "Stable release"){
            foreach($element->find('td') as $Value){
		        $VersionTexts[] = $Value->plaintext;
            }
        }
	}
    $html->clear();

	if(count($VersionTexts) != 1){
        var_dump($VersionTexts);
		throw new SourceChangeException("Less Or more than one element.");
	}
	
	return(strstr($VersionTexts[0], " (", true));
}

function MultiVersionFromWikipedia($WikipediaName){
	$html = file_get_html('http://en.wikipedia.org/wiki/'.$WikipediaName);
	
	$VersionTexts = array();
	foreach($html->find('.infobox tr') as $element){
        $Heads = '';
        foreach($element->find('th') as $Head){
            $Heads = $Head->plaintext;
        }
        if($Heads == "Stable release"){
            foreach($element->find('td p') as $Value){
                $Os = '';
                foreach($Value->find('b') as $OS){
                    $Os = $OS->plaintext;
                }
                
		        $VersionTexts[$Os] = trim(substr($Value->plaintext, strlen($Os)));
            }
        }
	}
    $html->clear();

	if(!isset($VersionTexts['Windows'])){
        var_dump($VersionTexts);
		throw new SourceChangeException("Windows version not set.");
	}
	
	return(strstr($VersionTexts['Windows'], " (", true));
}
