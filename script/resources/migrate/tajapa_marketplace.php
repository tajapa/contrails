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
		'label' => array
		(
			'Field' => 'label',
			'Type' => 'varchar(255)',
			'Null' => 'NO',
			'Key' => 'UNI',
			'Default' => '',
			'Extra' => '',
		),
		'description' => array
		(
			'Field' => 'description',
			'Type' => 'text',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'uid' => array
		(
			'Field' => 'uid',
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
		'tajapa_currency' => array
		(
			'Field' => 'tajapa_currency',
			'Type' => 'int(11)',
			'Null' => 'YES',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'active' => array
		(
			'Field' => 'active',
			'Type' => 'tinyint(1)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => '1',
			'Extra' => '',
		),
		'url' => array
		(
			'Field' => 'url',
			'Type' => 'varchar(255)',
			'Null' => 'YES',
			'Key' => 'MUL',
			'Default' => NULL,
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
		'1' => array
		(
			'type' => 'UNIQUE',
			'fields' => array
			(
				'0' => 'label',
			),
		),
		'2' => array
		(
			'type' => 'KEY',
			'fields' => array
			(
				'0' => 'url',
			),
		),
	),
	'data' => array
	(
		'0' => array
		(
			'id' => '62',
			'label' => 'grannynanny',
			'description' => 'asdfasf',
			'uid' => '223',
			'created' => '1353263393',
			'tajapa_currency' => '34',
			'active' => '1',
			'url' => 'grannynanny',
		),
	),

);
?>