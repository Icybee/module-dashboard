<?php

namespace Icybee\Modules\Dashboard;

use ICanBoogie\Module\Descriptor;

return array
(
	Descriptor::DESCRIPTION => 'Hosts widgets that display information about what is happening in Icybee.',
	Descriptor::CATEGORY => 'dashboard',
	Descriptor::NS => __NAMESPACE__,
	Descriptor::REQUIRED => true,
	Descriptor::PERMISSION => false,
	Descriptor::TITLE => 'Dashboard',
	Descriptor::VERSION => '1.0'
);