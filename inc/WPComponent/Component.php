<?php
namespace WPComponent;

abstract class Component {
	/* string */
	public $id;
	/* string */
	public $settingPrefix;
	/* string */
	public $sectionName;
	/* string */
	public $controlPrefix;
	/* array */
	private $modifications = [];
	/* array */
	public $settings = [];
	/* int */
	protected $counter = 0;

	abstract public function markup( $param = null );
	abstract public function customizer( $c, $panel );

	public function __construct( $id ) {
		$this->id = $id;
		$this->settingPrefix = 'setting_' . $this->name . '_' . $id . '_';
		$this->sectionName = 'section_' . $this->name . '_' . $id;
		$this->controlPrefix = 'control_' . $this->name . '_' . $id . '_';

		if ( ! empty( $this->settings ) )
			$this->remapSettingName();
	}

	/**
	 * Assign component theme modifications to the component
	 */
	public function setMod( $modName, $modValue ) {
		$this->modifications[$modName] = $modValue;
	}

	public function getMod( $modName, $default = null ) {
		$val = $this->modifications[$modName];
		return is_null( $val ) ? $default : $val;
	}

	protected function getItemKey() {
		$this->counter++;
		return $this->id . '-' . $this->counter;
	}

	protected function remapSettingName() {
		foreach ( $this->settings as $index => $name ) {
			unset( $this->settings[$index] );
			$this->settings[$name] = $this->settingPrefix . $name;
		}
	}
}