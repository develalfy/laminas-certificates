<?php


namespace Certificate\Model;


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
        Price $currentPrice,
        int $participationRate
    )
    {
        parent::__construct($isin, $tradingMarket, $currency, $issuer, $currentPrice);
        $this->participationRate = $participationRate;
    }
}