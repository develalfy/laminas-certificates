<?php


namespace Certificate\Model;


class IssuingPrice
{
    /**
     * @var float
     */
    private $amount;
    /**
     * @var Currency
     */
    private $currency;
    /**
     * @var string
     */
    private $timestamp;

    public function __construct(float $amount, Currency $currency, string $timestamp)
    {
        $this->amount = $amount;
        $this->currency = $currency;
        $this->timestamp = $timestamp;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
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
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @param string $timestamp
     */
    public function setTimestamp(string $timestamp): void
    {
        $this->timestamp = $timestamp;
    }
}