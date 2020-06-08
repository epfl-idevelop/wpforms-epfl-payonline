<?php
// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WPForms_Template', false ) ) :
/**
 * Conference Form (EPFL Payonline) - Public
 * Template for WPForms.
 */
class WPForms_Template_conference_form_epfl_payonline_-_public extends WPForms_Template {

	/**
	 * Primary class constructor.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		// Template name
		$this->name = 'Conference Form (EPFL Payonline) - Public';

		// Template slug
		$this->slug = 'conference_form_epfl_payonline_-_public';

		// Template description
		$this->description = 'Collect Payments via EPFL Payonline for conferences payments with this ready-made form template. You can add and remove fields as needed.';

		// Template field and settings
		$this->data = array (
	'field_id' => '13',
	'fields' => array (
		0 => array (
			'id' => '0',
			'type' => 'name',
			'label' => 'Name',
			'format' => 'first-last',
			'required' => '1',
			'size' => 'medium',
		),
		1 => array (
			'id' => '1',
			'type' => 'email',
			'label' => 'Email',
			'required' => '1',
			'size' => 'medium',
		),
		2 => array (
			'id' => '2',
			'type' => 'phone',
			'label' => 'Phone',
			'format' => 'us',
			'required' => '1',
			'size' => 'medium',
		),
		3 => array (
			'id' => '3',
			'type' => 'address',
			'label' => 'Address',
			'scheme' => 'international',
			'required' => '1',
			'size' => 'medium',
			'country_default' => 'CH',
		),
		8 => array (
			'id' => '8',
			'type' => 'checkbox',
			'label' => 'Diets',
			'choices' => array (
				1 => array (
					'label' => 'Gluten-Free',
				),
				2 => array (
					'label' => 'Lactose-Free',
				),
				3 => array (
					'label' => 'Semi-vegetarian',
				),
				4 => array (
					'label' => 'Vegetarian',
				),
				5 => array (
					'label' => 'Veganism',
				),
			),
			'description' => 'Please indicate your food preferences and we will do our best to offer adapted meals at the conference.',
			'choices_images_style' => 'modern',
			'input_columns' => 'inline',
		),
		4 => array (
			'id' => '4',
			'type' => 'payment-multiple',
			'label' => 'Conference fees',
			'choices' => array (
				1 => array (
					'label' => 'Student',
					'value' => '100.00',
				),
				2 => array (
					'label' => 'Speakers',
					'value' => '200.00',
				),
				3 => array (
					'label' => 'Other attendees',
					'value' => '250.00',
				),
			),
			'description' => 'Students will be asked to show their card at the conference check-in.',
			'required' => '1',
			'choices_images_style' => 'modern',
		),
		7 => array (
			'id' => '7',
			'type' => 'payment-checkbox',
			'label' => 'Evenning events',
			'choices' => array (
				1 => array (
					'label' => 'Conference dinner (Wednesday evenning)',
					'value' => '100.00',
				),
				2 => array (
					'label' => 'Conference event (Thursday evenning)',
					'value' => '100.00',
				),
			),
			'choices_images_style' => 'modern',
		),
		5 => array (
			'id' => '5',
			'type' => 'payment-total',
			'label' => 'Total Amount',
		),
		6 => array (
			'id' => '6',
			'type' => 'textarea',
			'label' => 'Comment or Message',
			'size' => 'medium',
			'limit_count' => '1',
			'limit_mode' => 'characters',
		),
		11 => array (
			'id' => '11',
			'type' => 'gdpr-checkbox',
			'required' => '1',
			'label' => 'GDPR Agreement',
			'choices' => array (
				1 => array (
					'label' => 'I consent to having this website store my submitted information so they can respond to my inquiry.',
				),
			),
		),
	),
	'settings' => array (
		'form_title' => 'Conference Form (EPFL Payonline) - Public',
		'form_desc' => 'Collect Payments via EPFL Payonline for conferences payments with this ready-made form template. You can add and remove fields as needed.',
		'submit_text' => 'Submit',
		'submit_text_processing' => 'Sending...',
		'honeypot' => '1',
		'notification_enable' => '1',
		'notifications' => array (
			1 => array (
				'notification_name' => 'Default Notification',
				'email' => '{admin_email}',
				'subject' => 'New Entry: Billing / Order Form with Payonline',
				'sender_name' => 'EPFL IDEV FSD',
				'sender_address' => '{admin_email}',
				'message' => '{all_fields}',
			),
		),
		'confirmations' => array (
			1 => array (
				'name' => 'Default Confirmation',
				'type' => 'message',
				'message' => 'Thanks for contacting us! We will be in touch with you shortly.',
				'message_scroll' => '1',
				'page' => '12',
			),
		),
		'form_locker_user_message' => 'Only registered users can register to the conference. Register here.

https://idevfsd-test-conferences.epfl.ch/wp-login.php',
	),
	'payments' => array (
		'epfl_payonline' => array (
			'enable' => '1',
			'id_inst' => '2k4wi1w8si4wco7ejs60c043eeqqohz3',
			'email' => 'nicolas.borboen+payonline@epfl.ch',
			'mode' => 'production',
			'shipping' => '2',
			'note' => '1',
		),
	),
	'meta' => array (
		'template' => 'conference_form_epfl_payonline_-_public',
	),
);
	}
}
new WPForms_Template_conference_form_epfl_payonline_-_public;
endif;