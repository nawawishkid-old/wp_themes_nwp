<?php
namespace WPComponent;

abstract class Component {
	abstract public function markup();
	abstract public function customizer( $c, $panel );

	public function __construct( $id ) {
		$this->id = $id;
		$this->settingPrefix = 'setting_' . $this->name . '_' . $id;
		$this->sectionName = 'section_' . $this->name . '_' . $id;
		$this->controlPrefix = 'control_' . $this->name . '_' . $id;
	}
}