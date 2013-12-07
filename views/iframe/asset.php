
<?php
	$asset = $assetClass::register($this);
	$iframeOptions['url'] = $asset->baseUrl;
	if(isset($scriptFile))
		$iframeOptions['url'] .='/'.$scriptFile;

echo \Simpletree\devui\FlexIframe::Widget($iframeOptions);
?>