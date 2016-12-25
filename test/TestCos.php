<?php 
define('SEROOT', getenv('SEROOT') );
define('TROOT', getenv('TROOT') );
define('CWD', getenv('CWD') );
define('APP_ROOT', getenv('APP_ROOT') );

require_once( SEROOT . "/loader/Autoload.php" );


use \Tuanduimao\Loader\App as App;
use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Model as Model;
use \Tuanduimao\Utils as Utils;
use \Tuanduimao\Tuan as Tuan;
/**
 * cos测试
 */

class TestCos extends PHPUnit_Framework_TestCase {

	function testUpload() {	
		$cos = App::M("Cos",[
				'appid'=>'1252758974',
				'bucket'=>'qcloudcrm',
				'SecretID'=>'AKIDcEi3fI86MQNAlEHrxxpcFnHclIpD3fll',
				'SecretKey'=>'0zscSBoGdty5BARI7veyb4teEx3992oT'
			]);
		try {
		$resp = $cos->uploadByUrl(
			'http://pic33.nipic.com/20130916/3420027_192919547000_2.jpg',
			[
				'filetype'=>'jpg',
				'file'=>'2826335962.jpg'
			]
		);
		} catch ( Excp $e )  {	
		    Utils::out( "\n",  $e->toArray() );
		   return ;

		}

		Utils::out( "Upload:\n", $resp, "\n");

		$this->assertEquals( $resp['code'],0);
	}


	/**
	 * 必须文件存在
	 * 文件删除test
	 * @return [type] [description]
	 */
	function testRemove() {	

			$cos = App::M("Cos",[
				'appid'=>'1252758974',
				'bucket'=>'qcloudcrm',
				'SecretID'=>'AKIDcEi3fI86MQNAlEHrxxpcFnHclIpD3fll',
				'SecretKey'=>'0zscSBoGdty5BARI7veyb4teEx3992oT'
			]);

			$resp = $cos->remove('2826335962.jpg');

			Utils::out( "Remove:\n", $resp, "\n");
			
			$this->assertEquals( $resp['code'],0);
	}


}



?>
