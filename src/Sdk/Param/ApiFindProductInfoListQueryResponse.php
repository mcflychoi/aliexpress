<?php
namespace Aliexpress\Sdk\Param;

class ApiFindProductInfoListQueryResponse extends BaseResponse
{
	private static $propertyTypes =
	[
        'aeopAEProductDisplayDTOList' =>
        [
            'type' => 'Aliexpress\Sdk\Param\AeopAEProductDisplaySampleDTO',
            'repeatable' => true,
        ],

        'totalPage' => 
        [
            'type' => 'integer',
            'repeatable' => false,  
        ],

        'currentPage' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'productCount' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'success' => [
            'type' => 'boolean',
            'repeatable' => false,
            
        ],
    ];
    
	public function __construct()
    {
        parent::__construct();
        
        if (!array_key_exists(__CLASS__, self::$properties)) 
        {
            self::$properties[__CLASS__] = array_merge(self::$properties[get_parent_class()], self::$propertyTypes);
        }
    }
}