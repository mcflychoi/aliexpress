<?php
namespace Aliexpress\Sdk\Param;

class AeopAeProductPropertys extends BaseResponse
{
	private static $propertyTypes =
	[
        'attrNameId' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'attrName' => 
        [
            'type' => 'string',
            'repeatable' => false,
        ],

        'attrValueId' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'attrValue' => 
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