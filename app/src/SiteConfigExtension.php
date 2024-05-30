<?php

use SilverStripe\ORM\DataExtension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\HTMLEditor\HTMLEditorField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'EmailAddress' => 'Text',
		'PhoneNumber' => 'Text',
		'FacebookLink' => 'Text',
		'YoutubeLink' => 'Text',
		'InstagramLink' => 'Text',
		'TwitterLink' => 'Text',
		'Address' => 'Text',
		'SiteDescription' => 'HTMLText',
    ];

    public function updateCMSFields(FieldList $fields)
    {
        // Add global text field to the Settings tab
		
		$fields->addFieldToTab('Root.Main', HTMLEditorField::create('SiteDescription', 'Site Description'));
		
		// Create a new tab
        $fields->findOrMakeTab('Root.Contact', 'Contact Info');
		
        $fields->addFieldToTab('Root.Contact', TextField::create('EmailAddress', 'Email'));
		$fields->addFieldToTab('Root.Contact', TextField::create('PhoneNumber', 'Phone Number'));
		$fields->addFieldToTab('Root.Contact', TextField::create('FacebookLink', 'Facebook Link'));
		$fields->addFieldToTab('Root.Contact', TextField::create('YoutubeLink', 'Youtube Link'));
		$fields->addFieldToTab('Root.Contact', TextField::create('InstagramLink', 'Instagram Link'));
		$fields->addFieldToTab('Root.Contact', TextField::create('TwitterLink', 'Twitter Link'));
		$fields->addFieldToTab('Root.Contact', TextField::create('Address', 'Address'));
    }
}