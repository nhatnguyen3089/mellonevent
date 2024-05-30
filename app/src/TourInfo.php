<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class TourInfo extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)',
        'Description' => 'HTMLText',
    ];

    private static $has_one = [
        'Tour' => 'Tour',
    ];
	
	private static $summary_fields = [
        'Title' => 'Title',
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title'),
            HTMLEditorField::create('Description')
        );

        return $fields;
    }
}