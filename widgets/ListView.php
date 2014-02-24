<?php
/**
 * Created by Jakob
 * Date: 21-02-14
 * Time: 20:12
 */

namespace Simpletree\devui\widgets;


class ListView extends \yii\widgets\ListView{

	public $reverse;

	/**
	 * Renders all data models.
	 * @return string the rendering result
	 */
	public function renderItems()
	{
		$models = $this->dataProvider->getModels();
		$keys = $this->dataProvider->getKeys();
		$rows = [];
		foreach (array_values($models) as $index => $model) {
			$rows[] = $this->renderItem($model, $keys[$index], $index);
		}
		if($this->reverse){
			$rows = array_reverse($rows);
		}
		return implode($this->separator, $rows);
	}

} 