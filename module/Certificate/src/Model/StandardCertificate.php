<?php


namespace Certificate\Model;


class StandardCertificate implements CertificateInterface
{
    /**
     * @var int
     */
    private $isin;
    /**
     * @var TradingMarket
     */
    private $tradingMarket;
    /**
     * @var Currency
     */
    private $currency;
    /**
     * @var Issuer
     */
    private $issuer;
    /**
     * @var Price
     */
    private $issuingPrice;
    /**
     * @var Price
     */
    private $currentPrice;

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

    public function addPrice(array $priceArray): Price
    {
        return new Price($priceArray);
    }
}