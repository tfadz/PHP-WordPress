// Adding a acf field to a Edit Category page

<?php $term = get_queried_object(); ?> 
<?php $sched = get_field('your-custom-field-name', $term); ?>
<?php echo $sched; ?>