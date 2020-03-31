<?php
/**
 * Copyright (c) 2020.
 *
 * @package  afashio\ymlImport\Services
 * @author afashio
 */

namespace afashio\ymlImport\Services;


use afashio\ymlImport\Entities\ProductPropertyEntity;
use afashio\ymlImport\Interfaces\Mappers\YmlProductMapperInterface;
use yii\helpers\BaseInflector;

abstract class ProductMapperService implements YmlProductMapperInterface
{
    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getCategoryId(\SimpleXMLElement $product): string
    {
        return (string)$product->categoryId;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getCurrency(\SimpleXMLElement $product): string
    {
        return (string)$product->currencyId;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getDescription(\SimpleXMLElement $product): string
    {
        return (string)$product->description;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getExternalID(\SimpleXMLElement $product): string
    {
        $attributes = $product->attributes();

        return (string)$attributes['id'];
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return array
     */
    public function getImages(\SimpleXMLElement $product): array
    {
        $pictures = $product->picture;
        $picturesArray = [];
        if ($pictures && \is_array($pictures)) {
            foreach ($pictures as $picture) {
                $picturesArray[] = (string)$picture;
            }
        } elseif ($pictures) {
            $picturesArray[] = (string)$pictures;
        }

        return $picturesArray;

    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return array
     */
    public function getProperties(\SimpleXMLElement $product): array
    {
        $properties = $product->properties;
        $propertiesArray = [];
        if ($properties) {
            foreach ($properties as $property) {
                $propertyEntity = new ProductPropertyEntity(
                    (string)$property->name,
                    (string)$property->value,
                    $this->getExternalID($product)
                );
                $propertiesArray[] = $propertyEntity;
            }
        }

        return $propertiesArray;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getName(\SimpleXMLElement $product): string
    {
        return (string)$product;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return float
     */
    public function getPrice(\SimpleXMLElement $product): float
    {
        return (float)$product->price;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getSku(\SimpleXMLElement $product): string
    {
        return (string)$product->code;
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getSlug(\SimpleXMLElement $product): string
    {
        return BaseInflector::slug($this->getName($product));
    }

    /**
     * @param \SimpleXMLElement $product
     *
     * @return string
     */
    public function getVendor(\SimpleXMLElement $product): string
    {
        return (string)$product->vendor;
    }

}