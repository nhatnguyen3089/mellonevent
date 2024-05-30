<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\Forms\RequiredFields;

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\PaginatedList;

class Subscribe extends Page
{
    private static $db = [];

    private static $has_one = [];
	
	private static $has_many = [
        'Submissions' => Subscription::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
		
		// Add GridField to display submissions
        $submissionsConfig = GridFieldConfig_RecordEditor::create();
        $submissionsGrid = GridField::create(
            'Submissions',
            'Submissions',
            $this->Submissions(),
            $submissionsConfig
        );
		
		$fields->addFieldToTab('Root.Submissions', $submissionsGrid);

        return $fields;
    }
}

class SubscribeController extends PageController
{
    private static $allowed_actions = [
        'SubscribeForm'
    ];

    public function SubscribeForm()
    {
		
		$interestedOptions = [
            'Rock / Pop (Modern)' => 'Rock / Pop (Modern)',
            'Dance / Electronic' => 'Dance / Electronic',
            'RNB / Hip Hop / Rap' => 'RNB / Hip Hop / Rap',
			'Rock / Pop (Classic hits)' => 'Rock / Pop (Classic hits)',
			'Country / Blues' => 'Country / Blues',
			'An evening on the green' => 'An evening on the green',
			'Food and wine' => 'Food and wine'
        ];
		
		// the fields 'Name' and 'Email' are required.
        $required = RequiredFields::create([
            'Name', 'Email',
        ]);
		
        $form = Form::create(
            $this,
            __FUNCTION__,
            FieldList::create(
				TextField::create('Name', '')->setAttribute('placeholder', 'Name:')->addExtraClass('form-control'),
				TextField::create('Surname', '')->setAttribute('placeholder', 'Surname:')->addExtraClass('form-control'),
                TextField::create('Email', '')->setAttribute('placeholder', 'Email:')->addExtraClass('form-control'),
				TextField::create('PhoneNumber', '')->setAttribute('placeholder', 'Phone Number:')->addExtraClass('form-control'),
				TextField::create('PostalAddress', '')->setAttribute('placeholder', 'Postal Address:')->addExtraClass('form-control'),
				TextField::create('Suburb', '')->setAttribute('placeholder', 'Suburb:')->addExtraClass('form-control'),
				TextField::create('PostalCode', '')->setAttribute('placeholder', 'Postal Code:')->addExtraClass('form-control'),
				TextField::create('State', '')->setAttribute('placeholder', 'State:')->addExtraClass('form-control'),
				TextField::create('Country', '')->setAttribute('placeholder', 'Country:')->addExtraClass('form-control'),
				CheckboxSetField::create('Interests', 'What I\'m interested in:', $interestedOptions),
				CheckboxField::create('MailListPermission', '* By signing up to the Mellen Events mail list, I am giving permission to be sent updates via email & SMS. You can unsubscribe at anytime.'),
				HiddenField::create('SubscribeID', '', $this->ID)
            ),
            FieldList::create(
                FormAction::create('doSubscribe', 'Subscribe')->addExtraClass('btn btn-primary btn-black')
            ),
			$required
        );
		
		$form->setValidator($required);

        return $form;
    }

    public function doSubscribe($data, $form)
    {
		
		try {
            // Validate form data
            $validator = $form->getValidator();
            if (!$validator->validate($data)) {
                throw new ValidationException($validator->getErrors());
            }

			$subscription = Subscription::create();
			$form->saveInto($subscription);
			$subscription->write();

            return $this->jsonResponse([
                'status' => 'success',
                'message' => 'Thank you! You have subscribed us successfully!'
            ]);

        } catch (ValidationException $e) {
            return $this->jsonResponse([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }

    }
	
	protected function jsonResponse($data, $statusCode = 200)
    {
        $response = $this->getResponse();
        $response->addHeader('Content-Type', 'application/json');
        $response->setBody(json_encode($data));
        $response->setStatusCode($statusCode);

        return $response;
    }
	
}






























