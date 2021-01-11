<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Wps_Lazy_Load
 * @subpackage Wps_Lazy_Load/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wps_Lazy_Load
 * @subpackage Wps_Lazy_Load/public
 * @author     Your Name <email@example.com>
 */
class Wps_Lazy_Load_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $wps_lazy_load The ID of this plugin.
     */
    private $wps_lazy_load;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string $version The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $wps_lazy_load The name of the plugin.
     * @param string $version The version of this plugin.
     * @since    1.0.0
     */
    public function __construct($wps_lazy_load, $version)
    {

        $this->wps_lazy_load = $wps_lazy_load;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_style($this->wps_lazy_load, plugin_dir_url(__FILE__) . 'css/wps-lazy-load-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Plugin_Name_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Plugin_Name_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */

        wp_enqueue_script($this->wps_lazy_load, plugin_dir_url(__FILE__) . 'js/lozad.min.js', array('jquery'), $this->version, false);
        wp_enqueue_script($this->wps_lazy_load.'-1', plugin_dir_url(__FILE__) . 'js/wps-lazy-load-public.js', array('jquery'), $this->version, false);

    }

    /**
     * Add several attributes to the picture, such as decoding,loading
     *
     * @param $content
     * @return string|string[]
     * @since    1.0.0
     */
    public function lazyIMGs($content) {
        $doc = new DOMDocument();
        @$doc->loadHTML($content);
        $tags = $doc->getElementsByTagName('img');

        foreach ($tags as $tag) {
            $content = str_replace('src="'.$tag->getAttribute('src').'"','decoding="async" src="'.$tag->getAttribute('src').'" data-srcset="'.$tag->getAttribute('src').'" srcset="'.plugin_dir_url( __FILE__ ) .'img/preloader.gif"', $content);
        }

        return $content;
    }

}
