<?php

  // Theme function file
  function ah_set_post_views( $post_id ) {

    // Setting key
    $meta_key = 'post_views';
    $count    = get_post_meta( $post_id, $meta_key, true );

    // Check if key exists
    if ( $count == '' ) {
      // If key is empty set it to 0
      $count  = 0;
      add_post_meta( $post_id, $meta_key, $count );
    } else {
      $count++;
      add_post_meta( $post_id, $meta_key, $count );
    }

  }

  function ah_get_post_views( $post_id ) {

    // Setting key
    $meta_key = 'post_views';
    $count    = get_post_meta( $post_id, $meta_key, true );

    return $count;

  }
