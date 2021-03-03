<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace CertificateTest\Service;

use Certificate\Repository\CertificateRepository;
use Certificate\Service\CertificateService;
use Certificate\Model\BonusCertificate;
use Certificate\Model\Currency;
use Certificate\Model\Price;
use Certificate\Model\GuaranteeCertificate;
use Certificate\Model\Issuer;
use Certificate\Model\IssuingPrice;
use Certificate\Model\StandardCertificate;
use Certificate\Model\TradingMarket;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class CertificateServiceTest extends AbstractHttpControllerTestCase
{
    /**
     * @var CertificateService
     */
    private $certificateService;
    private $certificateRepository;

    public function setUp() : void
    {
        $this->certificateRepository = $this->createMock(CertificateRepository::class);
        $this->certificateService = new CertificateService($this->certificateRepository);
        parent::setUp();
    }

    public function testGetAllCertificates()
    {
        $certificateData = $this->getCertificatesData();

        $this->certificateRepository
            ->expects($this->once())
            ->method('getAllCertificates')
            ->willReturn($certificateData);

        $actual = $this->certificateService->getAllCertificates();

        $this->assertSame($certificateData, $actual);
    }

    public function testGetOneCertificate()
    {
        $certificateId = 'CODE-1000';
        $certificateData = $this->getCertificatesData()[$certificateId];

        $this->certificateRepository
            ->expects($this->once())
            ->method('getCertificate')
            ->with($certificateId)
            ->willReturn($certificateData);

        $actual = $this->certificateService->getCertificate($certificateId);

        $this->assertSame($certificateData, $actual);
    }

    /**
     * @return array
     */
    private function getCertificatesData(): array
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
}
