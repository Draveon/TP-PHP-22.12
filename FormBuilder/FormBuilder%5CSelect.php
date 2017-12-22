<?php
namespace FormBuilder;

/**
 * This class allows you to create a select input. Select input extends Element.
 * @package FormBuilder
 */
class Select extends Element{
	/**
	 * An array of string. It represents the option's labels.
	 * @var array
	 */
	private $options;

	/**
	 * Initialisation of all the attributes
	 * @param string $label Label attribute of the select
	 * @param string $name Name attribute of the select
	 * @param array $options An array of string. It represents the option's labels.
	 */
	public function __construct($label, $name, $options){
		parent::__construct($label, $name);
		$this->options = $options;
	}

	/**
	 * This method draws (in HTML) the select input
	 * @return void
	 */
	public function draw(){
		echo "<select name=\"" .$this->getName()."\">";
		foreach ($this->options as $key => $value) {
			echo "<option value=\"$key\">$value</option>";
		}
		echo "</select>";
	}

	/**
	 * Add an option to the array of options
	 * @param string $option The added option.
	 */
	public function addOption($option){
		$this->options[] = $option;
	}

	/**
	 * Get the array of options
	 * @return array
	 */
	public function getOptions(){
		return $this->options;
	}

	/**
	 * Remove an option from the select
	 * @param  string $option The removed option
	 * @return void
	 */
	public function removeOption($option){
		$index = array_search($option, $this->options);
		array_splice($this->options, $index, 1);
	}
	
}
