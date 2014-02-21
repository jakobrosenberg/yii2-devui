<?php
/**
 * Created by Jakob
 * Date: 13-01-14
 * Time: 23:31
 */

namespace Simpletree\devui\Behaviors;


use Simpletree\devui\models\App;
use yii\base\Behavior;

/**
 * Class ModuleApp
 *
 * @package Simpletree\devui\Behaviors
 * @property integer $projectId
 */
class ModuleApp extends Behavior{

	public function getProjectId()
	{
		$class = get_class($this->owner);
		return App::find(['path'=>$class])->projectApp->id;
	}

} 