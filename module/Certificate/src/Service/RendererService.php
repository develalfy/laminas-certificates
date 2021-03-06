<?php


namespace Certificate\Service;


use Certificate\Model\CertificateInterface;
use Certificate\Model\GuaranteeCertificate;
use Laminas\Http\Exception\InvalidArgumentException;
use Laminas\View\Model\ViewModel;
use SimpleXMLElement;

class RendererService
{
    public function displayAsXml(CertificateInterface $certificate)
    {
        if ($certificate instanceof GuaranteeCertificate) {
            throw new InvalidArgumentException('Sorry, you are trying to access a Guarantee Certificate as XML.');
        }

        $xml = new SimpleXMLElement('<certificate></certificate>');

        foreach ($certificate->prepareToView() as $key => $value) {
            if (is_array($value)) {
                $this->prepareArrayChildren($xml, $key, $value);
            } else {
                $child = $xml->addChild($key);
                $child->addAttribute('value', $value);
            }
        }

        return $xml->asXML();
    }

    /**
     * @param SimpleXMLElement $xml
     * @param string $key
     * @param array $value
     * @return SimpleXMLElement
     */
    public function prepareArrayChildren(SimpleXMLElement $xml, string $key, array $value): SimpleXMLElement
    {
        $child = $xml->addChild($key);

        foreach ($value as $attrKey => $attrValue) {
            if (is_array($attrValue)) {
                $price = $child->addChild('element_' . $attrKey);
                foreach ($attrValue as $priceKey => $priceValue) {
                    $price->addAttribute($priceKey, $priceValue);
                }
            } else {
                $child->addAttribute($attrKey, $attrValue);
            }
        }

        return $child;
    }
}