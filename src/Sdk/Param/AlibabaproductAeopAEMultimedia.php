<?php
namespace Aliexpress\Sdk\Param;

class AlibabaproductAeopAEMultimedia extends BaseResponse
{
	private static $propertyTypes =
	[
        'aeopAEVideos' => 
        [
            'type' => 'Aliexpress\Sdk\Param\AlibabaproductAeopAEVideo',
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