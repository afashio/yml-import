<?php

namespace afashio\ymlImport\Interfaces\Mappers;

/**
 * Interface YmlProductMapperInterface
 *
 * @package afashio\ymlImport\Interfaces\Mappers
 */
interface YmlProductMapperInterface
{

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getCategoryId(\SimpleXMLElement $product): string;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getCurrency(\SimpleXMLElement $product): string;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getDescription(\SimpleXMLElement $product): string;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getExternalID(\SimpleXMLElement $product): string;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return array
     */
    public function getImages(\SimpleXMLElement $product): array;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getName(\SimpleXMLElement $product): string;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return float
     */
    public function getPrice(\SimpleXMLElement $product): float;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return array
     */
    public function getProperties(\SimpleXMLElement $product): array;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getSku(\SimpleXMLElement $product): string;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getSlug(\SimpleXMLElement $product): string;

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getVendor(\SimpleXMLElement $product): string;
}