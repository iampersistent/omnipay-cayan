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
            'merchantName' => '',
            'merchantSiteId' => '',
            'merchantKey' => '',
        ];
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

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\PurchaseRequest', $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Cayan\Message\RefundRequest', $parameters);
    }
}

