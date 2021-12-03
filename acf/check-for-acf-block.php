<?php
// From where the ACF Blocks are registered..
// ACF Block
acf_register_block_type(array(
  'name'              => 'hero',
  'title'             => __('Hero'),
  'render_template'   => '/template-parts/blocks/hero.php',
  'category'          => 'union-blocks',
  'mode' => 'edit',
));
?>


<?php if (!has_block('acf/hero')) : ?>
  <div class="container">
    <div class="row">
      <div class="col">
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header>
      </div>
    </div>
  </div>
<?php endif; ?>