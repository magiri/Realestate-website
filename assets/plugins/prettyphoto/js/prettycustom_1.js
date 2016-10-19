$(document).ready(function() {
    $("a[rel^='prettyPhoto']").prettyPhoto({
    animation_speed: 'normal',
            theme: 'light_square',
            slideshow: 3000,
            autoplay_slideshow: false,
            social_tools:false,
//            allow_resize: true,
//             default_width:500,
//        default_height: 344,
//        horizontal_padding: 20,
           
            markup: '<div widthclass="pp_pic_holder">  \
						<div class="ppt">&nbsp;</div> \
						<div class="pp_top"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
						<div class="pp_content_container"> \
							<div class="pp_left"> \
							<div class="pp_right"> \
								<div class="pp_content"> \
									<div class="pp_loaderIcon"></div> \
									<div class="pp_fade"> \
										<a href="#" class="pp_expand" title="Expand the image">Expand</a> \
										<div class="pp_hoverContainer"> \
											<a class="pp_next" href="#">next</a> \
											<a class="pp_previous" href="#">previous</a> \
										</div> \
										<div id="pp_full_res"></div> \
										<div class="pp_details"> \
											<div class="pp_nav"> \
												<a href="#" class="pp_arrow_previous"><h3>Previous</h3></a> \
												<p class="currentTextHolder">0/0</p> \
												<a href="#" class="pp_arrow_next"><h3>Next</h3></a> \
											</div> \<br/> \ <br/> \ \
                                                                                          <div style="padding: 1%;width: 100%;"  class="pp_description">  </div> \
                                                                                          <a class="pp_close" href="#">Close</a> \ \n\
                                                                                  </div> \
											<div class="pp_social">{pp_social}</div> \
											\
									</div> \
								</div> \
							</div> \
							</div> \
						</div> \
						<div class="pp_bottom"> \
							<div class="pp_left"></div> \
							<div class="pp_middle"></div> \
							<div class="pp_right"></div> \
						</div> \
					</div> \
					<div class="pp_overlay"></div>'
       
});
});