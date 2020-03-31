<?php
/**
 * Copyright (c) 2020.
 *
 * @package  afashio\ymlImport\Services
 * @author afashio
 */

namespace afashio\ymlImport\Services;

use afashio\ymlImport\Interfaces\Mappers\YmlCurrencyMapperInterface;

/**
 * Class CurrencyMapperService
 *
 * @package afashio\ymlImport\Services
 */
abstract class CurrencyMapperService implements YmlCurrencyMapperInterface
{

    /**
     * @inheritDoc
     */
    public function getCurrencyID(\SimpleXMLElement $currency): string
    {
        $attributes = $currency->attributes();

        return trim((string)$attributes['id']);
    }

    /**
     * @inheritDoc
     */
    public function getCurrencyRate(\SimpleXMLElement $currency): float
    {
        $attributes = $currency->attributes();

        return (float)$attributes['rate'];
    }
}