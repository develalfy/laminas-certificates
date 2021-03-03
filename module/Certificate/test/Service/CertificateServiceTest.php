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

    public function testGetAll()
    {
        $certificateDate = [
            new StandardCertificate(
                'CODE-78958',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new Price()
            ),
            new BonusCertificate(
                'CODE-99665',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new Price(),
                88.99
            ),
            new GuaranteeCertificate(
                'CODE-12587',
                new TradingMarket(),
                new Currency(),
                new Issuer(),
                new IssuingPrice(),
                new Price(),
                9
            ),
        ];

        $this->certificateRepository
            ->expects($this->once())
            ->method('getAllCertificates')
            ->willReturn($certificateDate);

        $actual = $this->certificateService->getAllCertificates();

        $this->assertSame($certificateDate, $actual);
    }
}
