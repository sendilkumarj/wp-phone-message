<?php

if ( !class_exists( 'WpWhatsappMeWidget' ) ) {

    class WpWhatsappMeWidget extends WP_Widget {
    
        function __construct() {
            parent::__construct(
            
            // Base ID of your widget
            'WpWhatsappMeWidget', 
            
            // Widget name will appear in UI
            __('WP WhatsApp Me Widget', 'wp_whatsapp_me_domain'), 
            
            // Widget description
            array( 'description' => __( 'Display Whatsapp message form on widget', 'wp_whatsapp_me_domain' ), ) 
            );
        }
        
        // Creating widget front-end
        
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );
            $text = $instance['text'] ;

            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if ( ! empty( $title ) ){
                echo $args['before_title'] . $title . $args['after_title'];
            }

            include_once( PLUGINWMEPATH . 'views/widget-form.php' );

            echo $args['after_widget'];
        }
                
        // Widget Backend 
        public function form( $instance ) {
            if ( isset( $instance[ 'title' ] ) ) {
                $title = $instance[ 'title' ];
            }
            else {
                $title = __( 'New title', 'wp_whatsapp_me_domain' );
            }
            if ( isset( $instance[ 'text' ] ) ) {
                $text = $instance[ 'text' ];
            }
            else{
                $text = '';
            }

            // Widget admin form
            include( PLUGINWMEPATH . 'views/widget-admin-form.php' );
        }
            
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
            return $instance;
        }
    }
}