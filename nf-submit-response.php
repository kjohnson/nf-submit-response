<?php

/*
 * Plugin Name: Ninja Forms - Submit Response (Example)
 */

final class NF_KBJ_SubmitResponse
{
    private static $instance;

    private static $dir;

    private static $url;

    public static function instance()
    {
        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof NF_KBJ_SubmitResponse ) ) {
            self::$instance = new NF_KBJ_SubmitResponse;
            self::$dir = plugin_dir_path( __FILE__ );
            self::$url = plugin_dir_url( __FILE__ );
        }
        return self::$instance;
    }

    private function __construct()
    {
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script( 'nf-submit-response', self::url( 'assets/js/submit-response.js' ), array( 'nf-front-end' ) );
    }


    /*
     * UTILITY METHODS
     */

    public static function url( $path = '' )
    {
        $plugin = NF_KBJ_SubmitResponse::instance();
        return trailingslashit( $plugin::$url ) . $path;
    }

    public static function dir( $path = '' )
    {
        $plugin = NF_KBJ_SubmitResponse::instance();
        return trailingslashit( $plugin::$dir ) . $path;
    }
}

NF_KBJ_SubmitResponse::instance();
