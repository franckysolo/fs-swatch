<?php
/**
 * 
 * @author franckysolo - <franckysolo@gmail.com>
 * @category Wordpress Plugin
 * @package Swatch
 * @version 1.0
 */
class Fs_Swatch_Generator {

    /**
     * Instance of Fs_Swatch_Generator
     * 
     * @var Fs_Swatch_Generator
     */
    protected static $instance = null;

    /**
     * 
     * @var plugin slug
     */
    protected $pluginSlug = 'fs-swatch';
    
    /**
     * Singleton
     * 
     * @return Fs_Swatch_Generator
     */
    public static function getInstance() {
        
        if (null === self::$instance) {
            self::$instance = new self;
        }
        
        return self::$instance;
    }
    
    /**
     * Initialize the plugin, setting localization
     */
    private function __construct() {
        add_action('init', array($this, 'fs_swatch_load_plugin_textdomain'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_styles'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_bar_menu', array($this, 'display_fs_swatch'));
    }
    
    /**
     * Load translation file
     * 
     * @return void
     */
    public function fs_swatch_load_plugin_textdomain() {
		$domain = $this->pluginSlug;
		$locale = apply_filters('plugin_locale', get_locale(), $domain);
		$url = sprintf('%s/languages/%s-%s.mo', $domain, $domain, $locale);
		load_plugin_textdomain($domain, false, basename(dirname( __DIR__ )) . '/languages/');
	}
	
	/**
	 * Enqueue css
	 * 
	 * @return void
	 */
    public function enqueue_styles() {
        wp_enqueue_style (
            $this->pluginSlug . '-plugin-style',
            plugins_url('css/fs-swatch.css', __FILE__)
        );
    }

    /**
     * Enqueue js
     * 
     * @return void
     */
	public function enqueue_scripts() {
		wp_enqueue_script (
		    $this->pluginSlug . '-plugin-script', 
		    plugins_url('js/fs-swatch.js', __FILE__), 
		    array('jquery')
		);
	}
		
	/**
	 * Returns string locale current date
	 * 
	 * @return string
	 */
	public function fs_swatch_locale_date() {
	    $locale = get_locale();
	    $args = __('%A, %B %d, %Y', 'fs-swatch');
	    setlocale(LC_TIME, $locale . '.utf-8');
	    return  ucfirst(strftime($args));
	}
	
	/**
	 * Only display the div swatch, let's Js & Css do the job
	 * 
	 * @return void
	 */
	public function display_fs_swatch() {	      
	    $localString  = $this->fs_swatch_locale_date();
	    echo <<<HTML
<div class="fs-swatch-container">
    <div class="fs-swatch-box">
        <span class="dashicons dashicons-calendar"></span>
	   <span class="fs-date-locale">$localString</span> 
	</div>
	<div class="fs-swatch-box fs-swatch-right">
	   <span class="dashicons dashicons-clock"></span>
	   <span id="fs-swatch" class="fs-swatch"></span>
	</div> 
</div>	    
HTML;
	}
}