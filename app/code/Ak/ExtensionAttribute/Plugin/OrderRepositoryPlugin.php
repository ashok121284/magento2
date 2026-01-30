<?php
namespace Ak\ExtensionAttribute\Plugin;

use Magento\Sales\Api\Data\OrderExtensionFactory;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\OrderSearchResultInterface;
use Magento\Sales\Api\OrderRepositoryInterface;

class OrderRepositoryPlugin
{
    public const AK_ATTRIBUTE_FIELD_NAME = 'ak_attribute';

    public function __construct(private OrderExtensionFactory $orderExtensionFactory) {
    }

    /**
     * Add "ak_attribute" extension attribute to order data object to make it accessible in API data of order record
     *
     * @return OrderInterface
     */
    public function afterGet(OrderRepositoryInterface $subject, OrderInterface $order)
    {       
        $this->setAkAttribute($order);
        return $order;
    }

    /**
     * Add "ak_attribute" extension attribute to order data object to make it accessible in API data of all order list
     *
     * @return OrderSearchResultInterface
     */
    public function afterGetList(OrderRepositoryInterface $subject, OrderSearchResultInterface $searchResult)
    {
        $orders = $searchResult->getItems();

        foreach ($orders as $order) {
            $this->setAkAttribute($order);
        }

        return $searchResult;
    }

    public function setAkAttribute(OrderInterface $order): void
    {
        $orderComment = $order->getData(self::AK_ATTRIBUTE_FIELD_NAME);
        $extensionAttributes = $order->getExtensionAttributes();
        $extensionAttributes = $extensionAttributes ?? $this->orderExtensionFactory->create();
        $extensionAttributes->setAkAttribute('test');
        $order->setExtensionAttributes($extensionAttributes);
    }
}
