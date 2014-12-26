<?php

namespace Icybee\Modules\Dashboard;

return [

	'events' => [

		'ICanBoogie\Routing\Dispatcher::dispatch:before' => __NAMESPACE__ . '\Hooks::before_routing_dispatcher_dispatch'

	]

];
