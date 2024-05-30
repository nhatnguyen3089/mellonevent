<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class TourArtist extends DataObject
{
    private static $db = [
        'Title' => 'Varchar(255)',
        'Description' => 'HTMLText',
    ];

    private static $has_one = [
        'Tour' => 'Tour',
		'Image' => 'SilverStripe\Assets\Image',
    ];
	
	private static $summary_fields = [
        'Title' => 'Title',
		'Image' => 'Image',
	];

    public function getCMSFields()
    {
        $fields = FieldList::create(
            TextField::create('Title'),
            HTMLEditorField::create('Description'),
			UploadField::create('Image')->setFolderName('TourArtist')
        );

        return $fields;
    }
}