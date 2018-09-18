<?php

namespace Omnipay\Cayan;

use Omnipay\Common\AbstractGateway;

/**
 * Cayan Gateway
 * @link https://cayan.com/developers/merchantware/merchantware-4-5/credit
 */

class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Cayan';
    }

    public function getDefaultParameters()
    {
        return [
            'productionEndPoint' => '',
            'sandboxEndPoint' => '',
            'merchantName' => '',
            'merchantSiteId' => '',
            'merchantKey' => '',
        ];
    }

    public function getSandboxEndPoint()
    {
        return $this->getParameter('sandboxEndPoint');
    }

    public function setSandboxEndPoint($value)
    {
        return $this->setParameter('sandboxEndPoint', $value);
    }

    public function getProductionEndPoint()
    {
        return $this->getParameter('productionEndPoint');
    }

    public function setProductionEndPoint($value)
    {
        return $this->setParameter('productionEndPoint', $value);
    }

    public function getMerchantName()
    {
        return $this->getParameter('merchantName');
    }

    public function setMerchantName($value)
    {
        return $this->setParameter('merchantName', $value);
    }

    public function getMerchantSiteId()
    {
        return $this->getParameter('merchantSiteId');
    }

    public function setMerchantSiteId($value)
    {
        return $this->setParameter('merchantSiteId', $value);
    }

    public function getMerchantKey()
    {
        return $this->getParameter('merchantKey');
    }

    public function setMerchantKey($value)
    {
        return $this->setParameter('merchantKey', $value);
    }

    public function createCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\CreateCardRequest', $parameters);
    }

    public function deleteCard(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\DeleteCardRequest', $parameters);
    }

    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\AuthorizeRequest', $parameters);
    }

    public function capture(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\CaptureRequest', $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\PurchaseRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\RefundRequest', $parameters);
    }
}

