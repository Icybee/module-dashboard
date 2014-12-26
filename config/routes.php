<?php

namespace Icybee\Modules\Dashboard;

return [

	'admin:dashboard' => [

		'pattern' => '/admin/dashboard',
		'block' => 'dashboard',
		'controller' => __NAMESPACE__ . '\BlockController'

	]

];
