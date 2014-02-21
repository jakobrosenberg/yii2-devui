<?php
/**
 * @var \Simpletree\devui\components\AssetBundle $assetClass
 */
?>


<?php
	$asset = $assetClass::register($this);
	$iframeOptions['url'] = $asset->baseUrl;
	if(isset($scriptFile))
		$iframeOptions['url'] .='/'.$scriptFile;

echo \Simpletree\devui\widgets\FlexIframe::Widget($iframeOptions);
?>