<?php
namespace Aliexpress\Sdk\Param;

class AeopAEProductDisplaySampleDTO extends BaseResponse
{
	private static $propertyTypes =
	[
        'subject' => 
        [
            'type' => 'string',
            'repeatable' => false, 
        ],

        'groupId' => 
        [
            'type' => 'integer',
            'repeatable' => false,  
        ],

        'wsOfflineDate' => 
        [
            'type' => 'DateTime',
            'repeatable' => false,
        ],

        'productId' => 
        [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'imageURLs' => 
        [
            'type' => 'string',
            'repeatable' => false,  
        ],

        'src' => 
        [
            'type' => 'string',
            'repeatable' => false,  
        ],

        'gmtCreate' =>
        [
            'type' => 'DateTime',
            'repeatable' => false,
            
        ],

        'gmtModified' => 
        [
            'type' => 'DateTime',
            'repeatable' => false,
        ],

        'productMinPrice' =>
        [
            'type' => 'string',
            'repeatable' => false,  
        ],

        'productMaxPrice' =>
        [
            'type' => 'string',
            'repeatable' => false,            
        ],

        'ownerMemberId' => 
        [
            'type' => 'string',
            'repeatable' => false,   
        ],

        'ownerMemberSeq' => 
        [
            'type' => 'integer',
            'repeatable' => false,  
        ],

        'wsDisplay' => 
        [
            'type' => 'integer',
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
        if (!array_key_exists(__CLASS__, self::$properties)) 
        {
            self::$properties[__CLASS__] = array_merge(self::$properties[get_parent_class()], self::$propertyTypes);
        }
    }
}