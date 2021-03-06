<?php


namespace Certificate\Model;


class BonusCertificate extends StandardCertificate
{
    protected $isBarrierLevelHit = false;
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
        DocumentInterface $document,
        float $barrierLevel
    )
    {
        parent::__construct($isin, $tradingMarket, $currency, $issuer, $issuingPrice, $currentPrice, $document);
        $this->barrierLevel = $barrierLevel;
        if ($currentPrice->getAmount() >= $this->barrierLevel) {
            $this->isBarrierLevelHit = true;
        }
    }

    public function addPrice(Price $price): array
    {
        if ($price->getAmount() >= $this->barrierLevel) {
            $this->isBarrierLevelHit = true;
        }

        return parent::addPrice($price);
    }

    /**
     * @return float
     */
    public function getBarrierLevel(): float
    {
        return $this->barrierLevel;
    }

    /**
     * @param float $barrierLevel
     */
    public function setBarrierLevel(float $barrierLevel): void
    {
        $this->barrierLevel = $barrierLevel;
    }

    /**
     * @return bool
     */
    public function isBarrierLevelHit(): bool
    {
        return $this->isBarrierLevelHit;
    }

    /**
     * @return array
     */
    public function prepareToView(): array
    {
        $additional = [
            'barrier_level' => $this->getBarrierLevel(),
            'reached_barrier_level' => $this->isBarrierLevelHit()
        ];

        return parent::prepareToView() + $additional;
    }
}