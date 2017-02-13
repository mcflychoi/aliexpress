<?php 
namespace Aliexpress\Sdk\Param;

class BaseRequest
{
	private $sdkStdResult = array();

	public function getSdkStdResult()
	{
		return $this->sdkStdResult;
	}

	public function __set($name, $value)
	{
		$this->sdkStdResult[$name] = $value;
	}

	public function __get($name)
	{
		if(isset($this->sdkStdResult[$name]))
		{
			return $this->sdkStdResult[$name];
		}
		
		throw new \Exception("Unknow Porperty");
	}
}