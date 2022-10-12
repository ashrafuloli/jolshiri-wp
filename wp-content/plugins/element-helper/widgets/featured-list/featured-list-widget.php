<?php

namespace ElementHelper\Widget;


use \Elementor\Group_Control_Text_Shadow;
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

class Featured_List extends Element_El_Widget {

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
		return 'featured_list';
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
		return __( 'Featured List', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/icon-box/';
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
		return 'eicon-preview-medium';
	}

	public function get_keywords() {
		return [ 'featured', 'list', 'icon' ];
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
					'style_2' => __( 'Style 2', 'elementhelper' ),
					'style_3' => __( 'Style 3', 'elementhelper' ),
				],
				'default'            => 'style_1',
				'frontend_available' => true,
				'style_transfer'     => true,
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_feature_1',
			[
				'label' => __( 'Featured Content 1', 'elementhelper' ),
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
			'title',
			[
				'label'       => __( 'Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'features',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Feature Item"); #>'
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

	/**
	 * Render widget output on the frontend.
	 *
	 * Used to generate the final HTML displayed on the frontend.
	 *
	 * Note that if skin is selected, it will be rendered by the skin itself,
	 * not the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<?php if ( $settings['design_style'] === 'style_3' ):
			$m_image = ! empty( $settings['image']['url'] ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : '';
			?>

            <div class="support-area pt-140 pb-90">
                <div class="container">
                    <div class="row">
						<?php if ( ! empty( $m_image ) ): ?>
                            <div class="col-xl-6 col-lg-6" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                                <div class="approach-thumb">
                                    <img src="<?php echo $m_image; ?>" alt="thumb">
                                    <div class="shape">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-19.png"
                                             alt="shape">
                                    </div>
                                </div>
                            </div>
						<?php endif; ?>
                        <div class="col-xl-6 col-lg-6" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                            <div class="approach-content pt-200 pt-lg-100 pt-md-50 pt-xs-50">
								<?php if ( ! empty( $settings['title'] ) ): ?>
                                    <h3 class="title">
										<?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                    </h3>
								<?php endif; ?>
								<?php foreach ( $settings['features'] as $features ):
									$image = ( ! empty( $features['image']['id'] ) ) ? wp_get_attachment_image_url( $features['image']['id'], 'full' ) : '';
									?>
                                    <div class="content-wrapper">
										<?php if ( ! empty( $image ) ): ?>
                                            <div class="box-1">
                                                <img src="<?php echo $image ?>" alt="shape">
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $features['title'] ) ) : ?>
                                            <p><?php echo $features['title']; ?></p>
										<?php endif; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

		<?php elseif ( $settings['design_style'] === 'style_2' ):
			$m_image = ! empty( $settings['image']['url'] ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : '';
			?>
            <div class="virtual-area pt-115 pb-115">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 order-lg-1 order-2" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            <div class="approach-content pt-195 pt-lg-100 pt-md-50 pt-xs-50">
								<?php if ( ! empty( $settings['title'] ) ): ?>
                                    <h3 class="title">
										<?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                    </h3>
								<?php endif; ?>
								<?php foreach ( $settings['features'] as $features ):
									$image = ( ! empty( $features['image']['id'] ) ) ? wp_get_attachment_image_url( $features['image']['id'], 'full' ) : '';
									?>
                                    <div class="content-wrapper">
										<?php if ( ! empty( $image ) ): ?>
                                            <div class="box-1">
                                                <img src="<?php echo $image ?>" alt="shape">
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $features['title'] ) ) : ?>
                                            <p><?php echo $features['title']; ?></p>
										<?php endif; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
						<?php if ( ! empty( $m_image ) ): ?>
                            <div class="col-xl-6 col-lg-6 order-lg-2 order-1 text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                                <div class="approach-thumb">
                                    <img src="<?php echo $m_image; ?>" alt="thumb">
                                    <div class="shape-1">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-19.png"
                                             alt="shape">
                                    </div>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
                <div class="shape-2">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-20.png" alt="shape">
                </div>
                <div class="shape-3">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-21.png" alt="shape">
                </div>
            </div>
		<?php else:
			$m_image = ! empty( $settings['image']['url'] ) ? wp_get_attachment_image_url( $settings['image']['id'], 'full' ) : '';
			?>
            <div class="approach-area pt-100 pb-90">
                <div class="container">
                    <div class="row">
						<?php if ( ! empty( $m_image ) ): ?>
                            <div class="col-xl-6 col-lg-5" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                                <div class="approach-thumb">
                                    <img src="<?php echo $m_image; ?>" alt="thumb">
                                    <div class="shape">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-19.png"
                                             alt="shape">
                                    </div>
                                </div>
                            </div>
						<?php endif; ?>

                        <div class="col-xl-6 col-lg-7" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                            <div class="approach-content pt-70">
								<?php if ( ! empty( $settings['title'] ) ): ?>
                                    <h3 class="title">
										<?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                    </h3>
								<?php endif; ?>
								<?php foreach ( $settings['features'] as $features ):
									$image = ( ! empty( $features['image']['id'] ) ) ? wp_get_attachment_image_url( $features['image']['id'], 'full' ) : '';
									?>
                                    <div class="content-wrapper">
										<?php if ( ! empty( $image ) ): ?>
                                            <div class="box-1">
                                                <img src="<?php echo $image ?>" alt="shape">
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $features['title'] ) ) : ?>
                                            <p><?php echo $features['title']; ?></p>
										<?php endif; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
		<?php endif; ?>
		<?php
	}

}
