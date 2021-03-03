<?php


namespace Certificate\Repository;


use Certificate\Model\BonusCertificate;
use Certificate\Model\CertificateInterface;
use Certificate\Model\Currency;
use Certificate\Model\GuaranteeCertificate;
use Certificate\Model\Issuer;
use Certificate\Model\Price;
use Certificate\Model\StandardCertificate;
use Certificate\Model\TradingMarket;

class CertificateRepository implements CertificateRepositoryInterface
{
    /**
     * @return array
     */
    public function getAllCertificates(): array
    {
        return $this->getData();
    }

    /**
     * @return array
     */
    private function getData(): array
    {
        return [
            'CODE-1000' => new StandardCertificate(
                'CODE-1000',
                new TradingMarket('Market#1', '+20123456789'),
                new Currency('USD Dollar', '$'),
                new Issuer('Ashraf Elalfi'),
                [
                    'current_price' => new Price(500.45, new Currency('USD Dollar', '$'), '2022-06-20 00:00:01'),
                    'issuing_price' => new Price(200.55, new Currency('USD Dollar', '$'), '2022-06-10 00:00:01')
                ],
            ),
            'CODE-2000' => new BonusCertificate(
                'CODE-2000',
                new TradingMarket('Market#2', '+2012345645'),
                new Currency('USD Dollar', '$'),
                new Issuer('Ashraf Elalfi'),
                [
                    'current_price' => new Price(500.45, new Currency('USD Dollar', '$'), '2022-06-20 00:00:01'),
                    'issuing_price' => new Price(200.55, new Currency('USD Dollar', '$'), '2022-06-10 00:00:01')
                ],
                12.99
            ),
            'CODE-3000' => new GuaranteeCertificate(
                'CODE-3000',
                new TradingMarket('Market#3', '+20123787789'),
                new Currency('USD Dollar', '$'),
                new Issuer('Ashraf Elalfi'),
                [
                    'current_price' => new Price(500.45, new Currency('USD Dollar', '$'), '2022-06-20 00:00:01'),
                    'issuing_price' => new Price(200.55, new Currency('USD Dollar', '$'), '2022-06-10 00:00:01')
                ],
                8
            ),
            'CODE-4000' => new GuaranteeCertificate(
                'CODE-4000',
                new TradingMarket('Market#4', '+20123456459'),
                new Currency('USD Dollar', '$'),
                new Issuer('Ashraf Elalfi'),
                [
                    'current_price' => new Price(500.45, new Currency('USD Dollar', '$'), '2022-06-20 00:00:01'),
                    'issuing_price' => new Price(200.55, new Currency('USD Dollar', '$'), '2022-06-10 00:00:01')
                ],
                7
            ),
            'CODE-5000' => new StandardCertificate(
                'CODE-5000',
                new TradingMarket('Market#5', '+20123456782'),
                new Currency('USD Dollar', '$'),
                new Issuer('Ashraf Elalfi'),
                [
                    'current_price' => new Price(500.45, new Currency('USD Dollar', '$'), '2022-06-20 00:00:01'),
                    'issuing_price' => new Price(200.55, new Currency('USD Dollar', '$'), '2022-06-10 00:00:01')
                ]
            )
        ];
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