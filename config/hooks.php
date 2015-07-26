<?php

namespace Icybee\Modules\Dashboard;

use ICanBoogie\Routing\RouteDispatcher;

$hooks = Hooks::class . '::';

return [

	'events' => [

		RouteDispatcher::class . '::dispatch:before' => $hooks . 'before_routing_dispatcher_dispatch'

	]

];
