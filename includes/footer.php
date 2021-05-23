<footer>
			<section id="sp-bottom">
				<div class="container">
					<div class="container-inner">
						<div class="row">
							<div id="sp-bottom1" class="col-lg-4 ">
								<div class="sp-column ">
									<div class="sp-module ">
										<h3 class="sp-module-title">Info LT Restaurant</h3>
										<div class="sp-module-content">

											<div class="custom">
												<p style="text-align: left;">262 Milacina Mrest
													Street Behansed.</p>
												<p style="text-align: left;">+84 3333 6789.</p>
												<p style="text-align: left;"><a href="#">email@gmail.com</a>
												</p>
												<div class="footer-social">
													 <div class="social-media">
											              <a href="#" class="social-icon">
											                <i class="fab fa-twitter"></i>
											              </a>
											              <a href="#" class="social-icon">
											                <i class="fab fa-instagram"></i>
											              </a>
											        </div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="sp-bottom2" class="col-lg-4 ">
								<div class="sp-column ">
									<div class="sp-module ">
										<h3 class="sp-module-title">Latest News</h3>
										<div class="sp-module-content">
											<ul class="latestnews">
												<li>
													<a
														href="#">
														The Making of a Legacy: First Steps in
														the Trump Era <span>08
															October 2018</span>
													</a>
												</li>
												<li>
													<a
														href="#">
														How Marching for Science Risks
														Politicizing It <span>08 October
															2018</span>
													</a>
												</li>
												<li>
													<a
														href="#">
														After Setbacks and Suits, Miami to Open
														Science Museum <span>08
															October 2018</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div id="sp-bottom2" class="col-lg-4 ">
								<div class="sp-column ">
									<div class="sp-module ">
										<h3 class="sp-module-title">Latest News</h3>
										<div class="sp-module-content">
											<ul class="latestnews">
												<li>
													<a
														href="#">
														The Making of a Legacy: First Steps in
														the Trump Era <span>08
															October 2018</span>
													</a>
												</li>
												<li>
													<a
														href="#">
														How Marching for Science Risks
														Politicizing It <span>08 October
															2018</span>
													</a>
												</li>
												<li>
													<a
														href="#">
														After Setbacks and Suits, Miami to Open
														Science Museum <span>08
															October 2018</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</footer>
		<!-- End For version 1,2,3,4,6 -->
	</div>
	<!--page-->

	<script type="text/javascript">
		jQuery('.pledge').click(function () {
			var host = 'https://' + location.host;
			var urlPath = location.pathname;

			jQuery.post(urlPath + '?/confirm', jQuery('#pledgeForm').serialize(), function (data) {
				if (data.status == 'fail') {
					jAlert('<center>A minimum order of Php ' + data.amount +
						' is required to proceed with the transaction.<center>', 'Warning!');
				} else {
					if (data.amount > 5000) {
						jConfirm(
							'Orders of at least Php 5000 are required to be settled via credit card payment online.',
							'Message',
							function (r) {
								if (r == true) {
									jQuery(window.location).attr('href', urlPath + '?/' + data
										.urlRedirect);
								} else {
									return false;
								}
							});
					} else {
						jQuery(window.location).attr('href', urlPath + '?/' + data.urlRedirect);
					}

				}
			}, 'JSON');
		});

		jQuery(document).ready(function () {

			jQuery('#thm-rev-slider').show().revolution({
				dottedOverlay: 'none',
				delay: 5000,
				startwidth: 0,
				startheight: 900,

				hideThumbs: 200,
				thumbWidth: 200,
				thumbHeight: 50,
				thumbAmount: 2,

				navigationType: 'thumb',
				navigationArrows: 'solo',
				navigationStyle: 'round',

				touchenabled: 'on',
				onHoverStop: 'on',

				swipe_velocity: 0.7,
				swipe_min_touches: 1,
				swipe_max_touches: 1,
				drag_block_vertical: false,

				spinner: 'spinner0',
				keyboardNavigation: 'off',

				navigationHAlign: 'center',
				navigationVAlign: 'bottom',
				navigationHOffset: 0,
				navigationVOffset: 20,

				soloArrowLeftHalign: 'left',
				soloArrowLeftValign: 'center',
				soloArrowLeftHOffset: 20,
				soloArrowLeftVOffset: 0,

				soloArrowRightHalign: 'right',
				soloArrowRightValign: 'center',
				soloArrowRightHOffset: 20,
				soloArrowRightVOffset: 0,

				shadow: 0,
				fullWidth: 'on',
				fullScreen: 'on',

				stopLoop: 'off',
				stopAfterLoops: -1,
				stopAtSlide: -1,

				shuffle: 'off',

				autoHeight: 'on',
				forceFullWidth: 'off',
				fullScreenAlignForce: 'off',
				minFullScreenHeight: 0,
				hideNavDelayOnMobile: 1500,

				hideThumbsOnMobile: 'off',
				hideBulletsOnMobile: 'off',
				hideArrowsOnMobile: 'off',
				hideThumbsUnderResolution: 0,

				hideSliderAtLimit: 0,
				hideCaptionAtLimit: 0,
				hideAllCaptionAtLilmit: 0,
				startWithSlide: 0,
				fullScreenOffsetContainer: ''
			});
		});
	</script>
</body>

<!-- Mirrored from delivery.dencios.com.ph/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 11 Apr 2021 19:03:15 GMT -->

</html>