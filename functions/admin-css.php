function acf_custom_radio_buttons() {
  echo '<style>';
  echo '
  
  .acf-radio-list li, .acf-field-radio[module_icon_add] .acf-radio-list li {
      float: left;
  }
  span.chartWindow {
      background: url(' . home_url() . '/wp-content/themes/buildingengines/assets/icons/Chart-Window_Royal-Blue.svg) no-repeat;
      text-indent: -9999px;
      display: inline-block;
      background-size: 32px;
      background-position: 0;
      width: 50px;
      height: 30px;
      padding: 5px 0;
  }
  
  span.clock {
      background: url(' . home_url() . '/wp-content/themes/buildingengines/assets/icons/Clock_Royal-Blue.svg) no-repeat;
      text-indent: -9999px;
      display: inline-block;
      background-size: 32px;
      background-position: 0;
      width: 50px;
      height: 30px;
      padding: 5px 0;
  }
  
  span.hvac {
      background: url(' . home_url() . '/wp-content/themes/buildingengines/assets/icons/HVAC_Royal-Blue.svg) no-repeat;
      text-indent: -9999px;
      display: inline-block;
      background-size: 32px;
      background-position: 0;
      width: 50px;
      height: 30px;
      padding: 5px 0;
  }
  span.invoice {
      background: url(' . home_url() . '/wp-content/themes/buildingengines/assets/icons/Invoice_Royal-Blue.svg) no-repeat;
      text-indent: -9999px;
      display: inline-block;
      background-size: 32px;
      background-position: 0;
      width: 50px;
      height: 30px;
      padding: 5px 0;
  }
  span.ribbon {
      background: url(' . home_url() . '/wp-content/themes/buildingengines/assets/icons/Ribbon_Royal-Blue.svg) no-repeat;
      text-indent: -9999px;
      display: inline-block;
      background-size: 32px;
      background-position: 0;
      width: 50px;
      height: 30px;
      padding: 5px 0;
  }
  span.trafficCone {
      background: url(' . home_url() . '/wp-content/themes/buildingengines/assets/icons/Traffic-Cone_Royal-Blue.svg) no-repeat;
      text-indent: -9999px;
      display: inline-block;
      background-size: 32px;
      background-position: 0;
      width: 50px;
      height: 30px;
      padding: 5px 0;
  }';
    
  echo '</style>';
}
add_action('admin_head', 'acf_custom_radio_buttons');
