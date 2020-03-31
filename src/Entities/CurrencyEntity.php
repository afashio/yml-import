<?php
/**
 * Copyright (c) 2020.
 * @package  afashio\ymlImport\Entities
 * @author afashio
 */

namespace afashio\ymlImport\Entities;

/**
 * Class CurrencyEntity
 *
 * @package afashio\ymlImport\Entities
 */
class CurrencyEntity
{
    /**
     * @var string
     */
    private $currencyID;
    /**
     * @var float
     */
    private $rate;

    /**
     * @return string
     */
    public function getCurrencyID(): string
    {
        return $this->currencyID;
    }

    /**
     * @param string $currencyID
     */
    public function setCurrencyID(string $currencyID): void
    {
        $this->currencyID = $currencyID;
    }

    /**
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate(float $rate): void
    {
        $this->rate = $rate;
    }



}