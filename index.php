<div id="sortby"> SORT BY: &nbsp;
  <select class="dropdown-class" name="sort-posts" id="sortbox" onchange="document.location.search=this.options[this.selectedIndex].value;">

    <option disabled>Sort by</option>

    <!-- Arranged posts in ASC/DESC order -->
    <option <?php if( isset($_GET["orderby"]) && trim($_GET["orderby"]) == 'date' && isset($_GET["order"]) && trim($_GET["order"]) == 'DESC' ){ echo 'selected'; } ?> value="?orderby=date&order=DESC">Newest</option>
    <option <?php if( isset($_GET["orderby"]) && trim($_GET["orderby"]) == 'date' && isset($_GET["order"]) && trim($_GET["order"]) == 'ASC' ){ echo 'selected'; } ?> value="?orderby=date&order=ASC">Oldest</option>

    <!-- Arranged posts through meta values in ASC/DESC order -->
    <option <?php if( isset($_GET["orderby"]) && trim($_GET["orderby"]) == 'post_views' && isset($_GET["order"]) && trim($_GET["order"]) == 'DESC' ){ echo 'selected'; } ?> value="?orderby=post_views&order=DESC">Most Viewed</option>
    <option <?php if( isset($_GET["orderby"]) && trim($_GET["orderby"]) == 'post_views' && isset($_GET["order"]) && trim($_GET["order"]) == 'ASC' ){ echo 'selected'; } ?> value="?orderby=post_views&order=ASC">Least Viewed</option>

  </select>
</div>

<?php
  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => 'post',
    'paged'			=> $paged,
  );

  // GET arguments and check if it's empty or not
  if( $_GET['order'] != '' ) {
    $args['order'] = $_GET['order'];
  }

  if( $_GET['orderby'] != '' ) {
    if ( $_GET['orderby'] === 'post_views' ) {
      $args['meta_key']	=	'post_views'; // Set meta value
      $args['orderby']	=	'meta_value_num'; // Order meta value
    } else {
      $args['orderby'] = $_GET['orderby'];
    }
  }

  $query = new WP_Query( $args );
  if($query->have_posts()):
    while ($query->have_posts()) : $query->the_post();
      // the_content();
    endwhile;
    wp_reset_postdata();
  endif;
?>
