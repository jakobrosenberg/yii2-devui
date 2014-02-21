<?php
/**
 * Created by Jakob
 * Date: 02-02-14
 * Time: 00:41
 */

namespace Simpletree\devui\widgets\FlexIframe;


class BookmarkList extends \yii\base\Widget {
	public $bookmarks;
	public $model;

	public function init()
	{
		if($this->bookmarks === null){
			$this->bookmarks = \Simpletree\devui\models\Bookmark::find()->where(['id_app'=>$this->view->context->module->projectId])->all();
		}

		echo $this->render('BookmarkList', [
			'bookmarks' => $this->bookmarks,
			'model' => $this->model
		]);
	}


}