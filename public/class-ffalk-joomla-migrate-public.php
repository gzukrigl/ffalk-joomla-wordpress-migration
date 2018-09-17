<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       none
 * @since      1.0.0
 *
 * @package    Ffalk_Joomla_Migrate
 * @subpackage Ffalk_Joomla_Migrate/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ffalk_Joomla_Migrate
 * @subpackage Ffalk_Joomla_Migrate/public
 * @author     ENFORMIO <gerald@zukrigl.at>
 */
class Ffalk_Joomla_Migrate_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ffalk_Joomla_Migrate_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ffalk_Joomla_Migrate_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ffalk-joomla-migrate-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ffalk_Joomla_Migrate_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ffalk_Joomla_Migrate_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ffalk-joomla-migrate-public.js', array( 'jquery' ), $this->version, false );

	}

		public function replace_joomla_placeholders($text) {

			$text = $this->replace_joomla_youtube_placeholdder($text);
			return $text;
		}

		public function replace_joomla_youtube_placeholdder($text) {
			$result = '';
			$latestEnd = 0;
			$start = strpos($text, '{youtube}', 0);

			while ($start !== false) {
				$result .= substr($text, $latestEnd, $start - $latestEnd);
				$latestEnd = strpos($text, '{/youtube}', $start + strlen('{/youtube}'));
				$youtube_spec = substr($text, $start, $latestEnd - $start);
				$result .= $this->getYoutubeHtml($youtube_spec);

				$latestEnd += strlen('{/youtube}');
				$start = strpos($text, '{youtube}', $latestEnd);
			}
			$result .= substr($text, $latestEnd, strlen($text) - $latestEnd);
			return $result;
		}

		private function getYoutubeHtml($youtube_spec) {

			$youtube_spec = substr($youtube_spec, strlen('{youtube}'), strlen($youtube_spec) ); // - strlen('{youtube}')
			$parts = explode('|', $youtube_spec);
			$youtubeid = $parts[0];
			$width = $parts[1];
			$height = $parts[2];
			$html = '<iframe width="'.$width.'" height="'.$height.'"
							src="https://www.youtube.com/embed/'.$youtubeid.'?playlist='.$youtubeid.'Y&loop=1"></iframe>';

			return $html;
		}

}
