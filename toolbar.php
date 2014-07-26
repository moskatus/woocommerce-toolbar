<div class="toolbar-container">
<div class="toolbar">
<a href="<?php bloginfo( 'url' ) ?>" title="<?php bloginfo( 'name' ) ?>" class="logo"></a>
<div class="busca">
  <?php get_product_search_form(); ?>
  </div>
<div class="carrinho">  
<ul class="nav wc-nav"><?php woocommerce_cart_link(); ?>
</ul>;

   
</div>
</div> 
</div>
