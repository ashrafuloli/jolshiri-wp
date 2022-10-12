<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class FAQ extends Element_El_Widget {

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
		return 'faq';
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
		return __( 'FAQ', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/contact-7-form/';
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
		return 'eicon-edit';
	}

	public function get_keywords() {
		return [ 'services', 'tab' ];
	}

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
			'_section_title',
			[
				'label' => __( 'Title ', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'default'     => 'Heading Title',
				'placeholder' => __( 'Heading Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_slides',
			[
				'label' => __( 'Faq List', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'label'       => __( 'Tab Title', 'elementhelper' ),
				'default'     => __( 'Tab Title', 'elementhelper' ),
				'placeholder' => __( 'Type title here', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'tab_content_info',
			[
				'type'        => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'show_label'  => false,
				'default'     => __( 'Content Here', 'elementhelper' ),
				'placeholder' => __( 'Type subtitle here', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		// REPEATER
		$this->add_control(
			'slides',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(tab_title || "Carousel Item"); #>',
			]
		);

		$this->end_controls_section();


	}

	// register_style_controls
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

		if ( empty( $settings['slides'] ) ) {
			return;
		}
		?>
		<?php if ( $settings['design_style'] === 'style_2' ): ?>
		<?php else: ?>
            <div class="faq-area pt-200 pb-150 pt-lg-130 pt-md-130 pt-xs-130 pb-xs-100">
                <div class="container">
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        <div class="col-xl-6">
							<?php if ( ! empty( $settings['title'] ) ): ?>
                                <h2 class="contact-title text-center">
									<?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                </h2>
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <div class="col-xl-8">
                            <div class="faq-wrapper">
                                <div class="accordion" id="accordionExample">
									<?php foreach ( $settings['slides'] as $id => $slide ) :
										$collapsed_tab = ( $id == 0 ) ? '' : 'collapsed';
										$area_expanded = ( $id == 0 ) ? 'true' : 'false';
										$active_show_tab = ( $id == 0 ) ? 'show' : '';
										?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading<?php echo esc_attr( $id ); ?>">
                                                <button class="accordion-button <?php echo esc_attr( $collapsed_tab ); ?>"
                                                        type="button"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#collapse<?php echo esc_attr( $id ); ?>"
                                                        aria-expanded="<?php echo esc_attr( $area_expanded ); ?>"
                                                        aria-controls="collapse<?php echo esc_attr( $id ); ?>">
													<?php if ( ! empty( $slide['tab_title'] ) ): ?>
														<?php echo elh_element_kses_basic( $slide['tab_title'] ); ?>
													<?php endif; ?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?php echo esc_attr( $id ); ?>"
                                                 class="accordion-collapse collapse <?php echo esc_attr( $active_show_tab ); ?>"
                                                 aria-labelledby="heading<?php echo esc_attr( $id ); ?>"
                                                 data-bs-parent="#accordionExample">
												<?php if ( ! empty( $slide['tab_content_info'] ) ): ?>
                                                    <div class="accordion-body">
														<?php echo elh_element_kses_basic( $slide['tab_content_info'] ); ?>
                                                    </div>
												<?php endif; ?>
                                            </div>
                                        </div>
									<?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="shape-1">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-7.png" alt="shape">
                </div>
                <div class="shape-2">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-8.png" alt="shape">
                </div>
                <div class="shape-3">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-15.png" alt="shape">
                </div>
            </div>

		<?php
		endif;
	}
}