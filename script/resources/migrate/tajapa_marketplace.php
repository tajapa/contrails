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
			'id' => '41',
			'label' => 'sasdf',
			'description' => 'asdf',
			'uid' => '200',
			'created' => '1352669840',
			'tajapa_currency' => '19',
			'active' => '1',
			'url' => NULL,
		),
		'1' => array
		(
			'id' => '43',
			'label' => 'asf',
			'description' => 'asdf',
			'uid' => '202',
			'created' => '1352671112',
			'tajapa_currency' => '0',
			'active' => '1',
			'url' => NULL,
		),
		'2' => array
		(
			'id' => '45',
			'label' => 'label',
			'description' => 'description',
			'uid' => '209',
			'created' => '1352671877',
			'tajapa_currency' => '25',
			'active' => '1',
			'url' => NULL,
		),
		'3' => array
		(
			'id' => '46',
			'label' => 'test',
			'description' => 'test',
			'uid' => '210',
			'created' => '1352707456',
			'tajapa_currency' => '26',
			'active' => '1',
			'url' => NULL,
		),
		'4' => array
		(
			'id' => '47',
			'label' => 'grannynanny',
			'description' => 'test',
			'uid' => '211',
			'created' => '1353249486',
			'tajapa_currency' => '0',
			'active' => '1',
			'url' => NULL,
		),
	),

);
?>