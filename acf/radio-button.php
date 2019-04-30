<section class="cs-stats">
    <div class="container">
        <!-- This is the acf field for radio button -->
        <?php $whichs = get_field('which_stats'); ?>
        
        <!-- This is the acf field for a radio selection -->
        <?php if($whichs == 'ones'): ?>


            <div class="row single-stat">
                <?php if (have_rows('single_stat')) : while (have_rows('single_stat')) : the_row();
                    $stat_percent_single =  get_sub_field('single_percentage');
                    $stat_label_single = get_sub_field('single_label');
                    ?>

                    <div class="col-lg-9">
                        <h4>THE RESULTS</h4>
                        <div><?php the_field('cs_results') ?></div>
                    </div>

                    <div class="col-lg-3">
                        <div class="cs-stats__item">
                            <div class="bluecircle" data-percent="<?php echo  $stat_percent_single ?>"></div>
                            <div class="stat-number">+<?php echo  $stat_percent_single ?>%</div>
                            <div class="stat-label"><?php echo $stat_label_single ?></div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>
            </div>

        <?php endif; ?>

        <!-- This is the acf field for a radio selection -->

        <?php if($whichs == 'mores'): ?> 
            <div class="row">

                <div class="col-lg-12">
                    <h4>THE RESULTS</h4>
                    <div><?php the_field('cs_results') ?></div>
                </div>

            </div>

            <div class="row">
                <?php if (have_rows('stat_numbers')) : while (have_rows('stat_numbers')) : the_row();
                    $stat_percent =  get_sub_field('percentage');
                    $stat_label = get_sub_field('label');
                    ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="cs-stats__item">
                            <div class="bluecircle" data-percent="<?php echo  $stat_percent ?>"></div>
                            <div class="stat-number">+<?php echo  $stat_percent ?>%</div>
                            <div class="stat-label"><?php echo $stat_label ?></div>
                        </div>
                    </div>
                <?php endwhile; endif; ?>

            </div>
        </div>
    </section>

    <?php endif; ?>