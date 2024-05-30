<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\LiteralField;
use SilverStripe\Forms\HeaderField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class VenueInfo extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)',
        'Description' => 'HTMLText',
    ];

    private static $has_one = [
        'Venue' => 'Venue',
    ];

    private static $summary_fields = [
        'Title' => 'Title',
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            HeaderField::create('VenueInfoDetails', 'Venue Info Details'),
            TextField::create('Title', 'Title'),
            HTMLEditorField::create('Description', 'Description')
        );

        return $fields;
    }
}