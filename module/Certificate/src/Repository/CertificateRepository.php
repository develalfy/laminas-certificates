<?php


namespace Certificate\Repository;


use CertificateTest\Model\BonusCertificate;
use CertificateTest\Model\Currency;
use CertificateTest\Model\CurrentPrice;
use CertificateTest\Model\GuaranteeCertificate;
use CertificateTest\Model\Issuer;
use CertificateTest\Model\IssuingPrice;
use CertificateTest\Model\StandardCertificate;
use CertificateTest\Model\TradingMarket;

class CertificateRepository implements CertificateRepositoryInterface
{
    /**
     * @return array
     */
    public function getAllCertificates(): array
    {
        return [
            new StandardCertificate(
                'CODE-123456789',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice()
            ),
            new BonusCertificate(
                'CODE-123456789',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice(),
                12.99
            ),
            new GuaranteeCertificate(
                'CODE-123456789',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice(),
                5
            ),
        ];
    }
}