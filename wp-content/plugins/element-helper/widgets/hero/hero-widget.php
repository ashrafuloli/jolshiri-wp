<?php

namespace ElementHelper\Widget;

use \Elementor\Group_Control_Css_Filter;
use \Elementor\Core\Schemes\Typography;
use Elementor\Repeater;
use \Elementor\Utils;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Hero extends Element_El_Widget {


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
		return 'hero';
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
		return __( 'Hero', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/ElementHelper/hero/';
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
		return 'eicon-elementor';
	}

	public function get_keywords() {
		return [ 'hero', 'blurb', 'infobox', 'content', 'block', 'box' ];
	}

	protected function register_content_controls() {

		$this->start_controls_section(
			'_section_title',
			[
				'label' => __( 'Title & Description', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();


		$repeater->add_control(
			'image',
			[
				'label'   => __( 'Image', 'elementhelper' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'content',
			[
				'label'       => __( 'Message', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);


		$repeater->add_control(
			'name',
			[
				'label'       => __( 'Author Name', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'destination',
			[
				'label'       => __( 'Author Destination', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'testimonials',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(name || "Testimonial Item"); #>'
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_text_1',
			[
				'label'       => __( 'Btn Text 1', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_link_1',
			[
				'label'       => __( 'Btn Link 1', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_text_2',
			[
				'label'       => __( 'Btn Text 2', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_link_2',
			[
				'label'       => __( 'Btn Link 2', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_image',
			[
				'label' => __( 'Image', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'image',
			[
				'label'   => __( 'Image', 'elementhelper' ),
				'type'    => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'video_link',
			[
				'label'       => __( 'Video Link', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

	}

	protected function register_style_controls() {
		$this->start_controls_section(
			'_section_style_image',
			[
				'label' => __( 'Image', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'offset_toggle',
			[
				'label'        => __( 'Offset', 'elementhelper' ),
				'type'         => Controls_Manager::POPOVER_TOGGLE,
				'label_off'    => __( 'None', 'elementhelper' ),
				'label_on'     => __( 'Custom', 'elementhelper' ),
				'return_value' => 'yes',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$image    = ! empty( $settings['image']['url'] ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : '';
		?>
        <div class="hero-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="hero-content">
							<?php if ( ! empty( $settings['title'] ) ): ?>
                                <h1 data-aos="fade-up" data-aos-delay="500"
                                    data-aos-duration="1000">
									<?php echo $settings['title']; ?>
                                </h1>
							<?php endif; ?>
							<?php if ( ! empty( $settings['description'] ) ): ?>
                                <p data-aos="fade-up" data-aos-delay="600"
                                   data-aos-duration="1000">
									<?php echo $settings['description']; ?>
                                </p>
							<?php endif; ?>
                            <div class="hero-btn-wrap" data-aos="fade-up" data-aos-delay="700"
                                 data-aos-duration="1000">
								<?php if ( ! empty( $settings['btn_text_1'] ) ): ?>
                                    <a href="<?php echo esc_url( $settings['btn_link_1'] ); ?>" class="hero-btn">
                                        <i class="fa-brands fa-apple"></i>
										<?php echo $settings['btn_text_1']; ?>
                                    </a>
								<?php endif; ?>
								<?php if ( ! empty( $settings['btn_text_2'] ) ): ?>
                                    <a href="<?php echo esc_url( $settings['btn_link_2'] ); ?>" class="hero-btn">
                                        <i class="fa-brands fa-google-play"></i>
										<?php echo $settings['btn_text_2']; ?>
                                    </a>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape-1">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-14.png" alt="shape">
            </div>
            <div class="shape-2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-13.png" alt="shape">
            </div>
            <div class="shape-3">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-12.png" alt="shape">
            </div>
            <div class="shape-4">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/shape-24.png" alt="shape">
            </div>
			<?php if ( ! empty( $image ) ): ?>
                <div class="hero-thumb">
                    <img src="<?php echo $image; ?>" alt="thumb" data-aos="fade-up" data-aos-delay="500"
                         data-aos-duration="1000">
                    <div class="play-btn">
                        <a href="<?php echo $settings['video_link']; ?>" class="my-popup-link" data-autoplay="true"
                           data-vbtype="video" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>
			<?php endif; ?>
        </div>
		<?php
	}

}