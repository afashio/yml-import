<?php
/**
 * Copyright (c) 2020. 
 * @package  afashio\ymlImport\Interfaces\Mappers
 * @author afashio
 */

namespace afashio\ymlImport\Interfaces\Mappers;

/**
 * Interface YmlCurrencyMapperInterface
 *
 * @package afashio\ymlImport\Interfaces\Mappers
 */
interface YmlCurrencyMapperInterface
{
    /**
     * @param \SimpleXMLElement $currency
     *
     * @return string
     */
    public function getCurrencyID(\SimpleXMLElement $currency):string;

    /**
     * @param \SimpleXMLElement $currency
     *
     * @return float
     */
    public function getCurrencyRate(\SimpleXMLElement $currency):float;
}