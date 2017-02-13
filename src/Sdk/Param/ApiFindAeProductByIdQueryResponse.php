<?php
namespace Aliexpress\Sdk\Param;

class ApiFindAeProductByIdQueryResponse extends BaseResponse
{
	private static $propertyTypes =
	[
        'aeopAeProductPropertys' =>
        [
            'type' => 'Aliexpress\Sdk\Param\AeopAeProductPropertys',
            'repeatable' => true,
        ],

        'aeopAeProductSKUs' => 
        [
            'type' => 'Aliexpress\Sdk\Param\AeopAeProductSKUs',
            'repeatable' => true,  
        ],

        'aeopAEMultimedia' => 
        [
            'type' => 'Aliexpress\Sdk\Param\AlibabaproductAeopAEMultimedia',
            'repeatable' => false,
        ],

        'detail' => 
        [
            'type' => 'string',
            'repeatable' => false,
        ],

        'deliveryTime' => 
        [
            'type' => 'integer',
            'repeatable' => false,        ],

        'ownerMemberId' => [
            'type' => 'string',
            'repeatable' => false,       ],

        'ownerMemberSeq' => [
            'type' => 'string',
            'repeatable' => false,   
        ],

        'productId' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'categoryId' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'subject' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'packageType' => [
            'type' => 'boolean',
            'repeatable' => false,
        ],

        'lotNum' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'packageLength' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'packageWidth' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'packageHeight' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'grossWeight' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'isPackSell' => [
            'type' => 'boolean',
            'repeatable' => false,
        ],

        'reduceStrategy' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'groupIds' => [
            'type' => 'integer',
            'repeatable' => true,
        ],

        'bulkDiscount' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'imageURLs' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'productUnit' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'wsValidNum' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'src' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'wsOfflineDate' => [
            'type' => 'DateTime',
            'repeatable' => false,
        ],

        'wsDisplay' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'productStatusType' => [
            'type' => 'string',
            'repeatable' => false,
        ],
        
        'currencyCode' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'freightTemplateId' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'addUnit' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'addWeight' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'baseUnit' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'bulkOrder' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'groupId' => [
            'type' => 'integer',
            'repeatable' => false,
        ],

        'isImageDynamic' => [
            'type' => 'boolean',
            'repeatable' => false,
        ],

        'productPrice' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'promiseTemplateId' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'sizechartId' => [
            'type' => 'string',
            'repeatable' => false,
        ],

        'success' => [
            'type' => 'boolean',
            'repeatable' => false,
        ],

        'couponStartDate' => [
            'type' => 'DateTime',
            'repeatable' => false,
        ],

        'couponEndDate' => [
            'type' => 'DateTime',
            'repeatable' => false,
        ],

        'mobileDetail' => [
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