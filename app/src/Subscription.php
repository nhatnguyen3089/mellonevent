<?php

use SilverStripe\ORM\DataObject;

class Subscription extends DataObject
{
    private static $db = [
		'Name' => 'Varchar(255)',
		'Surname' => 'Varchar(255)',
        'Email' => 'Varchar(255)',
		'PhoneNumber' => 'Varchar(255)',
		'PostalAddress' => 'Varchar(255)',
		'Suburb' => 'Varchar(255)',
		'PostalCode' => 'Varchar(255)',
		'State' => 'Varchar(255)',
		'Country' => 'Varchar(255)',
		'Interests' => 'Varchar(255)',
		'MailListPermission' => 'Boolean'
    ];
	
	private static $has_one = [
        'Subscribe' => 'Subscribe',
    ];

    private static $summary_fields = [
		'Name' => 'Name',
		'Surname' => 'Surname',
        'Email' => 'Email',
		'PhoneNumber' => 'Phone Number'
    ];
}