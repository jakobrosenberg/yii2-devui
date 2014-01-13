<?php
/**
 * Created by Jakob
 * Date: 04-12-13
 * Time: 23:00
 */

namespace Simpletree\devui;

use yii\helpers\Html;
use yii\base\Widget;
use yii\web\View;

class FlexIframe extends Widget{

	public $url;
	public $interval=20;
	public $moduleName;

	/**
	 * Set to one of the following options
	 * "window": Sets the height to the browser window
	 * "content": Sets the height to the iframe content
	 * {css value}: If not "window" or "content", the value will be passed as a css value
	 * @var string
	 */
	public $height="content";

	public function init()
	{
		parent::init();

		//todo throw exception
		//if($interval===false)


		$this->registerJs();
		$this->registerCss();

		if(!$this->moduleName){
			$this->moduleName = $this->view->context->module->id;
		}


		$module = \Simpletree\devui\components\Helper::module('Simpletree\devui\Module', $this->view->context->module);
		echo $this->render('iframe/bookmark', [
			'module' => $module
		]);



		echo Html::beginTag('div', ['class'=>'iframe_container']);
		echo Html::tag('iframe', '', [
			'onload'=>'iframeLoad({
			iframe:this,
			interval:'.$this->interval.',
			height:"'.$this->height.'"
			})',
			'src'=>$this->url
		]);
		echo Html::endTag('div');
	}

	public function registerCss()
	{
		$this->view->registerCss('
			html, body, .container {
				height: 100%;
			}
			iframe {
				width: 100%;
				border: 0;
			}
			.iframe_container {
				position: relative;
				height: 100%;
			}
			form.iframe_bookmark {
				margin-bottom: 20px;
			}
		');
	}

	public function registerJs()
	{
		$this->view->registerJs(
			 '//<script>


				iframeLoad = function (v)
				{

					this.iframe = v.iframe;
					this.container = this.iframe.parentNode;
					this.iframeBody = this.iframe.contentWindow.document.body;

//				 console.log(this.iframe);


					setInterval(function(){
					 if(this.url !== this.iframe.contentWindow.location.href)
{
						    this.url = this.iframe.contentWindow.location.href;
						    document.getElementById("bookmark-url").value = this.iframe.contentWindow.location.href;
							document.getElementById("bookmark-name").value = this.iframe.contentWindow.document.title;
					 }
				        
					}, 100)


					if (v.interval === undefined){
						v.interval = 20;
					}
					if (v.height === undefined){
						v.height = 0;
					}

				    //disable scrolling unless otherwise specified
					this.iframe.scrolling = v.scrolling === undefined? "no" : v.scrolling;

					//set height to window
				    if (v.height == "window"){
				        this.iframe.height = "100%";
				    //or set height to content continuously
				    }else if (v.height == "content" && v.interval){
						setInterval(function(){
							iframeSetHeightToContent(this.iframe, this.container, this.iframeBody)
						},v.interval);
					//or set height to content on load
					}else {
						iframeSetHeightToContent(iframe, container, iframeBody);
					}
				}

				iframeSetHeightToContent = function(iframe, container, iframeBody)
				{
					iframe.height = "0";
					iframe.height = iframeBody.scrollHeight + 20 + "px";
					container.style.height = iframe.height + "px";
				}

				iframeSetHeightToWindow = function(iframe, container, iframebody)
				{
					iframe.height = window.innerHeight;
				}
			//</script>
			', View::POS_HEAD, 'dynamicIframe');
	}
} 