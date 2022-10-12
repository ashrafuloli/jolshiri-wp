<?php

namespace ElementHelper\Widget;

use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Policy extends Element_El_Widget {

	/**
	 * Get widget name.
	 *
	 * Retrieve Element Helper widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'policy';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return __( 'Privacy Policy', 'elementhelper' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-single-post';
	}

	public function get_keywords() {
		return [ 'info', 'blurb', 'box', 'policy', 'content' ];
	}

	/**
	 * Register content related controls
	 */
	protected function register_content_controls() {

		$this->start_controls_section(
			'_section_design_title',
			[
				'label' => __( 'Design Style', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'design_style',
			[
				'label'              => __( 'Design Style', 'elementhelper' ),
				'type'               => Controls_Manager::SELECT,
				'options'            => [
					'style_1' => __( 'Style 1', 'elementhelper' ),
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_policy_1',
			[
				'label' => __( 'Content', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'type'        => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Register styles related controls
	 */
	protected function register_style_controls() {

		$this->start_controls_section(
			'_section_media_style',
			[
				'label' => __( 'Icon / Image', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => __( 'Style Tab', 'elementhelper' ),
				'type'  => Controls_Manager::HEADING,
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if ( $settings['design_style'] === 'style_6' ): ?>

		<?php else:?>
            <div class="mission-area pt-200 pb-150  pt-lg-130 pt-md-130 pt-xs-130">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            <div class="policy-wrapper">
								<?php if ( ! empty( $settings['title'] ) ): ?>
                                    <h3 class="text-center"><?php echo $settings['title']; ?></h3>
								<?php endif; ?>
								<?php if ( ! empty( $settings['description'] ) ): ?>
                                    <div class="text">
	                                    <?php echo $settings['description']; ?>
                                    </div>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="m-shape-1">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-2.png" alt="shape">
                </div>
                <div class="m-shape-2">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-3.png" alt="shape">
                </div>
                <div class="m-shape-3">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-4.png" alt="shape">
                </div>
                <div class="m-shape-4">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-5.png" alt="shape">
                </div>
                <div class="t-shape-1">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-14.png" alt="shape">
                </div>
                <div class="t-shape-2">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-13.png" alt="shape">
                </div>
                <div class="t-shape-3">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-12.png" alt="shape">
                </div>
            </div>
		<?php endif; ?>
		<?php
	}
}
