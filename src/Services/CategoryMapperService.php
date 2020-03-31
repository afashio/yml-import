<?php
/**
 * Copyright (c) 2020.
 * @package  afashio\ymlImport\Services
 * @author afashio
 */

namespace afashio\ymlImport\Services;


use afashio\ymlImport\Interfaces\Mappers\YmlCategoryMapperInterface;
use SimpleXMLElement;
use yii\helpers\BaseInflector;

/**
 * Class SolarCategoryMapperService
 *
 * @package afashio\ymlImport\Services
 */
abstract class CategoryMapperService implements YmlCategoryMapperInterface
{
    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getDescription(SimpleXMLElement $category): string
    {
        return (string)$category->description;
    }

    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getExternalID(SimpleXMLElement $category): string
    {
        $attributes = $category->attributes();
        return (string)$attributes['id'];
    }

    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getName(SimpleXMLElement $category): string
    {
        return (string)$category;
    }

    /**
     * @param \SimpleXMLElement $category
     *
     * @return null|string
     */
    public function getParentCategoryID(SimpleXMLElement $category): ?string
    {
        $attributes = $category->attributes();
        return isset($attributes['parentId']) ? (string)$attributes['parentId'] : null;
    }

    /**
     * @param \SimpleXMLElement $category
     *
     * @return string
     */
    public function getSlug(SimpleXMLElement $category): string
    {
        return BaseInflector::slug($this->getName($category));
    }

}