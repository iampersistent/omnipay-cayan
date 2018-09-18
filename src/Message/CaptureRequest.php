<?php

namespace Omnipay\Cayan\Message;

class CaptureRequest extends AbstractRequest
{
    public function getData()
    {
        $data = null;

        if ($this->getTransactionReference()) {

            $transactionReference = simplexml_load_string($this->getTransactionReference())->children('http://www.w3.org/2003/05/soap-envelope')->Body->children();
            $cardReference = $transactionReference->AuthorizeResponse->AuthorizeResult;

            $request = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
    <soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope"></soap:Envelope>');
            $res_add_cc = $request->addChild('soap:Body');
            $res_add_cc2 = $res_add_cc->addChild('Capture','','http://schemas.merchantwarehouse.com/merchantware/v45/');

            $res_add_cc3 = $res_add_cc2->addChild('Credentials','');
            $res_add_cc3->addChild('MerchantName', $this->getMerchantName());
            $res_add_cc3->addChild('MerchantSiteId',$this->getMerchantSiteId());
            $res_add_cc3->addChild('MerchantKey',$this->getMerchantKey());

            $res_add_cc4 = $res_add_cc2->addChild('Request','');
            $res_add_cc4->addChild('Token',$cardReference->Token);
            $res_add_cc4->addChild('Amount',$cardReference->Amount);
            $res_add_cc4->addChild('EnablePartialAuthorization','False');
            $res_add_cc4->addChild('ForceDuplicate','False');

            $data = $request->asXML();
        }

        return preg_replace('/\n/', ' ', $data);
    }
}

