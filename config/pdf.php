<?php

return [
  'custom_font_dir'  => base_path('resources/fonts/'), // don't forget the trailing slash!
  'custom_font_data' => [
    'nikosh' => [
	'R' => "Nikosh.ttf",
    ],
    'bangla' => [
      'R'  => 'SolaimanLipi_22-02-2012.ttf', // regular font
      'B'  => 'SolaimanLipi_Bold_10-03-12.ttf', // optional: bold font

      'useOTL' => 0xFF,
      'useKashida' => 75,
  ]
  	// ...add as many as you want.
  ]
];
