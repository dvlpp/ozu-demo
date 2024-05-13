<?php

namespace App\Models;

use Code16\OzuClient\Eloquent\OzuModel;
use Code16\OzuClient\Eloquent\Media;
use Code16\OzuClient\OzuCms\Form\OzuField;
use Code16\OzuClient\OzuCms\OzuCollectionFormConfig;
use Code16\OzuClient\OzuCms\OzuCollectionListConfig;
use Code16\OzuClient\OzuCms\OzuCollectionConfig;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Code16\OzuClient\OzuCms\List\OzuColumn;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Project extends OzuModel
{
    use HasFactory;

    protected array $ozuCustomAttributes = [
        'place',
        'year',
        'date'
    ];

    public function visuals(): MorphMany
    {
        return $this->morphMany(Media::class, 'model')
            ->where('model_key', 'visuals')
            ->orderBy('order');
    }

    public function thumb(): MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('model_key', 'thumb');
    }

    protected function url(): Attribute
    {
        return Attribute::make(get: function () {
            return route('projects.show', $this, absolute: false);
        });
    }

    public static function configureOzuCollection(OzuCollectionConfig $config): OzuCollectionConfig
    {
        return $config
            ->setLabel('Projects')
            ->setIcon('fa-ruler-combined')
            ->setHasPublicationState()
            ->setIsCreatable()
            ->setIsDeletable(false);
    }

    public static function configureOzuCollectionList(OzuCollectionListConfig $config): OzuCollectionListConfig
    {
        return $config
            ->addColumn(OzuColumn::makeImage('cover', 1))
            ->addColumn(OzuColumn::makeText('title', 4)->setLabel('Title'))
            ->addColumn(OzuColumn::makeText('place', 3)->setLabel('Place'))
            ->addColumn(OzuColumn::makeText('year', 3)->setLabel('Year'))
            ->setIsSearchable()
            ->setIsReorderable();
    }

    public static function configureOzuCollectionForm(OzuCollectionFormConfig $config): OzuCollectionFormConfig
    {
        return $config
            ->addCustomField(
                OzuField::makeText('place')
                    ->setLabel('Place')
                    ->setValidationRules(['required'])
            )
            ->addCustomField(
                OzuField::makeText('year')
                    ->setLabel('Year')
                    ->setValidationRules(['required', 'integer'])
                    ->setHelpMessage('Year of the project')
            )
            ->addCustomField(
                OzuField::makeImage('thumb')
                    ->setLabel('Thumbnail')
                    ->setHelpMessage('Optional, cover will be used by default.')
            )
            ->addCustomField(
                OzuField::makeImageList('visuals')
                    ->setLabel('Visuals')
                    ->setMaxItems(5)
            );
    }
}
