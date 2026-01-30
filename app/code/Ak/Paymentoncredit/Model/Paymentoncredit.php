<?php
namespace Ak\Paymentoncredit\Model;

use Magento\Payment\Model\Method\AbstractMethod;
use Magento\Framework\Exception\LocalizedException;
use Magento\Directory\Helper\Data as DirectoryHelper;

class Paymentoncredit extends AbstractMethod
{
    protected $_code = 'paymentoncredit';

    protected $_isOffline = true;
    protected $_canAuthorize = true;
    protected $_canCapture = false;
}
