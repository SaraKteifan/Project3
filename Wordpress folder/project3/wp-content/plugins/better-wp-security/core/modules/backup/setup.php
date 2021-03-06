<?php

class ITSEC_Backup_Setup {

	public function __construct() {
		add_action( 'itsec_modules_do_plugin_uninstall', array( $this, 'execute_uninstall' ) );
		add_action( 'itsec_modules_do_plugin_upgrade', array( $this, 'execute_upgrade' ) );
	}

	/**
	 * Execute module uninstall
	 *
	 * @return void
	 */
	public function execute_uninstall() {
		delete_site_option( 'itsec_backup' );
	}

	/**
	 * Execute module upgrade
	 *
	 * @return void
	 */
	public function execute_upgrade( $build ) {

		if ( $build < 4000 ) {

			global $itsec_bwps_options;

			$current_options = get_site_option( 'itsec_backup' );


			// Don't do anything if settings haven't already been set, defaults exist in the module system and we prefer to use those
			if ( false !== $current_options ) {

				$current_options['enabled']  = isset( $itsec_bwps_options['backup_enabled'] ) && $itsec_bwps_options['backup_enabled'] == 1 ? true : false;
				$current_options['interval'] = isset( $itsec_bwps_options['backup_interval'] ) ? intval( $itsec_bwps_options['backup_interval'] ) : 1;

				update_site_option( 'itsec_backup', $current_options );

			}

		}

		if ( $build < 4040 ) {
			$backup_options = get_site_option( 'itsec_backup' );
			// Make sure we have an index files to block directory listing in backups directory
			if ( is_dir( $backup_options['location'] ) && ! file_exists( path_join( $backup_options['location'], 'index.php' ) ) ) {
				file_put_contents( path_join( $backup_options['location'], 'index.php' ), "<?php\n// Silence is golden." );
			}
		}

		if ( $build < 4041 ) {
			$current_options = get_site_option( 'itsec_backup' );

			// If there are no current options, go with the new defaults by not saving anything
			if ( is_array( $current_options ) ) {
				// Make sure the new module is properly activated or deactivated
				if ( $current_options['enabled'] ) {
					ITSEC_Modules::activate( 'backup' );
				} else {
					ITSEC_Modules::deactivate( 'backup' );
				}

				if ( isset( $current_options['location'] ) && ! is_dir( $current_options['location'] ) ) {
					unset( $current_options['location'] );
				}

				$options = ITSEC_Modules::get_defaults( 'backup' );

				foreach ( $options as $name => $value ) {
					if ( isset( $current_options[ $name ] ) ) {
						$options[ $name ] = $current_options[ $name ];
					}
				}

				ITSEC_Modules::set_settings( 'backup', $options );
			}
		}

		if ( $build < 4069 ) {
			delete_site_option( 'itsec_backup' );
		}

		if ( $build < 4079 ) {
			wp_clear_scheduled_hook( 'itsec_execute_backup_cron' );
		}

		if ( $build < 4123 ) {
			$update = [
				'both',
				'email',
				'local',
			];

			$legacy = ITSEC_Modules::get_setting( 'backup', 'method' );
			$new    = $update[ $legacy ] ?? ITSEC_Modules::get_default( 'backup', 'method' );
			ITSEC_Modules::set_setting( 'backup', 'method', $new );
		}
	}
}

new ITSEC_Backup_Setup();
