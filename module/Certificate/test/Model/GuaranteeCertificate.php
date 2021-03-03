<?php


namespace CertificateTest\Model;


class GuaranteeCertificate extends StandardCertificate
{
    /**
     * @var float
     */
    private $participationRate;

    public function __construct(
        string $isin,
        TradingMarket $tradingMarket,
        Currency $currency,
        Issuer $issuer,
        IssuingPrice $issuingPrice,
        CurrentPrice $currentPrice,
        int $participationRate
    )
    {
        parent::__construct($isin, $tradingMarket, $currency, $issuer, $issuingPrice, $currentPrice);
        $this->participationRate = $participationRate;
    }
}