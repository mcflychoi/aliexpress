<?php 
namespace Aliexpress\Sdk\Param;

class BaseResponse
{
    protected static $properties = [];

    public function __construct()
    {
        if (!array_key_exists(__CLASS__, self::$properties)) 
        {
            self::$properties[__CLASS__] = [];
        }
    }

    public function __call($method, $param)
    {
        $type = substr($method, 0, 2);
        $property = lcfirst(substr($method, 3));

        if($type == 'set')
        {
            $this->{$property} = $param[0];
        }
        elseif($type == 'get')
        {
            if(isset($this->{$property}))
            {
                return $this->{$property};
            }

            throw new \Exception('Unknown Property');
        }
    }

    public function setStdResult($stdResult) 
    {
        $class = get_class($this);

        foreach($stdResult as $property => $value)
        {
            if($property === 0)
            {
                echo get_class($this); var_dump($value);
            }
            if(self::$properties[$class][$property])
            {
                $info = self::propertyInfo($class, $property);

                if($info['repeatable'])
                {
                    $this->{$property} = array();
                    for($i = 0; $i < count($value); $i++)
                    {
                        $this->{$property}[$i] = self::actualValue($info, $value[$i]);
                    }
                }
                else
                {
                    $this->{$property} = self::actualValue($info, $value);
                }
            }
        }
    }

    private static function propertyInfo($class, $name)
    {
        return self::$properties[$class][$name];
    }

    private static function actualValue($info, $value)
    {
        if (is_object($value)) {
            return $value;
        }

        $type = $info['type'];

        switch ($type) {
            case 'integer':
            case 'string':
            case 'double':
            case 'boolean':
                return $value;
            case 'DateTime':
                echo $value;
                echo date('Y-m-d', strtotime($value));
                var_dump(new \DateTime(strtotime($value), new \DateTimeZone('UTC')));exit;
                return new \DateTime(strtotime($value), new \DateTimeZone('UTC'));
            default:
                $type = new $type();
                $type->setStdResult($value);
                return $type;
        }
        
    }
   
}