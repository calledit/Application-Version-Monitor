<?php


function JavaVersion(){

    //return(VersionFromWikipedia('Java_%28programming_language%29'));
    return(VersionFromWikipedia('Java_(programming_language)'));
    
    /* keep this if wikipedia gets angry
	$html = file_get_html('https://java.com/en/download/index.jsp');
	
	$VersionTexts = array();
	foreach($html->find('strong') as $element){
		$VersionTexts[] = $element->plaintext;
	}

	if(count($VersionTexts) != 1){
		throw new SourceChangeException("Less Or more than one <strong> element.");
	}
	
	return($VersionTexts[0]);*/
}
