<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace CertificateTest\Service;

use Certificate\Model\BonusCertificate;
use Certificate\Model\GuaranteeCertificate;
use Certificate\Model\StandardCertificate;
use Certificate\Service\CertificateService;
use Certificate\Service\RendererService;
use Laminas\Http\Exception\InvalidArgumentException;
use Laminas\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use PHPUnit\Framework\MockObject\MockObject;

class RendererServiceTest extends AbstractHttpControllerTestCase
{
    /**
     * @var CertificateService
     */
    private $rendererService;
    /**
     * @var GuaranteeCertificate|MockObject
     */
    private $guaranteeCertificate;
    /**
     * @var StandardCertificate|MockObject
     */
    private $standardCertificate;
    /**
     * @var BonusCertificate|MockObject
     */
    private $bonusCertificate;

    public function setUp(): void
    {
        $this->guaranteeCertificate = $this->createMock(GuaranteeCertificate::class);
        $this->standardCertificate = $this->createMock(StandardCertificate::class);
        $this->bonusCertificate = $this->createMock(BonusCertificate::class);
        $this->rendererService = new RendererService();
        parent::setUp();
    }

    public function testDisplayAsXmlFailedForGuaranteeCertificateWithMessage()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage("Sorry, you are trying to access a Guarantee Certificate as XML.");

        $this->rendererService->displayAsXml($this->guaranteeCertificate);
    }

    public function testDisplayAsXmlSuccessWithStandardCertificate()
    {
        $xml = $this->rendererService->displayAsXml($this->standardCertificate);
        $expected = "<?xml version=\"1.0\"?>\n<certificate/>\n";

        $this->assertEquals($expected, $xml);
    }

    public function testDisplayAsXmlSuccessWithBonusCertificate()
    {
        $xml = $this->rendererService->displayAsXml($this->bonusCertificate);
        $expected = "<?xml version=\"1.0\"?>\n<certificate/>\n";

        $this->assertEquals($expected, $xml);
    }
}
