# WP Sorting Posts

In this repository I'll show you how can you sort posts through select option from frontend.

First we'll create select form and pass the values in option field like this
`value="?orderby=date&order=DESC"`

After that refresh the page through onchange event and select the selected value like this
`onchange="document.location.search=this.options[this.selectedIndex].value;"`

To confirm we get the values I suggest you to print the $_GET Global variable like this
`print_r($_GET);`

Now we pass that `$_GET` values through `WP_Query`
`if( $_GET['order'] != '' ) {
  $args['order'] = $_GET['order'];
}`

And

`if( $_GET['orderby'] != '' ) {
  $args['orderby'] = $_GET['orderby'];
}`

and then set them to `WP_Query`
`$query = new WP_Query( $args );`


You can find complete code in `index.php`.
