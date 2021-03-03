<?php


namespace Certificate\Repository;


use Certificate\Model\BonusCertificate;
use Certificate\Model\CertificateInterface;
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
     * @param null $isin
     * @return array
     */
    private function getData($isin = null): array
    {
        return [
            'CODE-1000' => new StandardCertificate(
                'CODE-1000',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice()
            ),
            'CODE-2000' => new BonusCertificate(
                'CODE-2000',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice(),
                12.99
            ),
            'CODE-3000' => new GuaranteeCertificate(
                'CODE-3000',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice(),
                5
            ),
        ];
    }

    /**
     * @return array
     */
    public function getAllCertificates(): array
    {
        return $this->getData();
    }

    /**
     * @param string $id
     * @return CertificateInterface
     */
    public function getCertificate(string $id): CertificateInterface
    {
        return $this->getData()[$id];
    }
}