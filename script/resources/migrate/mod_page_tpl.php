<?
$config = array
(	'fields' => array
	(
		'id' => array
		(
			'Field' => 'id',
			'Type' => 'int(10) unsigned',
			'Null' => 'NO',
			'Key' => 'PRI',
			'Default' => NULL,
			'Extra' => '',
		),
		'tpl_name' => array
		(
			'Field' => 'tpl_name',
			'Type' => 'varchar(255)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'label' => array
		(
			'Field' => 'label',
			'Type' => 'varchar(255)',
			'Null' => 'NO',
			'Key' => '',
			'Default' => NULL,
			'Extra' => '',
		),
		'sys_trashcan' => array
		(
			'Field' => 'sys_trashcan',
			'Type' => 'smallint(1) unsigned',
			'Null' => 'NO',
			'Key' => '',
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
	),
	'data' => array
	(
		'0' => array
		(
			'id' => '0',
			'tpl_name' => 'tajapa_marketplace.php',
			'label' => 'TAJAPA MARKETPLACE',
			'sys_trashcan' => '0',
		),
		'1' => array
		(
			'id' => '6',
			'tpl_name' => 'contrails.php',
			'label' => 'CONTRAILS',
			'sys_trashcan' => '0',
		),
		'2' => array
		(
			'id' => '7',
			'tpl_name' => 'tajapa_marketplace_create.php',
			'label' => 'TAJAPA MARKETPLACE CREATE',
			'sys_trashcan' => '1',
		),
		'3' => array
		(
			'id' => '8',
			'tpl_name' => 'tajapa.php',
			'label' => 'TAJAPA',
			'sys_trashcan' => '0',
		),
		'4' => array
		(
			'id' => '9',
			'tpl_name' => 'tajapa_marketplace_find.php',
			'label' => 'TAJAPA MARKETPLACE FIND',
			'sys_trashcan' => '0',
		),
		'5' => array
		(
			'id' => '10',
			'tpl_name' => 'tajapa_marketplace_open.php',
			'label' => 'TAJAPA MARKETPLACE OPEN',
			'sys_trashcan' => '0',
		),
	),

);
?>