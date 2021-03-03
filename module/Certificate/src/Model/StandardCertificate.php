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
     * @var IssuingPrice
     */
    private $issuingPrice;
    /**
     * @var CurrentPrice
     */
    private $currentPrice;

    public function __construct(
        string $isin,
        TradingMarket $tradingMarket,
        Currency $currency,
        Issuer $issuer,
        IssuingPrice $issuingPrice,
        CurrentPrice $currentPrice
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
     * @return int
     */
    public function getIsin(): int
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
     * @return IssuingPrice
     */
    public function getIssuingPrice(): IssuingPrice
    {
        return $this->issuingPrice;
    }

    /**
     * @param IssuingPrice $issuingPrice
     */
    public function setIssuingPrice(IssuingPrice $issuingPrice): void
    {
        $this->issuingPrice = $issuingPrice;
    }

    /**
     * @return CurrentPrice
     */
    public function getCurrentPrice(): CurrentPrice
    {
        return $this->currentPrice;
    }

    /**
     * @param CurrentPrice $currentPrice
     */
    public function setCurrentPrice(CurrentPrice $currentPrice): void
    {
        $this->currentPrice = $currentPrice;
    }
}