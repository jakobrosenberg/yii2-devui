<?php
/**
 * Created by Jakob
 * Date: 01-02-14
 * Time: 23:58
 */ ?>


<?php
$asset = $assetClass::register($this);
$iframeOptions['url'] = $asset->baseUrl;
if(isset($scriptFile))
	$iframeOptions['url'] .='/'.$scriptFile;

echo \Simpletree\devui\widgets\FlexIframe\FlexIframe::Widget($iframeOptions);
?>