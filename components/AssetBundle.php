<?php
/**
 * Created by Jakob
 * Date: 09-12-13
 * Time: 12:02
 */

namespace Simpletree\devui\components;


use Simpletree\devui\models\Project;

class AssetBundle extends \yii\web\AssetBundle{

	public $global = true;

	private $_subDir;


	/**
	 * @param \yii\web\AssetManager $am
	 */
	public function publish($am)
	{
		if($subdir = $this->getSubDir()){
			$am->basePath = \Yii::getAlias("@webroot")."/devui2/".$subdir;
			$am->baseUrl = \Yii::getAlias("@web")."/devui2/".$subdir;
		}
		parent::publish($am);
	}

	public function getSubDir()
	{
		if(!$this->_subDir){
			$this->setSubDir();
		}
		return $this->_subDir;
	}

	public function setSubDir($dir = false)
	{
		if(!$dir){
			$arr = explode('\\',strtolower(substr(get_class($this), 0, -5)));
			$appName = end($arr);

			//use a custom asset dir?
			if(isset(Project::getCurrent()->apps[$appName]->custom_dir) && Project::curent()->apps[$appName]->custom_dir){
				$dir = Project::getCurrent()->apps[$appName]->custom_dir;
			//use a global asset dir?
			}elseif($this->global){
				$dir = 'global';
			//use a project asset dir
			}else{
				$dir = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', Project::getCurrent()->name));
			}
		}
		return $this->_subDir = 'devui/'.$dir.'/'.preg_replace('/[^\w]/', '', $appName);
	}

} 