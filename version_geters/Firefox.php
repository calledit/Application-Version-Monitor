<?php


function FirefoxVersion(){
    return(VersionFromWikipedia('Firefox'));
    
    /* keep this if wikipedia gets angry
	$html = file_get_html('http://www.mozilla.org/en-US/products/download.html');
	
	$VersionTexts = array();
	foreach($html->find('#content-fallback .os_windows em') as $element){
		$VersionTexts[] = $element->plaintext;
	}

	if(count($VersionTexts) != 1){
        var_dump($VersionTexts);
		throw new SourceChangeException("Less Or more than one element.");
	}
	
	return($VersionTexts[0]); */
}
