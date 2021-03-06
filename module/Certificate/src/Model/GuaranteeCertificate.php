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
        Price $issuingPrice,
        Price $currentPrice,
        int $participationRate
    )
    {
        parent::__construct($isin, $tradingMarket, $currency, $issuer, $issuingPrice, $currentPrice);
        $this->participationRate = $participationRate;
    }

    /**
     * @return int
     */
    public function getParticipationRate()
    {
        return $this->participationRate;
    }

    /**
     * @param int $participationRate
     */
    public function setParticipationRate(int $participationRate): void
    {
        $this->participationRate = $participationRate;
    }

    /**
     * @return array
     */
    public function prepareToView(): array
    {
        $additional = [
            'participation_rate' => $this->getParticipationRate()
        ];

        return parent::prepareToView() + $additional;
    }
}