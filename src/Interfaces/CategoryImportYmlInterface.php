<?php


namespace afashio\ymlImport\Interfaces;



interface CategoryImportYmlInterface
{

    /**
     * @param string $slug
     * @return self|\yii\db\ActiveRecord|null
     */
    public static function getModelBySlug($slug);
}