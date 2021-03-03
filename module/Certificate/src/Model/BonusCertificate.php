<?php


namespace Certificate\Model;


class BonusCertificate extends StandardCertificate
{
    /**
     * @var float
     */
    private $barrierLevel;

    public function __construct(
        string $isin,
        TradingMarket $tradingMarket,
        Currency $currency,
        Issuer $issuer,
        Price $issuingPrice,
        Price $currentPrice,
        float $barrierLevel
    )
    {
        parent::__construct($isin, $tradingMarket, $currency, $issuer, $issuingPrice, $currentPrice);
        $this->barrierLevel = $barrierLevel;
    }
}