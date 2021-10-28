<?php



////Theme Options
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'Theme options',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
}

/*for set featured image*/
add_theme_support( 'post-thumbnails' );


/* for nav bar menu for header */
function wpb_custom_new_menu() {
  register_nav_menu('my-custom-menu',__( 'main-menu' ));
  register_nav_menu('menu-new-home', 'New Home Main Menu');
}
add_action( 'init', 'wpb_custom_new_menu' );

/* for nav bar menu for footer*/
function wpb_footer_new_menu() {
  register_nav_menu('my-footer-menu',__( 'footer-menu' ));
}
add_action( 'init', 'wpb_footer_new_menu' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);


//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}


function wpb_widgets_init() {

    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'wpb' ),
        'id' => 'sidebar-1',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

    register_sidebar( array(
        'name' =>__( 'Front page sidebar', 'wpb'),
        'id' => 'sidebar-2',
        'description' => __( 'Appears on the static front page template', 'wpb' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    }

add_action( 'widgets_init', 'wpb_widgets_init' );



//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_project_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_project_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'project_category', 'taxonomy general name' ),
    'singular_name' => _x( 'project_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search project_category' ),
    'all_items' => __( 'All project_category' ),
    'parent_item' => __( 'Parent project_category' ),
    'parent_item_colon' => __( 'Parent project_category:' ),
    'edit_item' => __( 'Edit project_category' ),
    'update_item' => __( 'Update project_category' ),
    'add_new_item' => __( 'Add New project_category' ),
    'new_item_name' => __( 'New project_category Name' ),
    'menu_name' => __( 'project_category' ),
  );

// Now register the taxonomy

  register_taxonomy('project_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'project_category' ),
  ));

}


/*Custom Post type start*/
    function cw_post_type_services() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('services', 'plural'),
    'singular_name' => _x('services', 'singular'),
    'menu_name' => _x('services', 'admin menu'),
    'name_admin_bar' => _x('services', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New services'),
    'new_item' => __('New services'),
    'edit_item' => __('Edit services'),
    'view_item' => __('View services'),
    'all_items' => __('All services'),
    'search_items' => __('Search services'),
    'not_found' => __('No services found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'services'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-multisite',
    );

    register_post_type('services', $args);
    }

    add_action('init', 'cw_post_type_services');
    /*Custom Post type end*/

/*Custom Post type start*/
    function cw_post_type_job() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('job', 'plural'),
    'singular_name' => _x('job', 'singular'),
    'menu_name' => _x('job', 'admin menu'),
    'name_admin_bar' => _x('job', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New job'),
    'new_item' => __('New job'),
    'edit_item' => __('Edit job'),
    'view_item' => __('View services'),
    'all_items' => __('All job'),
    'search_items' => __('Search job'),
    'not_found' => __('No job found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'job'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-multisite',
    );

    register_post_type('job', $args);
    }

    add_action('init', 'cw_post_type_job');
    /*Custom Post type end*/

/*Custom Post type start*/
    function cw_post_type_team() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('team', 'plural'),
    'singular_name' => _x('team', 'singular'),
    'menu_name' => _x('team', 'admin menu'),
    'name_admin_bar' => _x('team', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New team'),
    'new_item' => __('New team'),
    'edit_item' => __('Edit team'),
    'view_item' => __('View team'),
    'all_items' => __('All team'),
    'search_items' => __('Search team'),
    'not_found' => __('No team found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'team'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-home',
    );

    register_post_type('team', $args);
    }

    add_action('init', 'cw_post_type_team');
    /*Custom Post type end*/


/*Contact form 7 remove span*/
add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

    $content = str_replace('<br />', '', $content);

    return $content;
});


    function pagination_bar() {
    global $wp_query;

    $total_pages = $wp_query->max_num_pages;

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}


