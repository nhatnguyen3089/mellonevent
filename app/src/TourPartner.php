<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class TourPartner extends DataObject
{
    private static $db = [];

    private static $has_one = [
		'Tour' => 'Tour',
		'Image' => 'SilverStripe\Assets\Image',
    ];
	
	private static $summary_fields = [
        'Image' => 'Image',
    ];

    public function getCMSFields()
    {
        $fields = FieldList::create(
			UploadField::create('Image')->setFolderName('TourPartner')
        );

        return $fields;
    }
}