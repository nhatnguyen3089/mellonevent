<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;


use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class About extends Page
{
    private static $db = [];

    private static $has_one = [];
	
	private static $has_many = [
        'AboutInfos' => 'AboutInfo',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
		
		// Add GridField for managing AboutInfos
        $aboutInfosConfig = GridFieldConfig_RecordEditor::create();
        $aboutInfosGrid = GridField::create(
            'AboutInfos',
            'AboutInfos',
            $this->AboutInfos(),
            $aboutInfosConfig
        );
		
		$fields->addFieldToTab('Root.AboutInfo', $aboutInfosGrid);
		
        return $fields;
    }
}