function wpbeginner_numeric_posts_nav() {

    if( is_singular() )
        return;

    global $wp_query;

    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;

    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );

    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;

    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<nav aria-label="..." class="col-100"><ul class="pagination">' . "\n";

    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li class="arrow-prev">%s</li>' . "\n", get_previous_posts_link() );

    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';

        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }

    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";

        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }

    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li class="arrow-next">%s</li>' . "\n", get_next_posts_link() );

    echo '</ul></nav>' . "\n";

}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_work_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_work_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'work_category', 'taxonomy general name' ),
    'singular_name' => _x( 'work_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search work_category' ),
    'all_items' => __( 'All work_category' ),
    'parent_item' => __( 'Parent work_category' ),
    'parent_item_colon' => __( 'Parent work_category:' ),
    'edit_item' => __( 'Edit work_category' ),
    'update_item' => __( 'Update work_category' ),
    'add_new_item' => __( 'Add New work_category' ),
    'new_item_name' => __( 'New work_category Name' ),
    'menu_name' => __( 'work_category' ),
  );

// Now register the taxonomy

  register_taxonomy('work_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'work_category' ),
  ));

}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_video_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_video_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'video_category', 'taxonomy general name' ),
    'singular_name' => _x( 'video_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search video_category' ),
    'all_items' => __( 'All video_category' ),
    'parent_item' => __( 'Parent video_category' ),
    'parent_item_colon' => __( 'Parent video_category:' ),
    'edit_item' => __( 'Edit video_category' ),
    'update_item' => __( 'Update video_category' ),
    'add_new_item' => __( 'Add New video_category' ),
    'new_item_name' => __( 'New video_category Name' ),
    'menu_name' => __( 'video_category' ),
  );

// Now register the taxonomy

  register_taxonomy('video_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'video_category' ),
  ));

}


//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_News_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_News_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'News_category', 'taxonomy general name' ),
    'singular_name' => _x( 'News_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search News_category' ),
    'all_items' => __( 'All News_category' ),
    'parent_item' => __( 'Parent News_category' ),
    'parent_item_colon' => __( 'Parent News_category:' ),
    'edit_item' => __( 'Edit News_category' ),
    'update_item' => __( 'Update News_category' ),
    'add_new_item' => __( 'Add New News_category' ),
    'new_item_name' => __( 'New News_category Name' ),
    'menu_name' => __( 'News_category' ),
  );

// Now register the taxonomy

  register_taxonomy('News_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'News_category' ),
  ));

}
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_press_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_press_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'press_category', 'taxonomy general name' ),
    'singular_name' => _x( 'press_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search press_category' ),
    'all_items' => __( 'All press_category' ),
    'parent_item' => __( 'Parent press_category' ),
    'parent_item_colon' => __( 'Parent press_category:' ),
    'edit_item' => __( 'Edit press_category' ),
    'update_item' => __( 'Update press_category' ),
    'add_new_item' => __( 'Add New press_category' ),
    'new_item_name' => __( 'New press_category Name' ),
    'menu_name' => __( 'press_category' ),
  );

// Now register the taxonomy

  register_taxonomy('press_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'press_category' ),
  ));

}

/*Custom Post type start*/
    function cw_post_type_work_logo() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('work_logo', 'plural'),
    'singular_name' => _x('work_logo', 'singular'),
    'menu_name' => _x('work_logo', 'admin menu'),
    'name_admin_bar' => _x('work_logo', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New work_logo'),
    'new_item' => __('New work_logo'),
    'edit_item' => __('Edit work_logo'),
    'view_item' => __('View work_logo'),
    'all_items' => __('All work_logo'),
    'search_items' => __('Search work_logo'),
    'not_found' => __('No work_logo found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'work_logo'),
    'has_archive' => true,
	'taxonomies' => array('work_category'),
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-home',
    );

    register_post_type('work_logo', $args);
    }

    add_action('init', 'cw_post_type_work_logo');
    /*Custom Post type end*/


// video
/*Custom Post type start*/
    function cw_post_type_Video() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('Video', 'plural'),
    'singular_name' => _x('Video', 'singular'),
    'menu_name' => _x('Video', 'admin menu'),
    'name_admin_bar' => _x('Video', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New Video'),
    'new_item' => __('New Video'),
    'edit_item' => __('Edit Video'),
    'view_item' => __('View Video'),
    'all_items' => __('All Video'),
    'search_items' => __('Search Video'),
    'not_found' => __('No Video found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'video'),
    'has_archive' => true,
    'taxonomies' => array('video_category'),
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-home',
    );

    register_post_type('Video', $args);
    }

    add_action('init', 'cw_post_type_Video');
    /*Custom Post type end*/

