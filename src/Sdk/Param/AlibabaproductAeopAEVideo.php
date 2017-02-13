<?php
namespace Aliexpress\Sdk\Param;

class AlibabaproductAeopAEVideo extends BaseResponse
{
	private static $propertyTypes =
	[
        'aliMemberId' => 
        [
            'type' => 'string',
            'repeatable' => true,
        ],

        'mediaId' => 
        [
            'type' => 'string',
            'repeatable' => true,
        ],

        'mediaType' => 
        [
            'type' => 'string',
            'repeatable' => true,
        ],

        'mediaStatus' => 
        [
            'type' => 'string',
            'repeatable' => true,
        ],

        'posterUrl' => 
        [
            'type' => 'string',
            'repeatable' => true,
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