<?php
declare(strict_types = 1);

namespace afashio\ymlImport\Entities;

/**
 * Class ProductEntity
 *
 * @package afashio\ymlImport\Entities
 */
class ProductEntity
{
    /**
     * @var string
     */
    private $externalID;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var string
     */
    private $categoryID;
    /**
     * @var string
     */
    private $description;
    /**
     * @var null|string
     */
    private $sku = null;
    /**
     * @var string
     */
    private $currency;
    /**
     * @var float
     */
    private $price;
    /**
     * @var string
     */
    private $vendor;
    /**
     * @var array
     */
    private $pictures = [];
    /**
     * @var array
     */
    private $properties = [];

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param array $properties
     */
    public function setProperties(array $properties): void
    {
        $this->properties = $properties;
    }

    /**
     * @return array
     */
    public function getPictures(): array
    {
        return $this->pictures;
    }

    /**
     * @param array $pictures
     */
    public function setPictures(array $pictures): void
    {
        $this->pictures = $pictures;
    }

    /**
     * @return string
     */
    public function getExternalID(): string
    {
        return $this->externalID;
    }

    /**
     * @param string $externalID
     */
    public function setExternalID(string $externalID): void
    {
        $this->externalID = $externalID;
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
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getCategoryID(): string
    {
        return $this->categoryID;
    }

    /**
     * @param string $categoryID
     */
    public function setCategoryID(string $categoryID): void
    {
        $this->categoryID = $categoryID;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return null|string
     */
    public function getSku(): ?string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku): void
    {
        $this->sku = $sku;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getVendor(): string
    {
        return $this->vendor;
    }


    /**
     * @param string $vendor
     */
    public function setVendor(string $vendor): void
    {
        $this->vendor = $vendor;
    }

}