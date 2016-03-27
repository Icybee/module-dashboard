<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Icybee\Modules\Dashboard\Operation;

use ICanBoogie\ErrorCollection;
use ICanBoogie\Operation;

use Icybee\Binding\PrototypedBindings;

/**
 * Saves the order of the user's dashboard blocks.
 */
class OrderOperation extends Operation
{
	use PrototypedBindings;

	protected function get_controls()
	{
		return [

			self::CONTROL_AUTHENTICATION => true

		] + parent::get_controls();
	}

	/**
	 * @inheritdoc
	 */
	protected function validate(ErrorCollection $errors)
	{
		if (!$this->request['order'])
		{
			$errors->add('order');
		}

		return $errors;
	}

	protected function process()
	{
		$this->app->user->metas['dashboard.order'] = json_encode($this->request['order']);

		return true;
	}
}
