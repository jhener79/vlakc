jQuery(document).ready(function ($) {
	$('.su-progress-pie').appear(function () {
		// Prepare data
		var $pie = $(this),
			data = $pie.data();

			$(this).easyPieChart({
				size: data.size,
				barColor: data.bar_color,
				trackColor: data.fill_color,
				scaleColor: data.scale_color,
				scaleLength: data.scale_length,
				lineCap: data.line_cap,
				lineWidth: data.line_width,
				animate: (data.duration * 1000),
				easing: data.animation,
				onStep: function(from, to, percent) {
					if ($pie.hasClass('su-pp-percent')) {
						$(this.el).find('.su-pp-text').text(Math.round(percent));
					}
				}
			});
	});
});