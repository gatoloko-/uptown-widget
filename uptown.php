<?php
/*
Plugin Name: Uptown
Description: Site specific code changes for example.com
*/
/* Start Adding Functions Below this Line */

class wp_uptown_search extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'Busqueda uptown', 

// Widget name will appear in UI
__('Busqueda personalizada uptown', 'wp_uptown_search'), 

// Widget description
array( 'description' => __( 'Widget de busqueda personalizada uptown', 'Widget de busqueda uptown' ), ) 
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


$url = site_url();

// This is where you run the code and display the output
echo "<div align='center'><h2>Busca tu propiedad</h2></div>";
echo "<form action='".$url."'>";

//operacion
$argsCatOperacion = array( 'child_of' => 4 ); 

$categories = get_categories( $argsCatOperacion );
echo "<table><tr class='fake'><td width='100'><h4>Operacion</h4></td><td>";
echo "<select id='op' name='op' class='dropdown-style'>
	<option value='4'>Todas</option>";
foreach ($categories as $valor) {
		echo "<option value='".$valor->term_id."'>".$valor->name."	</option>";
}
echo "</select></td></tr>";

//tipo
$argsCatTipo = array( 'child_of' => 7 ); 

$categories = get_categories( $argsCatTipo );

echo "<tr class='fake'><td class='fake'><h4>Tipo</h4></td><td class='fake'>";

echo "<select id='tp' name='tp' class='dropdown-style'>
	<option value='7'>Todas</option>";
foreach ($categories as $valor) {
		echo "<option value='".$valor->term_id."'>".$valor->name."	</option>";
}
echo "</select></td></tr>";

//region
$argsCatRegion = array( 'child_of' => 11 ); 

$categories = get_categories( $argsCatRegion );

echo "<tr><td><h4>Región</h4></td>";

echo "<td><select id='rg' name='rg' class='dropdown-style'>
	<option value='11'>Todas</option>";
foreach ($categories as $valor) {
		echo "<option value='".$valor->term_id."'>".$valor->name."	</option>";
}
echo "</select></td></tr>";


//comuna
$argsCatComuna = array( 'child_of' => 2 ); 

$categories = get_categories( $argsCatComuna );

echo "<tr><td class='fake'><h4>Comuna</h4></td><td class='fake'>";

echo "<select id='cm' name='cm' class='dropdown-style'>
	<option value='2'>Todas</option>";
foreach ($categories as $valor) {
		echo "<option value='".$valor->term_id."'>".$valor->name."	</option>";
}
echo "</select></td></tr>";

//form


echo		"<input type='hidden' id='s' name='s' value='search'>
			<tr><td colspan='2' class='fake'><div align='center'><button>BUSCAR</button></div></td></tr>
			</table>
		</form>";
	

//js


//js



//end
echo $args['after_widget'];
}


	
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wp_uptown_search' );
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
} // Class wp_uptown_search ends here

// Register and load the widget
function wpb_load_widget_uptown_search() {
	register_widget( 'wp_uptown_search' );
}
add_action( 'widgets_init', 'wpb_load_widget_uptown_search' );
/* Stop Adding Functions Below this Line */
?>