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

use ICanBoogie\HTTP\RedirectResponse;
use ICanBoogie\Routing\Dispatcher;

class Hooks
{
	/**
	 * If the user is authenticated and the request path is "/admin" the request is redirected to
	 * the dashboard.
	 *
	 * @param Dispatcher\BeforeDispatchEvent $event
	 * @param Dispatcher $dispatcher
	 */
	static public function before_routing_dispatcher_dispatch(Dispatcher\BeforeDispatchEvent $event, Dispatcher $dispatcher)
	{
		$app = \ICanBoogie\app();
		$path = $event->request->decontextualized_path;

		if ($path !== '/admin' || $app->user->is_guest || $app->user instanceof \Icybee\Modules\Members\Member)
		{
			return;
		}

		$event->response = new RedirectResponse(\ICanBoogie\Routing\contextualize('/admin/dashboard'));
	}
}
