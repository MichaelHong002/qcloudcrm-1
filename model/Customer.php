<?php

use \Tuanduimao\Mem as Mem;
use \Tuanduimao\Excp as Excp;
use \Tuanduimao\Err as Err;
use \Tuanduimao\Conf as Conf;
use \Tuanduimao\Model as Model;
use \Tuanduimao\Utils as Utils;

/**
 * 客户检索model
 */

class CustomerModel extends Model {

	/**
	 * 初始化
	 * @param array $param [description]
	 */
	function __construct( $param=[] ) {
		parent::__construct();
		$this->table('customer');
	}
	
	/**
	 * 数据表结构
	 * @see https://laravel.com/docs/5.3/migrations#creating-columns
	 * @return [type] [description]
	 */
	function __schema() {
			
		 $this->putColumn( 'id', $this->type('bigInteger', ['unique'=>1]) )
            ->putColumn( 'num', $this->type('string', ['length'=>80, 'unique'=>1]) )
            ->putColumn( 'company', $this->type('string', ['length'=>200]) )
            ->putColumn( 'name', $this->type('string', ['length'=>20]) )
            ->putColumn( 'title', $this->type('string', ['length'=>80]) )
            ->putColumn( 'mobile', $this->type('string', ['length'=>20]) )
            ->putColumn( 'address', $this->type('string', ['length'=>200]) )
            ->putColumn( 'remark', $this->type('string', ['length'=>200]) )
            ->putColumn( 'fulltext', $this->type('mediumText') )
            ->putColumn( 'status', $this->type('enum', [
                    'enum'=>['active','inactive'],
                    'index'=>1,
                    ]))
        ;
	}


	function __clear() {
		$this->dropTable();
	}
	

	/**
	 * 创建测试数据
	 * @return [type] [description]
	 */
	function fakerdata(){
		
		$faker = Utils::faker();
		for( $i=0; $i<10; $i++ ) {
			try {
				$this->create([
			        'name'=> $faker->name,
			        'mobile'=> $faker->phoneNumber,
			    ]);
			} catch(Excp $e){}
	    }
	}


}