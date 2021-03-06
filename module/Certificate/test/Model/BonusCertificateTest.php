<?php

declare(strict_types=1);

namespace CertificateTest\Model;

use Certificate\Model\Currency;
use Certificate\Model\Issuer;
use Certificate\Model\Price;
use Certificate\Model\BonusCertificate;
use Certificate\Model\TermSheetDocument;
use Certificate\Model\TradingMarket;
use PHPUnit\Framework\TestCase;

class BonusCertificateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testGetPrices(): void
    {
        $initialPrices = [
            "issuing" => new Price(500.45, new Currency('USD Dollar', '$'), 1614978687),
            "current" => new Price(200.55, new Currency('USD Dollar', '$'), 1614805887),
        ];
        $newPrices = [
            "newPrice1" => new Price(
                505,
                new Currency('Dollar', '$'),
                1614805887
            ),
            "newPrice2" => new Price(
                501,
                new Currency('Dollar', '$'),
                1580681487
            )
        ];

        $certificate = new BonusCertificate(
            'CODE-1000',
            new TradingMarket('Market#1', '+20123456789'),
            new Currency('USD Dollar', '$'),
            new Issuer('Ashraf Elalfi'),
            $initialPrices['issuing'],
            $initialPrices['current'],
            new TermSheetDocument('http://www.orimi.com/pdf-test.pdf'),
            500.50
        );

        $prices = $certificate->addPrice($newPrices['newPrice1']);
        $prices = $certificate->addPrice($newPrices['newPrice2']);

        $this->assertEquals(array_values(array_merge($initialPrices, $newPrices)), $prices);
        $this->assertEquals(
            $newPrices['newPrice1']->getTimestamp(),
            $certificate->getCurrentPrice()->getTimestamp()
        );

        $this->assertEquals(true, $certificate->isBarrierLevelHit());
    }
}
