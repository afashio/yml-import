<?php

namespace afashio\ymlImport\Entities;

/**
 * Class CategoryEntity
 *
 * @package afashio\ymlImport\Entities
 */
class CategoryEntity
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
    private $parentCategoryID;
    /**
     * @var string
     */
    private $description;

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
     * @return null|string
     */
    public function getParentCategoryID(): ?string
    {
        return $this->parentCategoryID;
    }

    /**
     * @param null|string $parentCategoryID
     */
    public function setParentCategoryID(?string $parentCategoryID): void
    {
        $this->parentCategoryID = $parentCategoryID;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
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




}