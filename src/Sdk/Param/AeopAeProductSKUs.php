<?php
namespace Aliexpress\Sdk\Param;

class AeopAeProductSKUs extends BaseResponse
{
	private static $propertyTypes =
	[
        'aeopSKUProperty' => 
        [
            'type' => 'Aliexpress\Sdk\Param\AeopSKUProperty',
            'repeatable' => true,
        ],

        'skuPrice' => 
        [
            'type' => 'string',
            'repeatable' => false,
        ],

        'skuCode' => 
        [
            'type' => 'string',
            'repeatable' => false,
        ],

        'skuStock' => 
        [
            'type' => 'string',
            'repeatable' => false,
        ],

        'ipmSkuStock' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'id' => 
        [
            'type' => 'string',
            'repeatable' => false,
        ],

        'currencyCode' => 
        [
            'type' => 'string',
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