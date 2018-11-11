<?php
namespace backend\controllers;

use yii\web\Controller;
use common\models\Config;
use yii\web\Response;

class ToolsController extends Controller
{

    /**
     * 普通文件上传
     */
    public function actionUpload()
    {

        \Yii::$app->response->format = Response::FORMAT_JSON;

        $file = $_FILES;
        $file_name = $file['file']['name'];
        $file_tmp_path =$file['file']['tmp_name'];

        $baseFileRoot = '../../resourcefile/';
        $upDir = "uploads/".date("Ymd") . '/';
        $dir = $baseFileRoot . $upDir;
        if (!is_dir($baseFileRoot . $upDir)){
            mkdir($dir,0777,true);
        }
        $type = substr(strrchr($file_name, '.'), 1);

        $allow_type = explode(',', \Yii::$app->params['WEB_SITE_ALLOW_UPLOAD_TYPE']);
        if(!in_array($type, $allow_type)){
            die("文件类型为允许的格式");
        }
        $file_save_name = date("YmdHis",time()) . mt_rand(100000, 999999) . '.' . $type;
        move_uploaded_file($file_tmp_path, $dir . $file_save_name);

        $webSiteResourceConf = \Yii::$app->params['WEB_SITE_RESOURCES_URL'] ?? '';

        return [
            'code' => '200',
            'data' =>  $webSiteResourceConf . $upDir . $file_save_name
        ];
    }


//    /**
//	 * 富文本编辑器上传文件
//	 */
//    public function actionUploadEditor()
//    {
//        $file = $_FILES;
//        $file_name = $file['wangEditorH5File']['name'];
//        $file_tmp_path =$file['wangEditorH5File']['tmp_name'];
//        $dir = "../../uploads/".date("Ymd");
//        if (!is_dir($dir)){
//            mkdir($dir,0777);
//        }
//		$type = substr(strrchr($file_name, '.'), 1);
//		$mo = Config::findOne(['name'=>'WEB_SITE_ALLOW_UPLOAD_TYPE']);
//		$allow_type = explode(',', $mo->value);
//		if(!in_array($type, $allow_type)){
//			die("文件类型为允许的格式");
//		}
//        $file_save_name = date("YmdHis",time()) . mt_rand(1000, 9999) . '.' . $type;
//        move_uploaded_file($file_tmp_path, $dir.'/'.$file_save_name);
//        echo Config::findOne(['name'=>'WEB_SITE_RESOURCES_URL'])->value . date('Ymd').'/'.$file_save_name;
//    }





	public function actionIco(){
		return $this->render('ico');
	}
}
