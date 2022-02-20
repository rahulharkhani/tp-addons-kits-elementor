<!-- Start Profile Card 1 -->
<div class="elementor-card card-style-1">
	<div class="elementor-card-inner">
		<div class="front-wrapper">
			<div class="profile-bg elementor-content-background-color-wrapper"></div>
			<div class="front__bkg-photo">
				<?php
				$name = $settings['name'];
				$position = $settings['position'];
				$profileImage = ( !empty( $settings['user_image']['url'] ) ) ? $settings['user_image']['url'] : ELEMENTOR_ADDONS_KITS_URL.'/public/images/user-profile.jpg';
				echo esc_html( '<img src="' . $profileImage . '" alt="' . $name . '" />' );
				?>
			</div>
			<div class="bottom-bkg-info">
				<div class="front__text">
					<?php
					echo esc_html( '<h3 class="front__text-header">' . $name . '</h3>' );
					echo esc_html( '<span class="sub-title-show">' . $position . '</span>' );
					?>
					<p class="front__text-para para-below-info"><?php echo $settings['description']; ?></p>
					<?php if(!empty($settings['email'])) { ?>
						<p class="front__text-para info-para"><i class="fas fa-envelope front-icons"></i><a href="mailto:<?php echo $settings['email']; ?>"><?php echo $settings['email']; ?></a></p>
					<?php } ?>
					<?php if(!empty($settings['phone'])) { ?>
						<p class="front__text-para info-para"><i class="fas fa-mobile front-icons"></i><a href="tel:<?php echo $settings['phone']; ?>"><?php echo $settings['phone']; ?></a></p>
					<?php } ?>
					<?php if(!empty($settings['location'])) { ?>
						<p class="front__text-para info-para"><i class="fas fa-map-marker-alt front-icons"></i><?php echo $settings['location']; ?></p>
					<?php } ?>
					<div class="profile-icons">
						<div class="elementor-social-icons-wrapper">

							<?php
							foreach ($settings['social_icons'] as $index => $item) {

								$social = str_replace('fa fa-', '', $item['social']);
								
								$link_key = 'link_' . $index;

								$this->add_render_attribute($link_key, 'href', $item['link']['url']);

								if ($item['link']['is_external']) {
									$this->add_render_attribute($link_key, 'target', '_blank');
								}

								if ($item['link']['nofollow']) {
									$this->add_render_attribute($link_key, 'rel', 'nofollow');
								}
								?>
								<a class="elementor-icon elementor-social-icon elementor-social-icon-<?php echo $social . $class_animation; ?> elementor-animation-pop" <?php echo $this->get_render_attribute_string($link_key); ?> target="_blank">
									<span class="elementor-screen-only">Facebook</span>
									<i class="<?php echo str_replace('fa fa-', 'fab fa-', $item['social']); ?>"></i>
								</a>
							<?php } ?>

							<!-- <a class="elementor-icon elementor-social-icon elementor-social-icon-facebook elementor-animation-pop" href="" target="_blank">
								<span class="elementor-screen-only">Facebook</span>
									<i class="fab fa-facebook"></i>
							</a>
							<a class="elementor-icon elementor-social-icon elementor-social-icon-twitter elementor-animation-pop" href="" target="_blank">
								<span class="elementor-screen-only">Twitter</span>
									<i class="fab fa-twitter"></i>
							</a>
							<a class="elementor-icon elementor-social-icon elementor-social-icon-google-plus elementor-animation-pop" href="" target="_blank">
								<span class="elementor-screen-only">Google-plus</span>
								<i class="fab fa-google-plus"></i>
							</a>
							<a class="elementor-icon elementor-social-icon elementor-social-icon-wordpress elementor-animation-pop" href="" target="_blank">
								<span class="elementor-screen-only">WordPress</span>
								<i class="fab fa-wordpress"></i>
							</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Profile Card 1 -->