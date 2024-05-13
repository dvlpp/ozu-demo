<?php

namespace App\Models;

use Code16\OzuClient\Eloquent\OzuModel;
use Code16\OzuClient\OzuCms\Form\OzuField;
use Code16\OzuClient\OzuCms\OzuCollectionFormConfig;
use Code16\OzuClient\OzuCms\OzuCollectionListConfig;
use Code16\OzuClient\OzuCms\OzuCollectionConfig;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Code16\OzuClient\OzuCms\List\OzuColumn;

class Page extends OzuModel
{
    use HasFactory;

    protected array $ozuCustomAttributes = [
        'key',
    ];

    public static function configureOzuCollection(OzuCollectionConfig $config): OzuCollectionConfig
    {
        return $config
            ->setLabel('Pages')
            ->setIcon('fa-file')
            ->setHasPublicationState();
    }

    public static function configureOzuCollectionList(OzuCollectionListConfig $config): OzuCollectionListConfig
    {
        return $config
            ->addColumn(OzuColumn::makeImage('cover', 1))
            ->addColumn(OzuColumn::makeText('title', 4)->setLabel('Title'));
    }

    public static function configureOzuCollectionForm(OzuCollectionFormConfig $config): OzuCollectionFormConfig
    {
        return $config
            ->addCustomField(
                OzuField::makeText('key')
                    ->setLabel('Key')
            );
    }
}
