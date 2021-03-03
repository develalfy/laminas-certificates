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
use CertificateTest\Model\BonusCertificate;
use CertificateTest\Model\Currency;
use CertificateTest\Model\CurrentPrice;
use CertificateTest\Model\GuaranteeCertificate;
use CertificateTest\Model\Issuer;
use CertificateTest\Model\IssuingPrice;
use CertificateTest\Model\StandardCertificate;
use CertificateTest\Model\TradingMarket;
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

    public function testGetAll()
    {
        $certificateDate = [
            new StandardCertificate(
                'CODE-78958',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice()
            ),
            new BonusCertificate(
                'CODE-99665',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice(),
                88.99
            ),
            new GuaranteeCertificate(
                'CODE-12587',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new CurrentPrice(),
                9
            ),
        ];

        $this->certificateRepository
            ->expects($this->once())
            ->method('getAllCertificates')
            ->willReturn($certificateDate);

        $actual = $this->certificateService->getAllCertificates();

        $this->assertEquals($certificateDate, $actual);
    }
}
