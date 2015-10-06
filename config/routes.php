<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Icybee\Modules\Dashboard\Routing;

use ICanBoogie\Module\ModuleRouteDefinition as Route;
use Icybee\Routing\RouteMaker as Make;

return [

	'admin:dashboard:index' => [

		Route::PATTERN => '/admin',
		Route::CONTROLLER => DashboardController::class,
		Route::ACTION => Make::ACTION_INDEX,
		Route::MODULE => 'dashboard'

	]

];
