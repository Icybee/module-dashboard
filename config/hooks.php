<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Icybee\Modules\Dashboard;

use ICanBoogie\Routing\RouteDispatcher;

$hooks = Hooks::class . '::';

return [

	'events' => [

		RouteDispatcher::class . '::dispatch:before' => $hooks . 'before_routing_dispatcher_dispatch'

	]

];
