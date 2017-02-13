<?php
namespace Aliexpress\Client\Serialize;

interface Serializer
{
	public function supportedContentType();
	public function serialize($serializer);
}