<?php		
		
namespace Ak\ExtensionAttribute\Model;		
		
class AkAttribute implements \Ak\ExtensionAttribute\Api\Data\AkAttributeInterface		
{		
    /**		
     * {@inheritdoc}		
     */		
    public function getValue()		
    {		
	return $this->getData(self::VALUE);	
    }		
		
    /**		
     * {@inheritdoc}		
     */		
    public function setValue($value)		
    {		
	return $this->setData(self::VALUE, $value);	
    }		
}	