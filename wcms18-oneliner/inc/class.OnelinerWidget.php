<?php
/**
 * Adds OnelinerWidget widget.
 */
class OnelinerWidget extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
			'wcms18-oneliner-widget', // Base ID
			'WCMS18 Oneliner', // Name
			[
				'description' => __('A Widget for displaying a funny oneliner', 'wcms18-oneliner-widget'),
			] // Args
		);
	}
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget($args, $instance) {
		extract($args);
		// start widget
		echo $before_widget;
		// display loading spinner
		?>
			<div class="content">
				Loading a funny oneliner...
			</div>
		<?php
		// close widget
		echo $after_widget;
	}
} // class OnelinerWidget