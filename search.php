<?php get_header(); ?>

        <section id="subheader">
            <div class="container">
                <div class="row">
                    <div class="span12">
        
                        <h1><?php _e( '<span>Resultados </span>', 'wip' ) ?></h1>
                    
                    </div>
                </div>
            </div>
        </section>

        <div class="container content ">
            
            <div class="row" >

			<?php if ( ( novalite_template('sidebar') == "left-sidebar" ) || ( novalite_template('sidebar') == "right-sidebar" ) ) : ?>
                
                <div class="<?php echo novalite_template('span') .' '. novalite_template('sidebar'); ?>"> 
                <div class="row"> 
                
            <?php endif; ?>

				<?php 
				$operacion = $_GET['op'];
				$tipo = $_GET['tp'];
				$comunaQ = $_GET['cm'];
				$region = $_GET['rg'];
				$the_query = new WP_Query( array( 'category__and' => array( $operacion, $tipo, $comunaQ, $region) ) );
				
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        				
        
                        <div class="pin-article <?php echo novalite_template('span'); ?>">
                
                            <div class="result-item">
                            	<div class="result-item-thumb">
                            		<?php echo get_the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
                            	</div>
                            	<div class="result-item-data">
                            		<?php $custom_fields = get_post_custom(get_the_ID());
									$precio = get_post_custom_values('precio');
									$area = get_post_custom_values('area');
									$argsCatComuna = array( 'child_of' => 2 );
									$rooms =  get_post_custom_values('dormitorios');
									$categories = get_categories( $argsCatComuna );
									$comuna = "";
									
									foreach ($categories as $value) {
										
										if( in_category( $value->term_id, get_the_ID() ) ){
											$comuna = $value->name;
										}
										
									}
									
									echo "<h2>".get_the_title(get_the_ID())."</h2>";
									echo "<h3>".$comuna."</h3>	";
									
                            		
                            		?>
                            		
                            	</div>
                            	<div class="result-item-data">
                            		<?php
                            		echo "<strong>Precio: </strong>\t".$precio[0]."<br/>";
									echo "<strong>Área: </strong>\t".$area[0]."<br/>";
                            		echo "<strong>Dormitorios: </strong>".$rooms[0]."<br/>";
									?>
                            	</div>
                            	<div class="result-item-data">
                            		<h3>Ver propiedad
                            		</h3>
                            	</div>
                            </div>
                    
                            <div style="clear:both"></div>

                        </div>
                        
                <?php endwhile; else:  ?>
        
                        <div class="pin-article <?php echo novalite_template('span'); ?>">
                            <article class="article">
        
                            <h1 class="title"><?php _e( 'Not Found',"wip" ) ?></h1>
                                
                            <p> <?php _e( 'You can repeat your search with the following form.',"wip" ) ?> </p>
                        
                            <section class="contact-form searchform">
                                <form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                                     <div>
                                     <input type="text" placeholder="<?php _e( 'Search here', 'wip' ) ?>"  name="s" id="s" class="input-search"/>
                                     <input type="submit" id="searchsubmit" class="button-search" value="<?php _e( 'Search', 'wip' ) ?>" />
                                     </div>
                                </form>
                            <div class="clear"></div>  
                            </section>
                        
                            </article>
                            
                            <div style="clear:both"></div>
							
                        </div>
                        
                <?php endif; ?>

		<?php if ( ( novalite_template('sidebar') == "left-sidebar" ) || ( novalite_template('sidebar') == "right-sidebar" ) ) : ?>
            
            </div>
            </div>
            
        <?php endif; ?>
    
        <?php if ( novalite_template('span') == "span8" ) : ?>
            
            <section id="sidebar" class="span4">
                <div class="row">
					<?php if ( is_active_sidebar('side_sidebar_area')) { 
                        
                    	dynamic_sidebar('side_sidebar_area');
                        
                    } else { 
                            
                   		the_widget( 'WP_Widget_Calendar',
                    	array("title"=> __('Calendar','wip')),
                        	array('before_widget' => '<div class="pin-article span4"><div class="article">',
								  'after_widget'  => '</div></div>',
								  'before_title'  => '<h3 class="title">',
							      'after_title'   => '</h3>'
                            )
                        );
            
                        the_widget( 'WP_Widget_Archives','',
                    	array("title"=> __('Archives','wip')),
                        	array('before_widget' => '<div class="pin-article span4"><div class="article">',
								  'after_widget'  => '</div></div>',
								  'before_title'  => '<h3 class="title">',
							      'after_title'   => '</h3>'
                            )
                        );
            
                        the_widget( 'WP_Widget_Categories','',
                    	array("title"=> __('Categories','wip')),
                        	array('before_widget' => '<div class="pin-article span4"><div class="article">',
								  'after_widget'  => '</div></div>',
								  'before_title'  => '<h3 class="title">',
							      'after_title'   => '</h3>'
                            )
                        );
            
                        
                	} ?>
                </div>
            </section>
        
        <?php endif; ?>

    </div>
    							<?php get_template_part('pagination'); ?>
                        

</div>

<?php get_footer(); ?>