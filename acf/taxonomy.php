<?php 
$term = get_field('which_location'); ?>

<?php var_dump($term) ?> // find info on tax field

<?php $marvin = $term[0]->slug; ?> // this makes it readable

<?php echo (get_term_by('slug', $marvin, 'install_locations')->description); ?> // this shows description