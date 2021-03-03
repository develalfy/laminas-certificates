<?php


namespace Certificate\Model;


class Currency
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $symbol;

    /**
     * Currency constructor.
     * @param string $name
     * @param string $symbol
     */
    public function __construct(string $name, string $symbol)
    {
        $this->name = $name;
        $this->symbol = $symbol;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }
}