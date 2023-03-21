<section class="slider-section ">
            <div class="container content-wrapper">

                <div class="row">
                    <div class="col-lg-8 col-12">
                        <p class="small-title white mb-0 text-start">Additional Benefits of Driving with MVL</p>
                    </div>
                </div>

                <!-- <div class="row owl-row "> -->
                    <div class="owl-carousel">
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $wpb_all_query = new WP_Query(array(
                            'post_type' => 'post', 'category_name' => 'benefits', 'post_status' => 'publish, private', 'posts_per_page' => -1,
                        )); ?>
                        <?php if ($wpb_all_query->have_posts()) :  ?>
                            <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>

                                <div class="h-100">
                                    <div class="card ">
                                        <div class="card-img">
                                            <img alt="<?php echo get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>" src="<?php the_post_thumbnail_url(''); ?>" class="img-fluid">
                                        </div>
                                        <div class="card-title px-5 py-6">
                                            <h4>
												<?php echo str_replace('Private: ','',get_the_title()); ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                        <?php endwhile;
                        endif; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                <!-- </div> -->
            </div>

            <div class="container slider-apply-button position-relative">
                <div>
                    <a href="<?php echo get_permalink(get_page_by_title('Apply Now')); ?>" class="btn outlined " data-bs-toggle="modal" data-bs-target="#TheModal" data-bs-page="questionaire">Apply now</a>
                </div>
            </div>

        </section>