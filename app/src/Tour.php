<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\CompositeField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\NumericField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;

use SilverStripe\Forms\HTMLEditor\HTMLEditorField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

use SilverStripe\Forms\ListboxField;

class Tour extends Page
{
    private static $db = [
        'TourDate' => 'Text',
		'TourDescriptionLine' => 'Text',
		'TourFeaturing' => 'Text',
		'TicketDescription' => 'HTMLText',
        'BuyTicketLink' => 'Text',
    ];

    private static $has_one = [
        'TourImage' => 'SilverStripe\Assets\Image',
		'TourImageBanner' => 'SilverStripe\Assets\Image',
    ];
	
	private static $has_many = [
        'TourInfos' => 'TourInfo',
		'TourArtists' => 'TourArtist',
		// 'TourPartners' => 'TourPartner',
    ];
	
	private static $many_many = [
		'Venues' => Venue::class
	];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
		
		// Remove the default Content field
        $fields->removeByName('Content');
        $fields->removeByName('Metadata');
		
        // Add fields to the CMS form
        $fields->addFieldToTab('Root.Main', TextField::create('TourDate', 'Tour Date'));
		$fields->addFieldToTab('Root.Main', TextField::create('TourDescriptionLine', 'Tour Description Line'));
		$fields->addFieldToTab('Root.Main', TextField::create('TourFeaturing', 'Featuring'));
		$fields->addFieldToTab('Root.Main', UploadField::create('TourImage', 'Tour Image (Thumbnail)'));
		$fields->addFieldToTab('Root.Main', UploadField::create('TourImageBanner', 'Tour Banner Image'));
		
		$fields->addFieldToTab('Root.Main', ListboxField::create(
			'Venues',
			'Venues',
			Venue::get()->map('ID', 'Title')
		));
		
		
        $fields->addFieldToTab('Root.Main', TextField::create('BuyTicketLink', 'Buy Ticket Link'));
		$fields->addFieldToTab('Root.Main', HTMLEditorField::create('TicketDescription', 'Ticket Description')->setRows(2));
		
		// Add the Content field at the bottom
        $fields->addFieldToTab('Root.Main', $contentField = HTMLEditorField::create('Content', 'Content'));
        $contentField->setRows(15); // Set number of rows for the Content field
		
		// Add the metadata field group at the bottom
		// Create a field group
        $fieldGroup = CompositeField::create(
            [
                TextField::create('MetaTitle', 'Meta Title'),
                TextareaField::create('MetaDescription', 'Meta Description'),
            ]
        );

        // Set the title for the field group
        $fieldGroup->setTitle('Metadata');
		
        // Add the field group to the main tab
        $fields->addFieldToTab('Root.Main', $fieldGroup);

		
		// Add GridField for managing TourInfos
        $tourInfosConfig = GridFieldConfig_RecordEditor::create();
        $tourInfosGrid = GridField::create(
            'TourInfos',
            'TourInfos',
            $this->TourInfos(),
            $tourInfosConfig
        );

        $fields->addFieldToTab('Root.TourInfo', $tourInfosGrid);
		
		
		// Add GridField for managing TourArtists
        $tourArtistsConfig = GridFieldConfig_RecordEditor::create();
        $tourArtistsGrid = GridField::create(
            'TourArtists',
            'TourArtists',
            $this->TourArtists(),
            $tourArtistsConfig
        );
		
		$fields->addFieldToTab('Root.TourArtists', $tourArtistsGrid);
		
		// Add GridField for managing TourPartners
        // $tourPartnersConfig = GridFieldConfig_RecordEditor::create();
        // $tourPartnersGrid = GridField::create(
        //     'TourPartners',
        //     'TourPartners',
        //     $this->TourPartners(),
        //     $tourPartnersConfig
        // );
		
		// $fields->addFieldToTab('Root.TourPartners', $tourPartnersGrid);
		

        return $fields;
    }
}


































