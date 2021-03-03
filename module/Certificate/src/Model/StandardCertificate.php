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
    private $price;

    public function __construct(
        string $isin,
        TradingMarket $tradingMarket,
        Currency $currency,
        Issuer $issuer,
        Price $price
    )
    {
        $this->isin = $isin;
        $this->tradingMarket = $tradingMarket;
        $this->currency = $currency;
        $this->issuer = $issuer;
        $this->price = $price;
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
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @param Price $price
     */
    public function setPrice(Price $price): void
    {
        $this->price = $price;
    }
}