<?php


namespace Certificate\Model;


class BonusCertificate extends StandardCertificate
{
    /**
     * @var float
     */
    private $barrierLevel;

    protected $isBarrierLevelHit = false;

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
        if ($currentPrice->getAmount() >= $this->barrierLevel) {
            $this->isBarrierLevelHit = true;
        }
    }

    public function addPrice(Price $price): array
    {
        if ($price->getAmount() >= $this->barrierLevel)
        {
            $this->isBarrierLevelHit = true;
        }

        return parent::addPrice($price);
    }

    /**
     * @return bool
     */
    public function isBarrierLevelHit(): bool
    {
        return $this->isBarrierLevelHit;
    }
}