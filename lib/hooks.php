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
use ICanBoogie\Routing\RouteDispatcher;

class Hooks
{
	/**
	 * If the user is authenticated and the request path is "/admin" the request is redirected to
	 * the dashboard.
	 *
	 * @param RouteDispatcher\BeforeDispatchEvent $event
	 * @param RouteDispatcher $dispatcher
	 */
	static public function before_routing_dispatcher_dispatch(RouteDispatcher\BeforeDispatchEvent $event, RouteDispatcher $dispatcher)
	{
		$app = \ICanBoogie\app();
		$path = $event->request->decontextualized_path;

		if ($path !== '/admin' || $app->user->is_guest || $app->user instanceof \Icybee\Modules\Members\Member)
		{
			return;
		}

		$event->response = new RedirectResponse($app->routes['admin:dashboard']);
	}
}
