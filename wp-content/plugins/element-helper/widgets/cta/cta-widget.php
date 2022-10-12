<?php

namespace ElementHelper\Widget;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;


defined( 'ABSPATH' ) || die();

class CTA extends Element_El_Widget {


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
		return 'cta';
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
		return __( 'CTA', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/gradient-heading/';
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
		return 'eicon-t-letter';
	}

	public function get_keywords() {
		return [ 'gradient', 'advanced', 'heading', 'title', 'colorful' ];
	}

	protected function register_content_controls() {

		//Settings
		$this->start_controls_section(
			'_section_settings',
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
					'style_2' => __( 'Style 2', 'elementhelper' ),
					'style_3' => __( 'Style 3', 'elementhelper' ),
					'style_4' => __( 'Style 4', 'elementhelper' ),
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->end_controls_section();

		//desc
		$this->start_controls_section(
			'_section_title',
			[
				'label' => __( 'Title & Desccription', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Heading Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Heading Description Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'btn_text_1',
			[
				'label'       => __( 'Button Text 1', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Heading Description Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'btn_link_1',
			[
				'label'       => __( 'Button Link 1', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Heading Description Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			'btn_icon_1',
			[
				'label'     => __( 'Button Icon 1', 'elementhelper' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic'   => [
					'active' => true,
				],
				'condition' => [
					'design_style' => [ 'style_3' ],
				],
			]
		);

		$this->add_control(
			'btn_text_2',
			[
				'label'       => __( 'Button Text 2', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Heading Description Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				],
				'condition'   => [
					'design_style' => [ 'style_3' ],
				],
			]
		);

		$this->add_control(
			'btn_link_2',
			[
				'label'       => __( 'Button Link 2', 'elementhelper' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => __( 'Heading Description Text', 'elementhelper' ),
				'dynamic'     => [
					'active' => true,
				],
				'condition'   => [
					'design_style' => [ 'style_3' ],
				],
			]
		);

		$this->add_control(
			'btn_icon_2',
			[
				'label'     => __( 'Button Icon 2', 'elementhelper' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic'   => [
					'active' => true,
				],
				'condition' => [
					'design_style' => [ 'style_3' ],
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => __( 'Image', 'elementhelper' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'dynamic'   => [
					'active' => true,
				],
				'condition' => [
					'design_style' => [ 'style_2', 'style_3' ],
				],
			]
		);

		$this->end_controls_section();
	}

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
		$settings = $this->get_settings_for_display(); ?>
		<?php if ( $settings['design_style'] === 'style_4' ):?>
            <div class="cta-area pt-85 pb-85">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="cta-wrap">
	                            <?php if ( ! empty( $settings['title'] ) ) : ?>
                                    <h4 data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
			                            <?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                    </h4>
	                            <?php endif; ?>
	                            <?php if ( ! empty( $settings['description'] ) ) : ?>
                                    <p data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
			                            <?php echo elh_element_kses_intermediate( $settings['description'] ); ?>
                                    </p>
	                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-4 text-center mt-md-50 mt-xs-50">
                            <div class="cta-btn">
	                            <?php if ( ! empty( $settings['btn_text_1'] ) ) : ?>
                                    <a href="<?php echo esc_url( $settings['btn_link_1'] ); ?>" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000" target="_blank">
			                            <?php echo elh_element_kses_intermediate( $settings['btn_text_1'] ); ?>
                                    </a>
	                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php elseif ( $settings['design_style'] === 'style_3' ):
			$btn_icon_1 = ! empty( $settings['btn_icon_1']['url'] ) ? wp_get_attachment_image_url( $settings['btn_icon_1']['id'], 'full' ) : '';
			$btn_icon_2 = ! empty( $settings['btn_icon_2']['url'] ) ? wp_get_attachment_image_url( $settings['btn_icon_2']['id'], 'full' ) : '';
			?>
            <div class="cta-area pt-85 pb-85">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <div class="cta-wrap">
	                            <?php if ( ! empty( $settings['title'] ) ) : ?>
                                    <h4 data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
			                            <?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                    </h4>
	                            <?php endif; ?>
	                            <?php if ( ! empty( $settings['description'] ) ) : ?>
                                    <p data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
			                            <?php echo elh_element_kses_intermediate( $settings['description'] ); ?>
                                    </p>
	                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 text-center">
                            <div class="cta-btns" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000">
	                            <?php if ( ! empty( $settings['btn_link_1'] ) ) : ?>
                                    <a href="<?php echo esc_url( $settings['btn_link_1'] ); ?>">
                                        <img src="<?php echo $btn_icon_1; ?>" alt="shape">
                                    </a>
	                            <?php endif; ?>
	                            <?php if ( ! empty( $settings['btn_link_2'] ) ) : ?>
                                    <a href="<?php echo esc_url( $settings['btn_link_2'] ); ?>">
                                        <img src="<?php echo $btn_icon_2; ?>" alt="shape">
                                    </a>
	                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php elseif ( $settings['design_style'] === 'style_2' ):
			$image = ! empty( $settings['image']['url'] ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : '';
			?>
            <div class="login-area pt-190 pb-200 pt-lg-100 pb-lg-100">
                <div class="container">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-5 col-lg-6 offset-xxl-1">
                            <div class="login-content">
								<?php if ( ! empty( $settings['title'] ) ) : ?>
                                    <h5 data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
										<?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                    </h5>
								<?php endif; ?>
								<?php if ( ! empty( $settings['description'] ) ) : ?>
                                    <p data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
										<?php echo elh_element_kses_intermediate( $settings['description'] ); ?>
                                    </p>
								<?php endif; ?>
                                <div class="login-btn">
									<?php if ( ! empty( $settings['btn_text_1'] ) ) : ?>
                                        <a href="<?php echo esc_url( $settings['btn_link_1'] ); ?>" data-aos="fade-up" data-aos-delay="500" data-aos-duration="1000"  target="_blank">
											<?php echo elh_element_kses_intermediate( $settings['btn_text_1'] ); ?>
                                        </a>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<?php if ( ! empty( $image ) ): ?>
                    <div class="thumb">
                        <img src="<?php echo $image; ?>" alt="thumb" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                    </div>
				<?php endif; ?>
                <div class="shape-1">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-22.png" alt="shape">
                </div>
                <div class="shape-2">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-23.png" alt="shape">
                </div>
            </div>
		<?php else: ?>
            <div class="schedule-area">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="schedule-wrap" data-aos="fade-up" data-aos-delay="300" data-aos-duration="1000">
                                <div class="row align-items-center">
                                    <div class="col-xl-8 col-lg-8">
                                        <div class="schedule-content">
											<?php if ( ! empty( $settings['title'] ) ) : ?>
                                                <h2>
													<?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                                </h2>
											<?php endif; ?>
											<?php if ( ! empty( $settings['description'] ) ) : ?>
                                                <p>
													<?php echo elh_element_kses_intermediate( $settings['description'] ); ?>
                                                </p>
											<?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 mt-md-30 mt-xs-30">
                                        <div class="schedule-btn">
											<?php if ( ! empty( $settings['btn_text_1'] ) ) : ?>
                                                <a href="<?php echo esc_url( $settings['btn_link_1'] ); ?>" target="_blank">
													<?php echo elh_element_kses_intermediate( $settings['btn_text_1'] ); ?>
                                                </a>
											<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		<?php endif; ?>
		<?php
	}
}