/*Custom Post type start*/
    function cw_post_type_News() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('News', 'plural'),
    'singular_name' => _x('News', 'singular'),
    'menu_name' => _x('News', 'admin menu'),
    'name_admin_bar' => _x('News', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New News'),
    'new_item' => __('New News'),
    'edit_item' => __('Edit News'),
    'view_item' => __('View News'),
    'all_items' => __('All News'),
    'search_items' => __('Search News'),
    'not_found' => __('No News found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'News'),
    'has_archive' => true,
    'taxonomies' => array('News_category'),
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-home',
    );

    register_post_type('News', $args);
    }

    add_action('init', 'cw_post_type_News');
    /*Custom Post type end*/


/*Custom Post type start*/
    function cw_post_type_press_release() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('press_release', 'plural'),
    'singular_name' => _x('press_release', 'singular'),
    'menu_name' => _x('press_release', 'admin menu'),
    'name_admin_bar' => _x('press_release', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New press_release'),
    'new_item' => __('New press_release'),
    'edit_item' => __('Edit press_release'),
    'view_item' => __('View press_release'),
    'all_items' => __('All press_release'),
    'search_items' => __('Search press_release'),
    'not_found' => __('No press_release found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'press_release'),
    'has_archive' => true,
    'taxonomies' => array('press_category'),
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-home',
    );

    register_post_type('press_release', $args);
    }

    add_action('init', 'cw_post_type_press_release');
    /*Custom Post type end*/

function send_post_wp($url, $post_data) {
    set_error_handler(
        create_function(
            '$severity, $message, $file, $line',
            'throw new ErrorException($message, $severity, $severity, $file, $line);'
        )
    );
    $options = array(
        'http' => array(
          'method' => 'POST',
          'header' => 'content-type: application/json',
          'content' => $post_data,
          'timeout' => 15 * 60 // 超时时间（单位:s）
        )
    );

	$response = '';
	try{
		$response = wp_remote_request( $url,
			array(
				'method'     => 'POST',
				'httpversion' => '1.1',
				'headers' => array(
					'Content-Type' => 'application/json',
				),
				'body' => $post_data
			)
		);
    }catch(Exception $ex){
		 //Process the exception
		 $response=$ex->getMessage();
   }
	restore_error_handler();


	return $response;

  // $context = stream_context_create($options);

  //  $result = '';
  //  try{
  //      $result = file_get_contents($url, false, $context);
  //  }catch(Exception $ex){
  //      //Process the exception
  //      $result=$ex->getMessage();
  //  }
  //  restore_error_handler();
  //  return $result;
}

function request_by_curl11($remote_server, $post_string) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $remote_server);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "accept: application/json",
    "cache-control: no-cache",
    "content-type: application/json"
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "lucidum Agent");
    curl_setopt($ch, CURLOPT_TIMEOUT,60);

    $data = curl_exec($ch);
	 $err = curl_error($ch);
	print_r('err=<br/>');
	print_r(phpinfo());
	curl_close($ch);
	return $data;
}

// define the wpcf7_before_send_mail callback
function action_wpcf7_before_send_mail( $contact_form ) {
	$submission = WPCF7_Submission::get_instance();
	$posted_data = $submission->get_posted_data();
	$content = json_encode($posted_data);

	//$posted_data_str = http_build_query( $posted_data );
   //$location = "http://wp.jaidenshannon.com/lucidum/send2srv?" . $posted_data_str;
   //wp_redirect( $location );
   //die();


	//print_r('---9876543211<br/>');
	$result = send_post_wp('http://54.215.174.16:443/integration/request-demo?apiKey=1234567', $content);
	//$result = request_by_curl('http://hicheer.top:28080/integration/request-demo?apiKey=123457', $content);
	//print_r($result);
};

// add the action
add_action( 'wpcf7_before_send_mail', 'action_wpcf7_before_send_mail', 10, 1 );

function loadCustomTemplate($template) {
	global $wp_query;
	if(!file_exists($template))return;
	$wp_query->is_page = true;
	$wp_query->is_single = false;
	$wp_query->is_home = false;
	$wp_query->comments = false;
	// if we have a 404 status
	if ($wp_query->is_404) {
	// set status of 404 to false
		unset($wp_query->query["error"]);
		$wp_query->query_vars["error"]="";
		$wp_query->is_404=false;
	}
	// change the header to 200 OK
	header("HTTP/1.1 200 OK");
	//load our template
	include($template);
	exit;
}

