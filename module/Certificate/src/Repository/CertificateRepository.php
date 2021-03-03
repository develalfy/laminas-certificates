<?php


namespace Certificate\Repository;


use Certificate\Model\BonusCertificate;
use Certificate\Model\Currency;
use Certificate\Model\CurrentPrice;
use Certificate\Model\GuaranteeCertificate;
use Certificate\Model\Issuer;
use Certificate\Model\IssuingPrice;
use Certificate\Model\StandardCertificate;
use Certificate\Model\TradingMarket;

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