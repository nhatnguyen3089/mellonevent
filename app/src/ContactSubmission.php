<?php

use SilverStripe\ORM\DataObject;

class ContactSubmission extends DataObject
{
    private static $db = [
        'Name' => 'Varchar(255)',
		'Surname' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
		'PhoneNumber' => 'Varchar(255)',
        'Message' => 'Text',
    ];
	
	private static $has_one = [
        'Contact' => 'Contact',
    ];

    private static $summary_fields = [
        'Name',
		'Surname',
        'Email',
		'PhoneNumber',
        'Message',
        'Created',
    ];
}
