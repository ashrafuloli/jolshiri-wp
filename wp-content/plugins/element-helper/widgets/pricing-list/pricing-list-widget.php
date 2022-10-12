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

class Pricing_List extends Element_El_Widget {

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
		return 'pricing_list';
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
		return __( 'Pricing List', 'elementhelper' );
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
		return [ 'pricing', 'list', 'icon' ];
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
				'label'       => __( 'Title', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->add_control(
			's_title_2',
			[
				'label'       => __( 'Title 2', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_pricing_1',
			[
				'label' => __( 'Pricing Content 1', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_1',
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
			'price_1',
			[
				'label'       => __( 'Price', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'month_1',
			[
				'label'       => __( 'Month', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);


		$repeater = new Repeater();


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
			'features_1',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Feature Item"); #>'
			]
		);

		$this->add_control(
			'info_1',
			[
				'label'       => __( 'Info 1', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_text_1',
			[
				'label'       => __( 'Button Text 1', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_link_1',
			[
				'label'       => __( 'Button Link 1', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_pricing_2',
			[
				'label' => __( 'Pricing Content 2', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_2',
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
			'price_2',
			[
				'label'       => __( 'Price', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'month_2',
			[
				'label'       => __( 'Month', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);


		$repeater = new Repeater();


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
			'features_2',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Feature Item"); #>'
			]
		);

		$this->add_control(
			'info_2',
			[
				'label'       => __( 'Info 2', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_text_2',
			[
				'label'       => __( 'Button Text 2', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_link_2',
			[
				'label'       => __( 'Button Link 2', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_pricing_3',
			[
				'label' => __( 'Pricing Content 3', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_3',
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
			'price_3',
			[
				'label'       => __( 'Price', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'month_3',
			[
				'label'       => __( 'Month', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);


		$repeater = new Repeater();


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
			'features_3',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(title || "Feature Item"); #>'
			]
		);

		$this->add_control(
			'info_3',
			[
				'label'       => __( 'Info 3', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_text_3',
			[
				'label'       => __( 'Button Text 3', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'btn_link_3',
			[
				'label'       => __( 'Button Link 3', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
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
		<?php if ( $settings['design_style'] === 'style_3' ): ?>
		<?php else: ?>
            <div class="pricing-area pt-125 pb-125 pt-xs-80 pb-xs-80">
                <div class="container">
                    <div class="row justify-content-center mb-60">
                        <div class="col-xl-6" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                            <div class="pricing-title text-center">
								<?php if ( ! empty( $settings['title'] ) ): ?>
                                    <h2>
										<?php echo elh_element_kses_intermediate( $settings['title'] ); ?>
                                    </h2>
								<?php endif; ?>
								<?php if ( ! empty( $settings['description'] ) ): ?>
                                    <p>
										<?php echo elh_element_kses_intermediate( $settings['description'] ); ?>
                                    </p>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
						<?php if ( ! empty( $settings['title_1'] ) ): ?>
                            <div class="col-xl-3 col-lg-5 col-md-6 mb-30">
                                <div class="pricing-wrap">
                                    <div class="content">
										<?php if ( ! empty( $settings['title_1'] ) ): ?>
                                            <div class="title">
												<?php echo elh_element_kses_intermediate( $settings['title_1'] ); ?>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['price_1'] ) ): ?>
                                            <div class="price">
												<?php echo $settings['price_1']; ?>
                                                <span><?php echo $settings['month_1']; ?></span>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['features_1'] ) ): ?>
                                            <div class="list">
                                                <ul>
													<?php foreach ( $settings['features_1'] as $features ): ?>
                                                        <li>
                                                            <i class="fa-solid fa-check"></i> <?php echo $features['title']; ?>
                                                        </li>
													<?php endforeach; ?>
                                                </ul>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['info_1'] ) ): ?>
                                            <div class="info">
                                                <p><?php echo $settings['info_1']; ?></p>
                                            </div>
										<?php endif; ?>
                                    </div>
									<?php if ( ! empty( $settings['btn_text_1'] ) ): ?>
                                        <div class="price-btn">
                                            <a href="<?php echo $settings['btn_link_1']; ?>"><?php echo $settings['btn_text_1']; ?></a>
                                        </div>
									<?php endif; ?>
                                </div>
                            </div>
						<?php endif; ?>
						<?php if ( ! empty( $settings['title_2'] ) ): ?>
                            <div class="col-xl-3 col-lg-5 col-md-6 mb-30">
                                <div class="pricing-wrap">
                                    <div class="content">
										<?php if ( ! empty( $settings['title_2'] ) ): ?>
                                            <div class="title">
												<?php echo elh_element_kses_intermediate( $settings['title_2'] ); ?>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['price_2'] ) ): ?>
                                            <div class="price">
												<?php echo $settings['price_2']; ?>
                                                <span><?php echo $settings['month_2']; ?></span>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['features_2'] ) ): ?>
                                            <div class="list">
                                                <ul>
													<?php foreach ( $settings['features_2'] as $features ): ?>
                                                        <li>
                                                            <i class="fa-solid fa-check"></i> <?php echo $features['title']; ?>
                                                        </li>
													<?php endforeach; ?>
                                                </ul>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['info_2'] ) ): ?>
                                            <div class="info">
                                                <p><?php echo $settings['info_2']; ?></p>
                                            </div>
										<?php endif; ?>
                                    </div>
									<?php if ( ! empty( $settings['btn_text_2'] ) ): ?>
                                        <div class="price-btn">
                                            <a href="<?php echo $settings['btn_link_2']; ?>"><?php echo $settings['btn_text_2']; ?></a>
                                        </div>
									<?php endif; ?>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
                    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
						<?php if ( ! empty( $settings['s_title_2'] ) ): ?>
                            <div class="col-xl-12">
                                <div class="info-title text-center mb-20">
                                    <h2><?php echo elh_element_kses_intermediate( $settings['s_title_2'] ); ?></h2>
                                </div>
                            </div>
						<?php endif; ?>
						<?php if ( ! empty( $settings['title_3'] ) ): ?>
                            <div class="col-xl-6 col-lg-10">
                                <div class="pricing-wrap-2">
                                    <div class="content">
										<?php if ( ! empty( $settings['title_3'] ) ): ?>
                                            <div class="title">
												<?php echo elh_element_kses_intermediate( $settings['title_3'] ); ?>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['features_3'] ) ): ?>
                                            <div class="list">
                                                <ul>
													<?php foreach ( $settings['features_3'] as $features ): ?>
                                                        <li>
                                                            <i class="fa-solid fa-check"></i> <?php echo $features['title']; ?>
                                                        </li>
													<?php endforeach; ?>
                                                </ul>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['price_3'] ) ): ?>
                                            <div class="price">
												<?php echo $settings['price_3']; ?>
                                                <span><?php echo $settings['month_3']; ?></span>
                                            </div>
										<?php endif; ?>
										<?php if ( ! empty( $settings['info_3'] ) ): ?>
                                            <div class="info">
                                                <p><?php echo $settings['info_3']; ?></p>
                                            </div>
										<?php endif; ?>
                                    </div>
									<?php if ( ! empty( $settings['btn_text_3'] ) ): ?>
                                        <div class="price-btn">
                                            <a href="<?php echo $settings['btn_link_3']; ?>"><?php echo $settings['btn_text_3']; ?></a>
                                        </div>
									<?php endif; ?>
                                </div>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
            </div>
		<?php endif; ?>
		<?php
	}

}
