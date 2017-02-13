<?php
namespace Aliexpress\Sdk\Param;

class AeopSKUProperty extends BaseResponse
{
	private static $propertyTypes =
	[
        'skuPropertyId' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'propertyValueId' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'propertyValueDefinitionName' => 
        [
            'type' => 'string',
            'repeatable' => false,
        ],

        'skuImage' => 
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