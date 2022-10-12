<?php

namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Control_Media;
use \Elementor\Core\Schemes\Typography;
use Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Team extends Element_El_Widget {

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
		return 'team';
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
		return __( 'Team', 'elementhelper' );
	}

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/team/';
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
		return 'eicon-blockquote';
	}

	public function get_keywords() {
		return [ 'team', 'review', 'feedback' ];
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
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_info',
			[
				'label'     => __( 'Info', 'elementhelper' ),
				'tab'       => Controls_Manager::TAB_CONTENT,
				'condition' => [
					'design_style' => [ 'style_1' ],
				],
			]
		);

		$this->add_control(
			'i_title',
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
			'i_description',
			[
				'label'       => __( 'Description', 'elementhelper' ),
				'type'        => Controls_Manager::WYSIWYG,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'_section_team',
			[
				'label' => __( 'Team', 'elementhelper' ),
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
			'short_content',
			[
				'label'       => __( 'Short Content', 'elementhelper' ),
				'type'        => Controls_Manager::TEXTAREA,
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				]
			]
		);

		$repeater->add_control(
			'content',
			[
				'label'       => __( 'Content', 'elementhelper' ),
				'type'        => Controls_Manager::WYSIWYG,
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
			'teams',
			[
				'show_label'  => false,
				'type'        => Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'title_field' => '<# print(name || "Team Item"); #>'
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
		$settings = $this->get_settings_for_display();
		?>
		<?php if ( $settings['design_style'] === 'style_2' ): ?>
            <div class="therapists-area pt-40 pb-40">
                <div class="container">
                    <div class="row" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
						<?php if ( ! empty( $settings['title'] ) ): ?>
                            <div class="col-xl-12 text-center">
                                <h4 class="therapists-title"><?php echo $settings['title']; ?></h4>
                            </div>
						<?php endif; ?>

						<?php foreach ( $settings['teams'] as $key => $team ):
							$image = ! empty( $team['image']['url'] ) ? wp_get_attachment_image_url( $team['image']['id'], 'full' ) : '';
							?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="team-wrapper">
									<?php if ( ! empty( $image ) ): ?>
                                        <div class="team-img">
                                            <img src="<?php echo $image; ?>" alt="thumb">
                                        </div>
									<?php endif; ?>

                                    <div class="team-content">
                                        <h5>
											<?php echo $team['name']; ?>
                                        </h5>
                                        <p class="subtitle"><?php echo $team['destination']; ?></p>
                                        <div class="content">
											<?php if ( ! empty( $team['short_content'] ) ): ?>
                                                <div class="text">
                                                    <p>
														<?php echo $team['short_content']; ?>
                                                    </p>
                                                </div>
											<?php endif; ?>
                                            <a href="#" class="read-more" data-bs-toggle="modal"
                                               data-bs-target="#team-modal-2-<?php echo $key; ?>">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
			<?php foreach ( $settings['teams'] as $key => $team ):
				$image = ! empty( $team['image']['url'] ) ? wp_get_attachment_image_url( $team['image']['id'], 'full' ) : '';
				?>
                <div class="modal team-modal fade" id="team-modal-2-<?php echo $key; ?>" tabindex="-1"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="team-modal-wrapper">
									<?php if ( ! empty( $image ) ): ?>
                                        <div class="thumb">
                                            <img src="<?php echo $image; ?>" alt="thumb">
                                        </div>
									<?php endif; ?>

                                    <div class="content">
                                        <h5>
											<?php echo $team['name']; ?>
                                        </h5>

                                        <p class="subtitle"><?php echo $team['destination']; ?></p>

										<?php if ( ! empty( $team['content'] ) ): ?>
                                            <div class="text">
												<?php echo $team['content']; ?>
                                            </div>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
		<?php else: ?>
            <div class="team-area pt-200 pt-lg-130 pt-md-130 pt-xs-130">
                <div class="container">
                    <div class="row" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        <div class="col-xl-12 text-center mb-155 mb-lg-100 mb-md-80 mb-xs-50">
                            <div class="t-top-wrap">
								<?php if ( ! empty( $settings['i_title'] ) ): ?>
                                    <h2><?php echo $settings['i_title']; ?></h2>
								<?php endif; ?>

								<?php if ( ! empty( $settings['i_description'] ) ): ?>
									<?php echo $settings['i_description']; ?>
								<?php endif; ?>
                            </div>
                        </div>
						<?php if ( ! empty( $settings['title'] ) ): ?>
                            <div class="col-xl-12 text-center">
                                <h4 class="team-title"><?php echo $settings['title']; ?></h4>
                            </div>
						<?php endif; ?>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
						<?php foreach ( $settings['teams'] as $key => $team ):
							$image = ! empty( $team['image']['url'] ) ? wp_get_attachment_image_url( $team['image']['id'], 'full' ) : '';
							?>
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="team-wrapper">
									<?php if ( ! empty( $image ) ): ?>
                                        <div class="team-img">
                                            <img src="<?php echo $image; ?>" alt="thumb">
                                        </div>
									<?php endif; ?>

                                    <div class="team-content">
                                        <h5>
											<?php echo $team['name']; ?>
                                        </h5>
                                        <p class="subtitle"><?php echo $team['destination']; ?></p>
                                        <div class="content">
											<?php if ( ! empty( $team['short_content'] ) ): ?>
                                                <div class="text">
                                                    <p>
														<?php echo $team['short_content']; ?>
                                                    </p>
                                                </div>
											<?php endif; ?>
                                            <a href="#" class="read-more" data-bs-toggle="modal"
                                               data-bs-target="#team-modal-<?php echo $key; ?>">Read
                                                More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
						<?php endforeach; ?>
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
                <div class="team-shape">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/shape/shape-6.png"
                         alt="shape">
                </div>
            </div>

			<?php foreach ( $settings['teams'] as $key => $team ):
				$image = ! empty( $team['image']['url'] ) ? wp_get_attachment_image_url( $team['image']['id'], 'full' ) : '';
				?>
                <div class="modal team-modal fade" id="team-modal-<?php echo $key; ?>" tabindex="-1"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="team-modal-wrapper">
									<?php if ( ! empty( $image ) ): ?>
                                        <div class="thumb">
                                            <img src="<?php echo $image; ?>" alt="thumb">
                                        </div>
									<?php endif; ?>

                                    <div class="content">
                                        <h5>
											<?php echo $team['name']; ?>
                                        </h5>

                                        <p class="subtitle"><?php echo $team['destination']; ?></p>

										<?php if ( ! empty( $team['content'] ) ): ?>
                                            <div class="text">
												<?php echo $team['content']; ?>
                                            </div>
										<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			<?php endforeach; ?>
		<?php endif; ?>
		<?php
	}
}
