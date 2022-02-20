<?php

namespace Elementor;

// Create Profile Card Design into elementor.
function init_elementor_addons_elements_category() {
	Plugin::instance()->elements_manager->add_category(
		'tp-tp-elementor-addons-kits', [
			'title' => esc_html__('TP Elementor Addons Kits', ELEMENTOR_ADDONS_KITS_DOMAIN),
			'icon' => 'fa fa-plug'
		], 1
	);
}
add_action('elementor/init', 'Elementor\init_elementor_addons_elements_category');
?>