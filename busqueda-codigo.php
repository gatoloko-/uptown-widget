<?php
/*
Plugin Name: Busqueda por código Uptown
Description: Site specific code changes for example.com
*/
/* Start Adding Functions Below this Line */

class wp_uptown_code_search extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'Busqueda por codigo uptown', 

// Widget name will appear in UI
__('Busqueda por codigo uptown', 'wp_uptown_code_search'), 

// Widget description
array( 'description' => __( 'Widget de busqueda por codigo uptown', 'Widget de busqueda por codigo uptown' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'Busqueda uptown', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];




// This is where you run the code and display the output------------START
echo "<div align='center'><h2>Buscar por código</h2></div>";
echo "<form action='".$url."'>";
echo "<table>
		<tr>
			<td width='60'><h4>Código</h4></td>
			<input type='hidden' id='s' name='s' value='search'>
			<td><input type='text' id='c' name='c' class='dropdown-style'></td>
			<td><button style='margin-bottom:10px;margin-left:10px;'>Buscar</button></td>
		</tr>	
	</table>
	</form>";

// This is where you run the code and display the output--------------END
echo $args['after_widget'];
}


	
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wp_uptown_code_search_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wp_uptown_code_search ends here

// Register and load the widget
function wpb_load_widget_code_search() {
	register_widget( 'wp_uptown_code_search' );
}
add_action( 'widgets_init', 'wpb_load_widget_code_search' );
/* Stop Adding Functions Below this Line */
?>