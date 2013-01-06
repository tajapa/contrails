<?
$config = array
(	'fields' => array
	(
		'id' => array
		(
			'Field' => 'id',
			'Type' => 'int(11) unsigned',
			'Null' => 'NO',
			'Key' => 'PRI',
			'Default' => NULL,
			'Extra' => 'auto_increment',
		),
		'uid_from' => array
		(
			'Field' => 'uid_from',
			'Type' => 'int(11)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'uid_to' => array
		(
			'Field' => 'uid_to',
			'Type' => 'int(11)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'usr_from' => array
		(
			'Field' => 'usr_from',
			'Type' => 'varchar(255)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => '',
			'Extra' => '',
		),
		'usr_to' => array
		(
			'Field' => 'usr_to',
			'Type' => 'varchar(255)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => '',
			'Extra' => '',
		),
		'subject' => array
		(
			'Field' => 'subject',
			'Type' => 'varchar(255)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => '',
			'Extra' => '',
		),
		'body' => array
		(
			'Field' => 'body',
			'Type' => 'text',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'tajapa_offer' => array
		(
			'Field' => 'tajapa_offer',
			'Type' => 'int(11)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'tajapa_request' => array
		(
			'Field' => 'tajapa_request',
			'Type' => 'int(11)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'tajapa_marketplace' => array
		(
			'Field' => 'tajapa_marketplace',
			'Type' => 'int(11)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'created' => array
		(
			'Field' => 'created',
			'Type' => 'int(11)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'read' => array
		(
			'Field' => 'read',
			'Type' => 'tinyint(1)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => '0',
			'Extra' => '',
		),
	),
	'keys' => array
	(
		'0' => array
		(
			'type' => 'PRIMARY KEY',
			'fields' => array
			(
				'0' => 'id',
			),
		),
	),

);
?>