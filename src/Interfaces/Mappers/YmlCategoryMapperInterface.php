<?php


namespace afashio\ymlImport\Interfaces\Mappers;


use SimpleXMLElement;

/**
 * Interface YmlCategoryMapperInterface
 *
 * @package afashio\ymlImport\Interfaces\Mappers
 */

interface YmlCategoryMapperInterface
{
    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getDescription(SimpleXMLElement $category): string;

    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getExternalID(SimpleXMLElement $category): string;

    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getName(SimpleXMLElement $category): string;

    /**
     * @param \SimpleXMLElement $category
     *
     * @return null|string
     */
    public function getParentCategoryID(SimpleXMLElement $category): ?string;

    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getSlug(SimpleXMLElement $category): string;

}