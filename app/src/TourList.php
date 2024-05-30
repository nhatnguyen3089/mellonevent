<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldAddNewButton;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\Forms\GridField\GridFieldFilterHeader;
use SilverStripe\Forms\GridField\GridFieldPaginator;

use SilverStripe\ORM\PaginatedList;

class TourList extends Page
{
    private static $has_many = [
        'Tours' => Tour::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Add Tours GridField
        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldFilterHeader());
        $config->addComponent(new GridFieldPaginator(10));
        $config->addComponent(new GridFieldDeleteAction());

        $fields->addFieldToTab('Root.Tours', GridField::create(
            'Tours',
            'Tour List',
            $this->Tours(),
            $config
        ));

        return $fields;
    }
	
	/*
	public function index($request)
	{
		$allTours = Tour::get();
		$paginatedTours = PaginatedList::create($allTours, $request);
		$paginatedTours->setPageLength(2); // Set the number of items per page
		return [
			'PaginatedTours' => $paginatedTours
		];
	}
	*/
}