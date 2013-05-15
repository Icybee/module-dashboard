/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

window.addEvent('domready', function() {

	var container = document.id('dashboard-panels')

	new Sortables('#dashboard-panels > div', {

		clone: true,
		handle: 'div.panel-title',
		opacity: .1,
		revert: false,

		onStart: function(el, clone)
		{
			clone.id = el.id
			el.setStyle('opacity', .1)

			this._original = el
			container.addClass('sorting')
		},

		onComplete: function(ev)
		{
			container.removeClass('sorting')
			this._original.setStyle('opacity', 1)

			container.getElements('div.panel-holder').each(function(el) {

				var parent = el.getParent()

				el.dispose()
				el.inject(parent)

			})

			var orderByColumns = []

			container.getChildren().each(function (column, columnIndex) {

				column.getChildren().each(function (panel) {

					var id = panel.id

					if (!id) return

					if (!orderByColumns[columnIndex])
					{
						orderByColumns[columnIndex] = []
					}

					orderByColumns[columnIndex].push(panel.id)
				})
			})

			var req = new Request.API({ url: 'dashboard/order' })

			req.post({ order: orderByColumns })
		}
	})
})