# Dashboard

The dashboard hosts widgets that display information about what is happening in the CMS.
A widget might display the last records modified by the user, another might display an
overview of the different records available, another the last comments posted by users.

Widgets can be rearranged, added, removed, and configured.





## A redirection for authenticated users

The module attaches an event hook to the `ICanBoogie\Routing\RouteDispatcher::dispatch:before` event
in order to redirect authenticated users requesting the "/admin" URL to the dashboard
("/admin/dashbord").





## Dashboard widgets

### Ordering dashboard widgets

The order in which the user rearranged its widgets is stored in the `dashboard.order` user meta.





----------





## Requirement

The package requires PHP 5.6 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/).
Create a `composer.json` file and run `php composer.phar install` command to install it:

```
$ composer require icybee/module-dashboard
```

Note: This package is part of the packages required by the CMS [Icybee](http://icybee.org). 





### Cloning the repository

The package is [available on GitHub](https://github.com/Icybee/module-dashboard), its repository can be
cloned with the following command line:

	$ git clone git://github.com/Icybee/module-dashboard.git dashboard





## Documentation

The package is documented as part of the [Icybee](http://icybee.org/) CMS
[documentation](http://icybee.org/docs/). The documentation for the package and its
dependencies can be generated with the `make doc` command. The documentation is generated in
the `docs` directory using [ApiGen](http://apigen.org/). The package directory can later by
cleaned with the `make clean` command.





## License

The module is licensed under the New BSD License - See the [LICENSE](LICENCE) file for details.
