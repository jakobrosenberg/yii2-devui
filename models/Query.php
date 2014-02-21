<?php
/**
 * Created by Jakob
 * Date: 21-02-14
 * Time: 10:52
 */

namespace Simpletree\devui\models;


use yii\db\ActiveQuery;

class Query extends ActiveQuery{

	public function active($state = true)
	{
		$this->andWhere(['active' => $state]);
		return $this;
	}

	public function orderByNewest()
	{
		$this->orderBy('id DESC');
		return $this;
	}

	public function orderByOldest()
	{
		$this->orderBy('id ASC');
		return $this;
	}

} 