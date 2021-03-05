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

        return new \Laminas\Diactoros\Response\XmlResponse(
            "",
            200,
            ['Content-Type' => ['application/hal+xml']]
        );


        $xml = new SimpleXMLElement('<Certificate></Certificate>');
        $child = $child = $xml->addChild('name');
        $child->addAttribute('value', 'value');

        $view = new ViewModel();
        $view->setTerminal(true);
        return "xml";
        $view->resonse()->setContent(['aaa']);
        $this->layout()->setTerminal(true);

        return $this->response->setContent(['aa']);


//        var_dump($certificate);die();
        /*foreach ($certificate as $value) {
            if (is_array($value)) {
                $child = $certificateXml->addChild($key);
                foreach ($value as $attrName => $attrValue) {
                    $child->addAttribute($attrName, $attrValue);
                }
            } else {
                $child = $certificateXml->addChild($key);
                $child->addAttribute('value', $value);
            }
        }*/

        return new \Laminas\Diactoros\Response\XmlResponse(
            "",
            200,
            ['Content-Type' => ['application/hal+xml']]
        );

        return $xml->asXML();
    }
}