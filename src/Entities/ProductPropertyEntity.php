<?php
/**
 * Copyright (c) 2020.
 * @package  afashio\ymlImport\Entities
 * @author afashio
 */

namespace afashio\ymlImport\Entities;

/**
 * Class ProductPropertiesEntity
 *
 * @package afashio\ymlImport\Entities
 */
class ProductPropertyEntity
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $value;
    /**
     * @var string
     */
    private $productID;

    /**
     * ProductPropertyEntity constructor.
     *
     * @param string $name
     * @param string $value
     * @param string $productID
     */
    public function __construct(string $name, string $value, string $productID)
    {
        $this->name = $name;
        $this->value = $value;
        $this->productID = $productID;
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
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getProductID(): string
    {
        return $this->productID;
    }

    /**
     * @param string $productID
     */
    public function setProductID(string $productID): void
    {
        $this->productID = $productID;
    }



}