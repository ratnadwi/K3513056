<?php
  $this->load->view('header');
  $this->load->view('menu'); 
?>    
      <div class="paging" align="right"><?php echo $pagination; ?></div>
      <div class="table table-bordered table-striped"><?php echo $table; ?></div>
      <div class="paging" align="right"><?php echo $pagination; ?></div>
      
<?php $this->load->view('footer'); ?>