function templateRedirect() {
	$basename = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
	loadCustomTemplate(TEMPLATEPATH.'/custom/'."/$basename.php");
}

add_action('template_redirect', 'templateRedirect');


function endWith($haystack, $needle)
{
      $length = strlen($needle);
      if($length == 0)
      {
          return true;
      }
      return (substr($haystack, -$length) === $needle);
}

/**
 * Validate field For Email
 * @param string $key
 * @param attay  $array
 * @param array  $args
 */
function um_custom_validate_custom_email( $key, $array, $args ) {
	$forbid_ext_arr = array("axonius.com");
	if ( isset( $args[$key] ) ) {
		$custom_email = strtolower(trim($args[$key]));
		if ( !preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $custom_email) ) {
			UM()->form()->add_error( $key, __( 'Please enter valid Email.', 'ultimate-member' ) );
		}else{
			// get email suffix and check forbidden suffix
			$ext = substr(strstr($custom_email, '@'),1);
			if(in_array($ext,$forbid_ext_arr)){
				UM()->form()->add_error( $key, __( 'Your email is restricted.', 'ultimate-member' ) );
			}
		}
	}
}
//add_action( 'um_custom_field_validation_custom_email', 'um_custom_validate_custom_email', 30, 3 );

add_action('um_submit_form_errors_hook_','um_custom_validate_user_email', 999, 1);
function um_custom_validate_user_email( $args ) {
	$forbid_ext_arr = array("axonius.com");
	$key = 'user_email';
	if ( isset( $args[$key] ) ) {
		$custom_email = strtolower(trim($args[$key]));
		if ( !preg_match('/([\w\-]+\@[\w\-]+\.[\w\-]+)/', $custom_email) ) {
			UM()->form()->add_error( $key, __( 'Please enter valid Email.', 'ultimate-member' ) );
		}else{
			// get email suffix and check forbidden suffix
			$ext = substr(strstr($custom_email, '@'),1);
			if(in_array($ext,$forbid_ext_arr)){
				UM()->form()->add_error( $key, __( 'Your email is restricted.', 'ultimate-member' ) );
			}
		}
	}

	//if ( isset( $args['user_login'] ) && strstr( $args['user_login'], 'admin' ) ) {
	//	UM()->form()->add_error( 'user_login', 'Your username must not contain the word admin.' );
	//}
}


//// Following By Andyzn
function cw_post_type_blog() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('blog', 'plural'),
    'singular_name' => _x('blog', 'singular'),
    'menu_name' => _x('blog', 'admin menu'),
    'name_admin_bar' => _x('blog', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New blog'),
    'new_item' => __('New blog'),
    'edit_item' => __('Edit blog'),
    'view_item' => __('View services'),
    'all_items' => __('All blog'),
    'search_items' => __('Search blog'),
    'not_found' => __('No blog found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'blog'),
    'has_archive' => true,
	  'taxonomies' => array('blog_category'),
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-multisite',
    );

    register_post_type('blog', $args);
}
add_action('init', 'cw_post_type_blog');

function cw_post_type_webinar() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('webinar', 'plural'),
    'singular_name' => _x('webinar', 'singular'),
    'menu_name' => _x('webinar', 'admin menu'),
    'name_admin_bar' => _x('webinar', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New webinar'),
    'new_item' => __('New webinar'),
    'edit_item' => __('Edit webinar'),
    'view_item' => __('View services'),
    'all_items' => __('All webinar'),
    'search_items' => __('Search webinar'),
    'not_found' => __('No webinar found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'webinar'),
    'has_archive' => true,
	'taxonomies' => array('webinar_category'),
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-multisite',
    );

    register_post_type('webinar', $args);
}
add_action('init', 'cw_post_type_webinar');
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_webinar_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts
function create_webinar_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'webinar_category', 'taxonomy general name' ),
    'singular_name' => _x( 'webinar_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search webinar_category' ),
    'all_items' => __( 'All webinar_category' ),
    'parent_item' => __( 'Parent webinar_category' ),
    'parent_item_colon' => __( 'Parent webinar_category:' ),
    'edit_item' => __( 'Edit webinar_category' ),
    'update_item' => __( 'Update webinar_category' ),
    'add_new_item' => __( 'Add New webinar_category' ),
    'new_item_name' => __( 'New webinar_category Name' ),
    'menu_name' => __( 'webinar_category' ),
  );

