<?php

declare(strict_types = 1);

namespace afashio\ymlImport\Readers;


use afashio\ymlImport\Entities\CategoryEntity;
use afashio\ymlImport\Entities\CurrencyEntity;
use afashio\ymlImport\Entities\ProductEntity;
use afashio\ymlImport\Interfaces\FeedReaderInterface;

class FeedReader implements FeedReaderInterface
{
    /**
     * @var string
     */
    protected $dataProviderID;

    /**
     * @var string
     */
    private $dataURL;
    /**
     * @var \afashio\ymlImport\Interfaces\Mappers\YmlProductMapperInterface
     */
    private $productMapper;
    /**
     * @var \afashio\ymlImport\Interfaces\Mappers\YmlCategoryMapperInterface
     */
    private $categoryMapper;
    /**
     * @var \afashio\ymlImport\Interfaces\Mappers\YmlCurrencyMapperInterface
     */
    private $currencyMapper;
    /**
     * @var string
     */
    private $filePath;
    /**
     * @var string
     */
    private $fileName;
    /**
     * @var \SimpleXMLElement
     */
    private $rawData;
    /**
     * @var \afashio\ymlImport\Entities\CategoryEntity[]
     */
    private $categories;
    /**
     * @var \afashio\ymlImport\Entities\ProductEntity[]
     */
    private $products;
    /**
     * @var \afashio\ymlImport\Entities\CurrencyEntity[]
     */
    private $currencies;

    /**
     * FeedReader constructor.
     *
     * @param string                                                $dataURL
     * @param string                                                $dataProviderID
     * @param \afashio\ymlImport\Interfaces\Mappers\YmlProductMapperInterface  $productMapper
     * @param \afashio\ymlImport\Interfaces\Mappers\YmlCategoryMapperInterface $categoryMapper
     * @param \afashio\ymlImport\Interfaces\Mappers\YmlCurrencyMapperInterface $currencyMapper
     */
    public function __construct(
        string $dataURL,
        string $dataProviderID,
        \afashio\ymlImport\Interfaces\Mappers\YmlProductMapperInterface $productMapper,
        \afashio\ymlImport\Interfaces\Mappers\YmlCategoryMapperInterface $categoryMapper,
        \afashio\ymlImport\Interfaces\Mappers\YmlCurrencyMapperInterface $currencyMapper
    ) {
        $this->dataURL = $dataURL;
        $this->productMapper = $productMapper;
        $this->categoryMapper = $categoryMapper;
        $this->dataProviderID = $dataProviderID;
        $this->currencyMapper = $currencyMapper;
    }

    /**
     * @return string
     */
    public function getFilePath(): string
    {
        return $this->filePath ?? \Yii::getAlias('@app/runtime') . '/feed/' . $this->getFileName();
    }

    /**
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        $this->filePath = $filePath;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName ?? 'import.xml';
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName): void
    {
        $this->fileName = $fileName;
    }

    /**
     * @return void
     */
    public function getData(): void
    {
        file_put_contents(
            \Yii::getAlias('@app/runtime') . '/feed/' . $this->getFileName(),
            file_get_contents($this->dataURL)
        );
    }

    public function parse()
    {
//        $this->getData();
        $this->setRawData();
        $this->parseCurrencies($this->rawData->shop->currencies->children());
        $this->parseCategories($this->rawData->shop->categories->children());
        $this->parseProducts($this->rawData->shop->offers->children());
    }

    /**
     * @return CategoryEntity[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @return \afashio\ymlImport\Entities\ProductEntity[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return \afashio\ymlImport\Entities\CurrencyEntity[]
     */
    public function getCurrencies(): array
    {
        return $this->currencies;
    }



    /**
     * @param \SimpleXMLElement $currencies
     */
    private function parseCurrencies(\SimpleXMLElement $currencies): void
    {
        foreach ($currencies as $currency) {
            $currencyEntity = new CurrencyEntity();
            $currencyEntity->setCurrencyID($this->currencyMapper->getCurrencyID($currency));
            $currencyEntity->setRate($this->currencyMapper->getCurrencyRate($currency));
            $this->addCurrency($currencyEntity);
        }
    }

    /**
     * @param \afashio\ymlImport\Entities\CurrencyEntity $currencyEntity
     */
    private function addCurrency(CurrencyEntity $currencyEntity): void
    {
        $this->currencies[] = $currencyEntity;
    }

    /**
     * @param null|string $externalID
     *
     * @return null|string
     */
    private function createExternalID(?string $externalID): ?string
    {
        $result = null;
        if ($externalID) {
            $result = $this->dataProviderID . '-' . $externalID;
        }

        return $result;
    }

    /**
     * Sets raw data from file;
     */
    private function setRawData(): void
    {
        $this->rawData = simplexml_load_string(file_get_contents($this->getFilePath()));
    }

    /**
     * @param \SimpleXMLElement $categories
     */
    private function parseCategories(\SimpleXMLElement $categories): void
    {
        foreach ($categories as $category) {
            $categoryEntity = new CategoryEntity();
            $categoryEntity->setExternalID($this->createExternalID($this->categoryMapper->getExternalID($category)));
            $categoryEntity->setSlug($this->categoryMapper->getSlug($category));
            $categoryEntity->setName($this->categoryMapper->getName($category));
            $categoryEntity->setParentCategoryID(
                $this->createExternalID(
                    $this->categoryMapper->getParentCategoryID($category)
                )
            );
            $this->addCategory($categoryEntity);
        }
    }

    /**
     * @param \SimpleXMLElement $products
     *
     * @return void
     */
    private function parseProducts(\SimpleXMLElement $products): void
    {
        foreach ($products as $product) {
            $productEntity = new ProductEntity();
            $productEntity->setExternalID($this->createExternalID($this->productMapper->getExternalID($product)));
            $productEntity->setPrice($this->productMapper->getPrice($product));
            $productEntity->setName($this->productMapper->getName($product));
            $productEntity->setCategoryID($this->createExternalID($this->productMapper->getCategoryId($product)));
            $productEntity->setCurrency($this->productMapper->getCurrency($product));
            $productEntity->setSlug($this->productMapper->getSlug($product));
            $productEntity->setDescription($this->productMapper->getDescription($product));
            $productEntity->setVendor($this->productMapper->getVendor($product));
            $productEntity->setPictures($this->productMapper->getImages($product));
            $this->addProduct($productEntity);
        }
    }

    /**
     * @param \afashio\ymlImport\Entities\CategoryEntity $categoryEntity
     *
     * @return void
     */
    private function addCategory(CategoryEntity $categoryEntity): void
    {
        $this->categories[] = $categoryEntity;
    }

    /**
     * @param \afashio\ymlImport\Entities\ProductEntity $product
     */
    private function addProduct(ProductEntity $product): void
    {
        $this->products[] = $product;
    }

}