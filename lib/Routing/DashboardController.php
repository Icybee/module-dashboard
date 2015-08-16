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

use Icybee\Routing\AdminController;

class DashboardController extends AdminController
{
	protected function index()
	{
		$this->view->content = $this->module->getBlock('dashboard');
		$this->view['block_name'] = 'dashboard';
	}
}
