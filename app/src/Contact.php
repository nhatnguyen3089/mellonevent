<?php

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\HiddenField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\Control\Email\Email;
use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\CMS\Model\SiteTree;

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\ORM\PaginatedList;

class Contact extends Page
{
	private static $db = [];

    private static $has_one = [];

    private static $has_many = [
        'Submissions' => ContactSubmission::class,
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


class ContactController extends PageController
{

    private static $allowed_actions = [
        'ContactForm',
        'submitContactForm',
    ];

    public function ContactForm()
    {
        $fields = FieldList::create(
            TextField::create('Name', '')->setAttribute('placeholder', 'Name:')->addExtraClass('form-control'),
            TextField::create('Surname', '')->setAttribute('placeholder', 'Surname:')->addExtraClass('form-control'),
			EmailField::create('Email', '')->setAttribute('placeholder', 'Email:')->addExtraClass('form-control'),
            TextField::create('PhoneNumber', '')->setAttribute('placeholder', 'Phone number:')->addExtraClass('form-control'),
			TextareaField::create('Message', '')->setAttribute('placeholder', 'Message:')->addExtraClass('form-control')->setRows(3),
			HiddenField::create('ContactID', '', $this->ID)
		);

        $actions = FieldList::create(
            FormAction::create('submitContactForm', 'Submit')->addExtraClass('btn btn-primary btn-black')
        );

        $validator = RequiredFields::create('Name', 'Email', 'Message');

        return Form::create($this, 'ContactForm', $fields, $actions, $validator);
    }

    public function submitContactForm($data, $form)
    {
		
		try {
            // Validate form data
            $validator = $form->getValidator();
            if (!$validator->validate($data)) {
                throw new ValidationException($validator->getErrors());
            }

			// Create a new Submission data object
			$submission = ContactSubmission::create();
			$form->saveInto($submission);
			$submission->write();
			
			return $this->jsonResponse([
				'status' => 'success',
				'message' => 'Thank you for your message! We will get back to you soon.'
			]);

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
		
		
		/*
		// Sending email
        $email = new Email();
        $email->setTo('phongtran255@outlook.com');
        $email->setFrom($data['Email']);
        $email->setSubject('Contact Form Submission');
        $email->setBody('Name: ' . $data['Name'] . '\nEmail: ' . $data['Email'] . '\nMessage: ' . $data['Message']);

        $email->send();
		*/

        // Redirect back to the contact page with a success message
        //return $this->redirect($this->Link() . '?success=1');
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