// Now register the taxonomy

  register_taxonomy('webinar_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'webinar_category' ),
  ));

}


function cw_post_type_testimonial() {
    $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'excerpt', // post excerpt
    'custom-fields', // custom fields
    'comments', // post comments
    'revisions', // post revisions
    'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('testimonial', 'plural'),
    'singular_name' => _x('testimonial', 'singular'),
    'menu_name' => _x('testimonial', 'admin menu'),
    'name_admin_bar' => _x('testimonial', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New testimonial'),
    'new_item' => __('New testimonial'),
    'edit_item' => __('Edit testimonial'),
    'view_item' => __('View services'),
    'all_items' => __('All testimonial'),
    'search_items' => __('Search testimonial'),
    'not_found' => __('No testimonial found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'testimonial'),
    'has_archive' => true,
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-multisite',
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'cw_post_type_testimonial');


function cw_post_type_Articles() {
    $supports = array(
        'title', // post title
        'editor', // post content
        'author', // post author
        'thumbnail', // featured images
        'excerpt', // post excerpt
        'custom-fields', // custom fields
        'comments', // post comments
        'revisions', // post revisions
        'post-formats', // post formats
    );
    $labels = array(
    'name' => _x('Articles', 'plural'),
    'singular_name' => _x('Articles', 'singular'),
    'menu_name' => _x('Articles', 'admin menu'),
    'name_admin_bar' => _x('Articles', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New Articles'),
    'new_item' => __('New Articles'),
    'edit_item' => __('Edit Articles'),
    'view_item' => __('View Articles'),
    'all_items' => __('All Articles'),
    'search_items' => __('Search Articles'),
    'not_found' => __('No Articles found.'),
    );
    $args = array(
    'supports' => $supports,
    'labels' => $labels,
    'public' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'Articles'),
    'has_archive' => true,
    'taxonomies' => array('Articles_category'),
    'hierarchical' => false,
    'menu_icon' => 'dashicons-admin-home',
    );

    register_post_type('Articles', $args);
}

add_action('init', 'cw_post_type_Articles');

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_Articles_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_Articles_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'Articles_category', 'taxonomy general name' ),
    'singular_name' => _x( 'Articles_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Articles_category' ),
    'all_items' => __( 'All Articles_category' ),
    'parent_item' => __( 'Parent Articles_category' ),
    'parent_item_colon' => __( 'Parent Articles_category:' ),
    'edit_item' => __( 'Edit Articles_category' ),
    'update_item' => __( 'Update Articles_category' ),
    'add_new_item' => __( 'Add New Articles_category' ),
    'new_item_name' => __( 'New Articles_category Name' ),
    'menu_name' => __( 'Articles_category' ),
  );

// Now register the taxonomy

  register_taxonomy('Articles_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Articles_category' ),
  ));

}

//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_blog_category_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_blog_category_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => _x( 'blog_category', 'taxonomy general name' ),
    'singular_name' => _x( 'blog_category', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search blog_category' ),
    'all_items' => __( 'All blog_category' ),
    'parent_item' => __( 'Parent blog_category' ),
    'parent_item_colon' => __( 'Parent blog_category:' ),
    'edit_item' => __( 'Edit blog_category' ),
    'update_item' => __( 'Update blog_category' ),
    'add_new_item' => __( 'Add New blog_category' ),
    'new_item_name' => __( 'New blog_category Name' ),
    'menu_name' => __( 'blog_category' ),
  );

// Now register the taxonomy

  register_taxonomy('blog_category',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'blog_category' ),
  ));

}

// acf
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

//function login_redirect( $redirect_to, $request, $user ){
//	return (is_array($user->roles) && in_array('administrator', $user->roles)) ? admin_url() : home_url('/forums');
//}
//add_filter('login_redirect', 'login_redirect', 10, 3 );
// visual editor enable
function bbp_enable_visual_editor( $args = array() ) {
$args['tinymce'] = true;
return $args;
}
add_filter( 'bbp_after_get_the_content_parse_args', 'bbp_enable_visual_editor' );


