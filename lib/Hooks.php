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

use Icybee\Modules\Members\Member;

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
		$app = self::app();

		$user = $app->user;
		$path = $event->request->decontextualized_path;

		if ($path !== '/admin' || $user->is_guest || $user instanceof Member)
		{
			return;
		}

		$event->response = new RedirectResponse($app->routes['admin:dashboard:index']);
	}

	/**
	 * @return \ICanBoogie\Core|\Icybee\Binding\CoreBindings
	 */
	static private function app()
	{
		return \ICanBoogie\app();
	}
}
