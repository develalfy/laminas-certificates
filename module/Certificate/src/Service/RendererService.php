<?php


namespace Certificate\Service;


use Certificate\Model\CertificateInterface;
use Certificate\Model\GuaranteeCertificate;
use Exception;
use Laminas\View\Model\ViewModel;
use SimpleXMLElement;

class RendererService
{
    public function displayAsHtml(CertificateInterface $certificate): ViewModel
    {
        return new ViewModel(['certificate' => $certificate]);
    }

    public function displayAsXml(CertificateInterface $certificate)
    {
        if ($certificate instanceof GuaranteeCertificate) {
            throw new Exception('Sorry, you are trying to access a Guarantee Certificate as XML.');
        }

        $xmlDoc = new SimpleXMLElement('<Certificate></Certificate>');
        $child = $xmlDoc->addChild('test');
        $child->addAttribute('attr1', 'attrVal' );

        return $xmlDoc->asXML();
    }
}