// New wp_head
function title_tags() {
   if(is_front_page()): ?>
      <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
    <meta name="description" content="<?php bloginfo('name'); ?> | <?php bloginfo('description'); ?>">
      <?php else: ?>
    <title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <meta name="description" content="<?php bloginfo('name'); ?>">
    <?php endif; ?>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri()?>/assets/images/favicon.png" />
      <!-- fancybox -->
    <script type="text/javascript" src="<?php echo get_template_directory_uri()?>/assets/js/custom.js"></script>
    <meta name="google-site-verification" content="oXXgj0CnkI_fGWPbm1-sEyjD5pBgodWfXG-1d7c1gxc" />
    <?php
}

function theme_styles() {
  wp_register_style( 'font-awesome', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
  wp_enqueue_style('font-awesome');

  wp_register_style( 'open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap' );
  wp_enqueue_style('open-sans');

  wp_register_style('timepicker', 'https://cdn.jsdelivr.net/npm/timepicker@1.11.12/jquery.timepicker.min.css');
  wp_enqueue_style('timepicker');

  wp_register_style('jquery-ui', 'https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css' );
  wp_enqueue_style('jquery-ui');

  wp_register_style('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css', ['bootstrap'] );
  wp_enqueue_style('fancybox');

  wp_register_style('carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css', ['bootstrap'] );
  wp_enqueue_style('carousel');

  wp_register_style( 'bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' );
  wp_enqueue_style('bootstrap');

  wp_register_style( 'primary-styles', get_stylesheet_directory_uri() . '/assets/css/stylecp.css', ['bootstrap'] );
  wp_enqueue_style('primary-styles');

  wp_register_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css' );
  wp_enqueue_style('aos');
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

add_action( 'wp_head', 'title_tags');
function new_head() { ?>

<?php
}

add_action( 'wp_head', 'new_head' );

function theme_scripts() {
  wp_register_script( 'timepicker', 'https://cdn.jsdelivr.net/npm/timepicker@1.11.12/jquery.timepicker.js', ['jquery'], false, true );
  wp_enqueue_script( 'timepicker' );

  wp_register_script( 'newquery-ui', 'https://code.jquery.com/ui/1.11.4/jquery-ui.js', ['newquery'], false, true );
  wp_enqueue_script( 'newquery-ui' );

  wp_register_script('newquery', get_stylesheet_directory_uri() . '/assets/js/jquery-3.1.1.js', [], false, true );
  wp_enqueue_script( 'newquery' );

  wp_register_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', [ 'newquery' ], false, true );
  wp_enqueue_script( 'bootstrap' );

  wp_register_script('carousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', ['newquery', 'bootstrap'], false, true);
  wp_enqueue_script('carousel');
  wp_add_inline_script( 'carousel', "
        $('.great-team.owl-carousel').owlCarousel({
          loop: true,
          margin: 20,
          nav: false,
          autoplay: true,
          dots: true,
          responsive: {
            0: {
              items: 1,
            },
            600: {
              items: 2,
            },
            1000: {
              items: 3,
            },
          },
        });
        $('.owl-carousel.tech-parts').owlCarousel({
          loop: true,
          margin: 20,
          nav: false,
          autoplay: true,
          dots: true,
          responsive: {
            0: {
              items: 2,
            },
            600: {
              items: 3,
            },
            1000: {
              items: 5,
            },
          },
        });
        // Testimonials
        $('.testimonials.owl-carousel').owlCarousel({
          loop: true,
          margin: 20,
          nav: false,
          autoplay: true,
          dots: true,
          responsive: {
            0: {
              items: 1,
            },
            600: {
              items: 1,
            },
            1000: {
              items: 1,
            },
          },
        });

  " );

  wp_register_script('custom-theme-scripts', get_stylesheet_directory_uri() . '/assets/js/custom.js', ['newquery'], false, true);
  wp_enqueue_script('custom-theme-scripts');

  wp_register_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', ['newquery'], false, true);
  wp_enqueue_script('fancybox');

  wp_register_script('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], false, true);
  wp_enqueue_script('aos');
  wp_add_inline_script( 'aos', "AOS.init({
		duration: 1200,
	});" );
}

add_action('wp_footer', 'theme_scripts');