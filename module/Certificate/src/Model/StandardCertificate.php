<?php


namespace Certificate\Model;

class StandardCertificate implements CertificateInterface
{
    /**
     * @var int
     */
    protected $isin;
    /**
     * @var TradingMarket
     */
    protected $tradingMarket;
    /**
     * @var Currency
     */
    protected $currency;
    /**
     * @var Issuer
     */
    protected $issuer;
    /**
     * @var Price
     */
    protected $issuingPrice;
    /**
     * @var Price
     */
    protected $currentPrice;

    /**
     * @var array
     */
    protected $prices = [];

    public function __construct(
        string $isin,
        TradingMarket $tradingMarket,
        Currency $currency,
        Issuer $issuer,
        Price $issuingPrice,
        Price $currentPrice
    )
    {
        $this->isin = $isin;
        $this->tradingMarket = $tradingMarket;
        $this->currency = $currency;
        $this->issuer = $issuer;
        $this->issuingPrice = $issuingPrice;
        $this->currentPrice = $currentPrice;
        $this->prices[] = $this->issuingPrice;
        $this->prices[] = $this->currentPrice;
    }

    /**
     * @param Price $price
     * @return Price[]
     */
    public function addPrice(Price $price): array
    {
        $this->prices[] = $price;
        if ($price->getTimestamp() > $this->currentPrice->getTimestamp()) {
            $this->setCurrentPrice($price);
        }

        return $this->getPrices();
    }

    /**
     * @return Price[]
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @return string
     */
    public function getIsin(): string
    {
        return $this->isin;
    }

    /**
     * @param int $isin
     */
    public function setIsin(int $isin): void
    {
        $this->isin = $isin;
    }

    /**
     * @return TradingMarket
     */
    public function getTradingMarket(): TradingMarket
    {
        return $this->tradingMarket;
    }

    /**
     * @param TradingMarket $tradingMarket
     */
    public function setTradingMarket(TradingMarket $tradingMarket): void
    {
        $this->tradingMarket = $tradingMarket;
    }

    /**
     * @return Currency
     */
    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    /**
     * @param Currency $currency
     */
    public function setCurrency(Currency $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return Issuer
     */
    public function getIssuer(): Issuer
    {
        return $this->issuer;
    }

    /**
     * @param Issuer $issuer
     */
    public function setIssuer(Issuer $issuer): void
    {
        $this->issuer = $issuer;
    }

    /**
     * @return Price
     */
    public function getIssuingPrice(): Price
    {
        return $this->issuingPrice;
    }

    /**
     * @param Price $issuingPrice
     */
    public function setIssuingPrice(Price $issuingPrice): void
    {
        $this->issuingPrice = $issuingPrice;
    }

    /**
     * @return Price
     */
    public function getCurrentPrice(): Price
    {
        return $this->currentPrice;
    }

    /**
     * @param Price $currentPrice
     */
    public function setCurrentPrice(Price $currentPrice): void
    {
        $this->currentPrice = $currentPrice;
    }

    /**
     * @return array
     */
    public function prepareToView(): array
    {
        $priceHistory = $this->preparePriceHistory($this->prices);

        return [
            'isin' => $this->getIsin(),
            'trading_market_name' => $this->getTradingMarket()->getName(),
            'trading_market_phone' => $this->getTradingMarket()->getPhone(),
            'currency_name' => $this->getCurrency()->getName(),
            'currency_symbol' => $this->getCurrency()->getSymbol(),
            'issuer_name' => $this->getIssuer()->getName(),
            'issuing_price_amount' => $this->getIssuingPrice()->getAmount(),
            'issuing_price_currency_name' => $this->getIssuingPrice()->getCurrency()->getName(),
            'issuing_price_currency_symbol' => $this->getIssuingPrice()->getCurrency()->getSymbol(),
            'issuing_price_timestamp' => $this->getIssuingPrice()->getTimestamp(),
            'current_price_amount' => $this->getCurrentPrice()->getAmount(),
            'current_price_currency_name' => $this->getCurrentPrice()->getCurrency()->getName(),
            'current_price_currency_symbol' => $this->getCurrentPrice()->getCurrency()->getSymbol(),
            'current_price_timestamp' => $this->getCurrentPrice()->getTimestamp(),
            'price_history' => $priceHistory
        ];
    }

    private function preparePriceHistory(array $prices): array
    {
        $pricesArray = [];

        foreach ($prices as $key => $value) {
            $pricesArray[$key]['amount'] = $value->getAmount();
            $pricesArray[$key]['currency_name'] = $value->getCurrency()->getName();
            $pricesArray[$key]['currency_symbol'] = $value->getCurrency()->getSymbol();
            $pricesArray[$key]['timestamp'] = $value->getTimestamp();
        }

        return $pricesArray;
    }
}