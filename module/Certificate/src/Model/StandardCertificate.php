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
     * @var array
     */
    private $prices;

    public function __construct(
        string $isin,
        TradingMarket $tradingMarket,
        Currency $currency,
        Issuer $issuer,
        array $prices
    )
    {
        $this->isin = $isin;
        $this->tradingMarket = $tradingMarket;
        $this->currency = $currency;
        $this->issuer = $issuer;
        $this->prices = $prices;
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
     * @return array
     */
    public function getPrices(): array
    {
        return $this->prices;
    }

    /**
     * @param array $prices
     */
    public function setPrices(array $prices): void
    {
        $this->prices = $prices;
    }
}