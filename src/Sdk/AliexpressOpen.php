<?php
namespace Aliexpress\Sdk;

use Aliexpress\Client\APIId;
use Aliexpress\Client\APIRequest;
use Aliexpress\Client\APIResponse;
use Aliexpress\Client\SyncAPIClient;
use Aliexpress\Client\Entity\AuthorizationToken;
use Aliexpress\Client\Entity\ParentResult;
use Aliexpress\Client\Entity\ResponseStatus;
use Aliexpress\Client\Entity\ResponseWrapper;
use Aliexpress\Client\Policy\ClientPolicy;
use Aliexpress\Client\Policy\DataProtocol;
use Aliexpress\Client\Policy\RequestPolicy;



/**
 * API调用的入口
 */
class AliexpressOpen {

    private $serverHost = "gw.open.1688.com";
	private $httpPort = 80;
	private $httpsPort = 443;
	private $appKey;
	private $secKey;
	private $syncAPIClient;
	
	public function setServerHost($serverHost)
	{
		$this->serverHost = $serverHost;
	}

	public function setHttpPort($httpPort) 
	{
		$this->httpPort = $httpPort;
	}

	public function setHttpsPort($httpsPort) 
	{
		$this->httpsPort = $httpsPort;
	}

	public function setAppKey($appKey) 
	{
		$this->appKey = $appKey;
	}

	public function setSecKey($secKey) 
	{
		$this->secKey = $secKey;
	}

	public function initClient() 
	{
		$clientPolicy = new ClientPolicy ();
		$clientPolicy->appKey = $this->appKey;
		$clientPolicy->secKey = $this->secKey;
		$clientPolicy->httpPort = $this->httpPort;
		$clientPolicy->httpsPort = $this->httpsPort;
		$clientPolicy->serverHost = $this->serverHost;
		
		$this->syncAPIClient = new SyncAPIClient ( $clientPolicy );
	}
	
	public function getAPIClient() 
	{
		if ($this->syncAPIClient == null)
		{
			$this->initClient ();
		}

		return $this->syncAPIClient;
	}

	/**
	 * 根据授权码换取授权令牌
	 * 
	 * @param code 授权码
	 * @return 授权令牌
	 */
	public function getToken($code) 
	{
		$reqPolicy = new RequestPolicy();
		$reqPolicy->httpMethod="POST";
        $reqPolicy->needAuthorization=false;
        $reqPolicy->requestSendTimestamp=true;
        $reqPolicy->useHttps=true;
		$reqPolicy->requestProtocol=DataProtocol::param2;
           
        $request = new APIRequest ();
        $request->addtionalParams["code"]=$code;
        $request->addtionalParams["grant_type"]="authorization_code";
        $request->addtionalParams["need_refresh_token"]=true;
        $request->addtionalParams["client_id"]=$this->appKey;
        $request->addtionalParams["client_secret"]=$this->secKey;
        $request->addtionalParams["redirect_uri"]="default";
		$apiId = new APIId ("system.oauth2", "getToken", $reqPolicy->defaultApiVersion);
		$request->apiId = $apiId;

		$resultDefinition = new AuthorizationToken();
        $this->getAPIClient()->send($request, $resultDefinition,
						$reqPolicy);

		return $resultDefinition;
	}
	
	
	/**
	 * 刷新token
	 * 
	 * @param refreshToken refresh 令牌
	 * @return 授权令牌
	 */
	public function refreshToken($refreshToken) 
	{
		$reqPolicy = new RequestPolicy();
		$reqPolicy->httpMethod="POST";
        $reqPolicy->needAuthorization=false;
        $reqPolicy->requestSendTimestamp=true;
        $reqPolicy->useHttps=true;
		$reqPolicy->requestProtocol=DataProtocol::param2;
           
        $request = new APIRequest ();
        $request->addtionalParams["refreshToken"]=$refreshToken;
        $request->addtionalParams["grant_type"]="refresh_token";
        $request->addtionalParams["client_id"]=$this->appKey;
        $request->addtionalParams["client_secret"]=$this->secKey;
		$apiId = new APIId ("system.oauth2", "refreshToken", $reqPolicy->defaultApiVersion);
		$request->apiId = $apiId;

		$resultDefinition = new AuthorizationToken();
        $this->getAPIClient()->send($request, $resultDefinition,
						$reqPolicy);
		return $resultDefinition;
	}

	public function accessToken($refreshToken)
	{
		$reqPolicy = new RequestPolicy();
		$reqPolicy->httpMethod = "POST";
        $reqPolicy->needAuthorization = false;
        $reqPolicy->requestSendTimestamp = true;
        $reqPolicy->useHttps = true;
		$reqPolicy->requestProtocol = DataProtocol::param2;
        
        $request = new APIRequest ();
        $request->addtionalParams["refreshToken"] = $refreshToken;
        $request->addtionalParams["grant_type"] = "refresh_token";
        $request->addtionalParams["client_id"] = $this->appKey;
        $request->addtionalParams["client_secret"] = $this->secKey;
		$apiId = new APIId ("system.oauth2", "getToken", $reqPolicy->defaultApiVersion);
		$request->apiId = $apiId;
      
		$resultDefinition = new AuthorizationToken();
        $this->getAPIClient()->send($request, $resultDefinition,
						$reqPolicy);
		return $resultDefinition;
	}

	public function apiFindProductInfoListQuery($param, $accessToken, $resultDefinition)
	{
        $reqPolicy = new RequestPolicy();
        $reqPolicy->httpMethod = "POST";
        $reqPolicy->needAuthorization = true;
        $reqPolicy->requestSendTimestamp = false;
        $reqPolicy->useHttps = false;
        $reqPolicy->useSignture = true;
        $reqPolicy->accessPrivateApi = false;
       
        $request = new APIRequest ();
		$apiId = new APIId ("aliexpress.open", "api.findProductInfoListQuery", 1);
		$request->apiId = $apiId;
            
        $request->requestEntity = $param;            
        $request->accessToken = $accessToken;            
        $this->getAPIClient()->send($request, $resultDefinition, $reqPolicy);
    }

    public function __call($method, $params)
    {
    	$reqPolicy = new RequestPolicy();
        $reqPolicy->httpMethod = "POST";
        $reqPolicy->needAuthorization = true;
        $reqPolicy->requestSendTimestamp = false;
        $reqPolicy->useHttps = false;
        $reqPolicy->useSignture = true;
        $reqPolicy->accessPrivateApi = false;

        $api = lcfirst(str_replace('Query', '',str_replace('api', '', $method)));
       
        $request = new APIRequest ();
		$apiId = new APIId ("aliexpress.open", "api.". $api, 1);
		$request->apiId = $apiId;
            
        $request->requestEntity = $params[0];            
        $request->accessToken = $params[1];            
        $this->getAPIClient()->send($request, $params[2], $reqPolicy);
    }
                                                               
}
