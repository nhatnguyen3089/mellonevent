<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\NumericField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class Venue extends Page
{
    private static $db = [
        'Title' => 'Text',
        'Address' => 'Text',
		'Latitude' => 'Text',
		'Longitude' => 'Text',
    ];

    private static $has_one = [
        'Image' => Image::class,
		'Map' => Image::class,
    ];
	
	private static $has_many = [
        'VenueInfos' => VenueInfo::class,
    ];

    public function getCMSFields()
    {
		$fields = parent::getCMSFields();
		
		// Add fields to the CMS form
        $fields->addFieldToTab('Root.Main', TextField::create('Title', 'Title'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Address', 'Address'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Latitude', 'Latitude'), 'Content');
        $fields->addFieldToTab('Root.Main', TextField::create('Longitude', 'Longitude'), 'Content');
		$fields->addFieldToTab('Root.Main', UploadField::create('Image', 'Venue Image')->setFolderName('venues'), 'Content');
		$fields->addFieldToTab('Root.Main', UploadField::create('Map', 'Venue Map')->setFolderName('venue_maps'), 'Content');

		
		// Add GridField for managing VenueInfos
        $venueInfosConfig = GridFieldConfig_RecordEditor::create();
        $venueInfosGrid = GridField::create(
            'VenueInfos',
            'VenueInfos',
            $this->VenueInfos(),
            $venueInfosConfig
        );

        $fields->addFieldToTab('Root.VenueInfo', $venueInfosGrid);

        return $fields;
    }
}