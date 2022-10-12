<?php

namespace ElementHelper\Widget;

use \Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Icons_Manager;
use \Elementor\Repeater;
use \Elementor\Core\Schemes;
use \Elementor\Group_Control_Background;
use \ElementHelper\Element_El_Select2;

defined( 'ABSPATH' ) || die();


class Post_List extends Element_El_Widget {

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
		return 'post_list';
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
		return __( 'Post List', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.net/widgets/post-list/';
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
		return 'eicon-parallax';
	}

	public function get_keywords() {
		return [ 'posts', 'post', 'post-list', 'list', 'news' ];
	}

	/**
	 * Get a list of All Post Types
	 *
	 * @return array
	 */
	public function get_post_types() {
		$post_types = elh_element_get_post_types( [], [ 'elementor_library', 'attachment' ] );

		return $post_types;
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
					'style_4' => __( 'Style 4', 'elementhelper' ),
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
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'condition'   => [
					'design_style' => [ 'style_3' ],
				],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label'       => __( 'Button Text', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->add_control(
			'button_link',
			[
				'label'       => __( 'Button Link', 'elementhelper' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();


		$this->start_controls_section(
			'_section_post_list',
			[
				'label' => __( 'List', 'elementhelper' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_type',
			[
				'label'   => __( 'Source', 'elementhelper' ),
				'type'    => Controls_Manager::SELECT,
				'options' => $this->get_post_types(),
				'default' => key( $this->get_post_types() ),
			]
		);

		$this->add_control(
			'show_post_by',
			[
				'label'   => __( 'Show post by:', 'elementhelper' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'recent',
				'options' => [
					'recent'   => __( 'Recent Post', 'elementhelper' ),
					'selected' => __( 'Selected Post', 'elementhelper' ),
				],

			]
		);

		$this->add_control(
			'posts_per_page',
			[
				'label'     => __( 'Item Limit', 'elementhelper' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 3,
				'dynamic'   => [ 'active' => true ],
				'condition' => [
					'show_post_by' => [ 'recent' ]
				]
			]
		);


		$repeater = [];

		foreach ( $this->get_post_types() as $key => $value ) {

			$repeater[ $key ] = new Repeater();

			$repeater[ $key ]->add_control(
				'title',
				[
					'label'       => __( 'Title', 'elementhelper' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'placeholder' => __( 'Customize Title', 'elementhelper' ),
					'dynamic'     => [
						'active' => true,
					],
				]
			);

			$repeater[ $key ]->add_control(
				'post_short_text',
				[
					'label'       => __( 'Short Content', 'elementhelper' ),
					'type'        => Controls_Manager::TEXTAREA,
					'label_block' => true,
					'placeholder' => __( 'Short Content', 'elementhelper' ),
					'rows'        => 3,
					'dynamic'     => [
						'active' => true,
					],
				]
			);


			$repeater[ $key ]->add_control(
				'service_author_name',
				[
					'label'       => __( 'Author Name', 'elementhelper' ),
					'type'        => Controls_Manager::TEXT,
					'label_block' => true,
					'default'     => __( 'Jon Williamson', 'elementhelper' ),
					'placeholder' => __( 'Author Name', 'elementhelper' ),
					'dynamic'     => [
						'active' => true,
					],
				]
			);


			$repeater[ $key ]->add_control(
				'post_id',
				[
					'label'        => __( 'Select ', 'elementhelper' ) . $value,
					'label_block'  => true,
					'type'         => Element_El_Select2::TYPE,
					'multiple'     => false,
					'placeholder'  => 'Search ' . $value,
					'data_options' => [
						'post_type' => $key,
						'action'    => 'elh_element_post_list_query'
					],
				]
			);


			$repeater[ $key ]->add_control(
				'title_tag',
				[
					'label'   => __( 'Title HTML Tag', 'elementhelper' ),
					'type'    => Controls_Manager::CHOOSE,
					'options' => [
						'h1' => [
							'title' => __( 'H1', 'elementhelper' ),
							'icon'  => 'eicon-editor-h1'
						],
						'h2' => [
							'title' => __( 'H2', 'elementhelper' ),
							'icon'  => 'eicon-editor-h2'
						],
						'h3' => [
							'title' => __( 'H3', 'elementhelper' ),
							'icon'  => 'eicon-editor-h3'
						],
						'h4' => [
							'title' => __( 'H4', 'elementhelper' ),
							'icon'  => 'eicon-editor-h4'
						],
						'h5' => [
							'title' => __( 'H5', 'elementhelper' ),
							'icon'  => 'eicon-editor-h5'
						],
						'h6' => [
							'title' => __( 'H6', 'elementhelper' ),
							'icon'  => 'eicon-editor-h6'
						]
					],
					'default' => 'h4',
					'toggle'  => false,
				]
			);

			$repeater[ $key ]->add_control(
				'align',
				[
					'label'     => __( 'Alignment', 'elementhelper' ),
					'type'      => Controls_Manager::CHOOSE,
					'options'   => [
						'left'   => [
							'title' => __( 'Left', 'elementhelper' ),
							'icon'  => 'fa fa-align-left',
						],
						'center' => [
							'title' => __( 'Center', 'elementhelper' ),
							'icon'  => 'fa fa-align-center',
						],
						'right'  => [
							'title' => __( 'Right', 'elementhelper' ),
							'icon'  => 'fa fa-align-right',
						],
					],
					'toggle'    => true,
					'selectors' => [
						'{{WRAPPER}}' => 'text-align: {{VALUE}};'
					]
				]
			);

			$this->add_control(
				'selected_list_' . $key,
				[
					'label'       => '',
					'type'        => Controls_Manager::REPEATER,
					'fields'      => $repeater[ $key ]->get_controls(),
					'title_field' => '{{ title }}',
					'condition'   => [
						'show_post_by' => 'selected',
						'post_type'    => $key
					],
				]
			);
		}

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

		$settings = $this->get_settings_for_display();
		if ( ! $settings['post_type'] ) {
			return;
		}
		$args = [
			'post_status' => 'publish',
			'post_type'   => $settings['post_type'],
		];
		if ( 'recent' === $settings['show_post_by'] ) {
			$args['posts_per_page'] = $settings['posts_per_page'];
		}

		$selected_post_type = 'selected_list_' . $settings['post_type'];

		$customize_title = [];
		$ids             = [];
		if ( 'selected' === $settings['show_post_by'] ) {
			$args['posts_per_page'] = - 1;
			$lists                  = $settings[ 'selected_list_' . $settings['post_type'] ];
			if ( ! empty( $lists ) ) {
				foreach ( $lists as $index => $value ) {
					$post_id = ! empty( $value['post_id'] ) ? $value['post_id'] : 0;
					$ids[]   = $post_id;
					if ( $value['title'] ) {
						$customize_title[ $post_id ] = $value['title'];
					}
				}
			}
			$args['post__in'] = (array) $ids;
			$args['orderby']  = 'post__in';
		}

		if ( 'selected' === $settings['show_post_by'] && empty( $ids ) ) {
			$posts = [];
		} else {
			$posts = new \WP_Query( $args );
		}

		$title = elh_element_kses_basic( $settings['title'] );

		$this->add_render_attribute( 'title', 'class', 'item_title' );

		if ( ! empty( $settings['design_style'] ) and $settings['design_style'] == 'style_4' ): ?>
            <div class="blog-section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 text-center">
							<?php if ( ! empty( $settings['title'] ) ) : ?>
                                <div class="blog-title">
                                    <h3><?php echo elh_element_kses_basic( $settings['title'] ); ?></h3>
                                </div>
							<?php endif; ?>
                            <div class="blog-search">
                                <form class="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                    <input type="text" placeholder="zoeken..." name="s">
                                    <button type="submit">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/arrow-icon.png"
                                             alt="icon">
                                    </button>
                                </form>
                            </div>
                            <div class="blog-categorie">
                                <p>
                                    Categorie: <?php
									$categories = get_categories();
									foreach ( $categories as $category ) {
										?>
                                        <a href="<?php echo get_category_link( $category->term_id ) ?>">
											<?php echo $category->cat_name; ?>
                                        </a>
										<?php
									}
									?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row blog-row  justify-content-center">
						<?php
						if ( ! empty( $posts->have_posts() ) ): ?>
							<?php while ( $posts->have_posts() ): $posts->the_post();
								?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                    <div class="blog-content-wrapper">
                                        <div class="thumb">
                                            <a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) );?>">
			                                    <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <h4>
			                                    <?php $title = get_the_title();
			                                    if ( 'selected' === $settings['show_post_by'] && array_key_exists( get_the_ID(), $customize_title ) ) {
				                                    $title = $customize_title[ get_the_ID() ];
			                                    }
			                                    printf( '<a href="%2$s">%1$s</a>',
				                                    esc_html( $title ),
				                                    esc_url( get_the_permalink( get_the_ID() ) )
			                                    );
			                                    ?>
                                            </h4>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; wp_reset_query(); ?>
						<?php
						else:
							printf( '%1$s %2$s %3$s',
								__( 'No ', 'elementhelper' ),
								esc_html( $settings['post_type'] ),
								__( 'Found', 'elementhelper' )
							);
						endif;
						?>
                    </div>
                </div>
            </div>
		<?php elseif ( ! empty( $settings['design_style'] ) and $settings['design_style'] == 'style_3' ): ?>
            <div class="projecten-section-2 pt-80">
                <div class="container">
					<?php if ( ! empty( $settings['title'] ) ) : ?>
                        <div class="row mb-50 mb-xs-50">
                            <div class="col-xl-12 text-center">
                                <h2 class="projecten-title mb-20">
									<?php echo elh_element_kses_basic( $settings['title'] ); ?>
                                </h2>
                                <p class="projecten-subtitle">
									<?php echo elh_element_kses_basic( $settings['subtitle'] ); ?>
                                </p>
                            </div>
                        </div>
					<?php endif; ?>
                    <div class="row projecten-row justify-content-center">
	                    <?php
	                    if ( ! empty( $posts->have_posts() ) ): ?>
		                    <?php while ( $posts->have_posts() ): $posts->the_post();
			                    ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                    <div class="projecten-wrapper">
                                        <div class="projecten-thumb">
                                            <a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>">
							                    <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                                            </a>
                                        </div>
                                        <div class="projecten-content">
						                    <?php $title = get_the_title();
						                    if ( 'selected' === $settings['show_post_by'] && array_key_exists( get_the_ID(), $customize_title ) ) {
							                    $title = $customize_title[ get_the_ID() ];
						                    }
						                    printf( '<h4 %1$s><a href="%3$s">%2$s</a></h4>',
							                    'class=""',
							                    esc_html( $title ),
							                    esc_url( get_the_permalink( get_the_ID() ) )
						                    );
						                    ?>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
		                    <?php endwhile; wp_reset_query(); ?>
	                    <?php
	                    else:
		                    printf( '%1$s %2$s %3$s',
			                    __( 'No ', 'elementhelper' ),
			                    esc_html( $settings['post_type'] ),
			                    __( 'Found', 'elementhelper' )
		                    );
	                    endif;
	                    ?>
                    </div>
					<?php if ( ! empty( $settings['button_text'] ) ): ?>
                        <div class="row mt-30">
                            <div class="col-xl-12 text-center">
                                <div class="projecten-btn">
                                    <a href="<?php echo esc_url( $settings['button_link'] ); ?>">
										<?php echo elh_element_kses_intermediate( $settings['button_text'] ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
		<?php elseif ( ! empty( $settings['design_style'] ) and $settings['design_style'] == 'style_2' ): ?>
            <div class="blog-section">
                <div class="container">
					<?php if ( ! empty( $settings['title'] ) ) : ?>
                        <div class="row mb-50 mb-xs-40">
                            <div class="col-xl-12 text-center">
                                <div class="blog-title">
                                    <h3><?php echo elh_element_kses_basic( $settings['title'] ); ?></h3>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                    <div class="row blog-row justify-content-center">
	                    <?php
	                    if ( ! empty( $posts->have_posts() ) ): ?>
		                    <?php while ( $posts->have_posts() ): $posts->the_post();
			                    ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                    <div class="blog-content-wrapper">
                                        <div class="thumb">
                                            <a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) );?>">
							                    <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <h4>
							                    <?php $title = get_the_title();
							                    if ( 'selected' === $settings['show_post_by'] && array_key_exists( get_the_ID(), $customize_title ) ) {
								                    $title = $customize_title[ get_the_ID() ];
							                    }
							                    printf( '<a href="%2$s">%1$s</a>',
								                    esc_html( $title ),
								                    esc_url( get_the_permalink( get_the_ID() ) )
							                    );
							                    ?>
                                            </h4>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
		                    <?php endwhile; wp_reset_query(); ?>
	                    <?php
	                    else:
		                    printf( '%1$s %2$s %3$s',
			                    __( 'No ', 'elementhelper' ),
			                    esc_html( $settings['post_type'] ),
			                    __( 'Found', 'elementhelper' )
		                    );
	                    endif;
	                    ?>
                    </div>
					<?php if ( ! empty( $settings['button_text'] ) ): ?>
                        <div class="row mt-30">
                            <div class="col-xl-12 text-center">
                                <div class="blog-btn">
                                    <a href="<?php echo esc_url( $settings['button_link'] ); ?>">
										<?php echo elh_element_kses_intermediate( $settings['button_text'] ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
		<?php else: ?>
            <div class="projecten-section">
                <div class="container">
					<?php if ( ! empty( $settings['title'] ) ) : ?>
                        <div class="row">
                            <div class="col-xl-12 text-center">
                                <h2 class="projecten-title mb-50"><?php echo elh_element_kses_basic( $settings['title'] ); ?></h2>
                            </div>
                        </div>
					<?php endif; ?>
                    <div class="row projecten-row justify-content-center">
	                    <?php
	                    if ( ! empty( $posts->have_posts() ) ): ?>
		                    <?php while ( $posts->have_posts() ): $posts->the_post();
			                    ?>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                    <div class="projecten-wrapper">
                                        <div class="projecten-thumb">
                                            <a href="<?php echo esc_url( get_the_permalink( get_the_ID() ) ); ?>">
							                    <?php echo get_the_post_thumbnail(get_the_ID(), 'full' ); ?>
                                            </a>
                                        </div>
                                        <div class="projecten-content">
						                    <?php $title = get_the_title();
						                    if ( 'selected' === $settings['show_post_by'] && array_key_exists( get_the_ID(), $customize_title ) ) {
							                    $title = $customize_title[ get_the_ID() ];
						                    }
						                    printf( '<h4 %1$s><a href="%3$s">%2$s</a></h4>',
							                    'class=""',
							                    esc_html( $title ),
							                    esc_url( get_the_permalink( get_the_ID() ) )
						                    );

						                    ?>
                                            <p><?php echo get_the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </div>
		                    <?php endwhile; wp_reset_query(); ?>
	                    <?php
	                    else:
		                    printf( '%1$s %2$s %3$s',
			                    __( 'No ', 'elementhelper' ),
			                    esc_html( $settings['post_type'] ),
			                    __( 'Found', 'elementhelper' )
		                    );
	                    endif;
	                    ?>
                    </div>
					<?php if ( ! empty( $settings['button_text'] ) ): ?>
                        <div class="row mt-md-30 mt-xs-30">
                            <div class="col-xl-12 text-center">
                                <div class="projecten-btn">
                                    <a href="<?php echo esc_url( $settings['button_link'] ); ?>">
										<?php echo elh_element_kses_intermediate( $settings['button_text'] ); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
            </div>
		<?php endif;
	}
}
