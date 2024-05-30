<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldFilterHeader;
use SilverStripe\Forms\GridField\GridFieldPaginator;

class VenueList extends Page
{
    private static $has_many = [
        'Venues' => Venue::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Add GridField for Venues
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldFilterHeader());
        $config->addComponent(new GridFieldPaginator(10));

        $fields->addFieldToTab('Root.Venues', GridField::create(
            'Venues',
            'List of Venues',
            $this->Venues(),
            $config
        ));

        return $fields;
    }
}