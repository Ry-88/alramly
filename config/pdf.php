<?php


return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
	'author'                => '',
	'subject'               => '',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('../temp/'),
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => '',
	'custom_font_dir'            => base_path('storage/fonts/'),
	'custom_font_data' => [
		'Kufam' => [
			'R'  => 'Kufam-Regular.ttf',    // regular font
		]

	]
];
