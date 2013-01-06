<?
$conf = array
(
	'fields' => array
	(
		'to' => array
		(
			'label' => e::o('to'),
			'cnf' => array
			(
				'type' => 'input',
				'empty' => false,
				'err_empty' => e::o('err_empty_to')
			)
		),
		'subject' => array
		(
			'label' => e::o('subject'),
			'cnf' => array
			(
				'type' => 'input',
				'empty' => false,
				'err_empty' => e::o('err_empty_subject')
			)
		),
		'body' => array
		(
			'label' => e::o('body'),
			'cnf' => array
			(
				'type' => 'textarea',
				'empty' => false,
				'err_empty' => e::o('err_empty_body')
			)
		),
	),
)
?>