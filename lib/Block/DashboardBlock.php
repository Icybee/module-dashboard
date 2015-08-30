<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Icybee\Modules\Dashboard\Block;

use ICanBoogie\I18n;

use Brickrouge\Document;
use Brickrouge\Element;

use Icybee\Modules\Dashboard as Root;
use Icybee\Modules\Dashboard\Module;

class DashboardBlock extends Element
{
	static protected function add_assets(Document $document)
	{
		parent::add_assets($document);

		$document->css->add(Root\DIR . 'public/dashboard.css');
		$document->js->add(Root\DIR . 'public/dashboard.js');
	}

	/**
	 * The Dashboard module.
	 *
	 * @var Module
	 */
	protected $module;

	public function __construct(Module $module)
	{
		$this->module = $module;

		parent::__construct('div', [ 'id' => 'dashboard' ]);
	}

	public function render_inner_html()
	{
		$app = $this->app;
		$panels = $app->configs->synthesize('dashboard', 'merge');

		foreach ($panels as $i => $panel)
		{
			$panels[$i] +=  [ 'column' => 0, 'weight' => 0 ];
		}

		$user_config = $app->user->metas['dashboard.order'];

		if ($user_config)
		{
			$user_config = json_decode($user_config);

			foreach ($user_config as $column_index => $user_panels)
			{
				foreach ($user_panels as $panel_weight => $panel_id)
				{
					$panels[$panel_id]['column'] = $column_index;
					$panels[$panel_id]['weight'] = $panel_weight;
				}
			}
		}

		uasort($panels, function($a, $b) { return $a['weight'] - $b['weight']; });

		$html = $this->render_panels($panels);

		return <<<EOT
<div id="dashboard-panels">
	$html
</div>
EOT;
	}

	protected function render_panels(array $panels)
	{
		$colunms = [ [ ], [ ] ];

		// config sign: ⚙

		foreach ($panels as $id => $descriptor)
		{
			try
			{
				if (empty($descriptor['callback']))
				{
					continue;
				}

				$contents = call_user_func($descriptor['callback']);
			}
			catch (\Exception $e)
			{
				$contents = \Brickrouge\render_exception($e);
			}

			if (!$contents)
			{
				continue;
			}

			$title = $this->t($id, [ ], [ 'scope' => 'dashboard.title', 'default' => $descriptor['title'] ]);

			$panel = <<<EOT
<div class="panel" id="$id">
	<div class="panel-title">$title</div>
	<div class="panel-contents">$contents</div>
</div>
EOT;

			$colunms[$descriptor['column']][] = $panel;
		}

		$html = '';

		foreach ($colunms as $i => $panels)
		{
			$panels = implode(PHP_EOL, $panels);

			$html .= <<<EOT
<div class="column">
	$panels
	<div class="panel-holder">&nbsp;</div>
</div>
EOT;
		}

		return $html;
	}
}
