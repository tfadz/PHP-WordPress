// Set up your class (Make sure to require to create a sep file in your functions by doing):
  require get_template_directory() . '/classes/svg-images.php';

 <?php

  class TerrySvgs {

    public $suntimes_star = '<svg width="13px" height="15px" viewBox="0 0 15 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g class="cst-star" fill-rule="nonzero">
      <polygon fill="" points="5.768245 5.88219225 7.49975356 0 9.23224789 5.88219225 15 4.5002561 10.9642493 9 15 13.5002561 9.23224789 12.1178078 7.49975356 18 5.768245 12.1178078 0 13.5002561 4.03575067 9 0 4.5002561"></polygon>
      </g>
      </g>
      </svg>';

    public $hektor = 'Hektor';

   }
?>


// In Seperate php file to call from class

<div class="container star" style="padding: 2rem 0;">
    
  <?php 
      $terry = new TerrySvgs();
      echo $terry->suntimes_star;
      echo '<h1>' . $terry->hektor . '</h1>';
  ?>
        
</div>
