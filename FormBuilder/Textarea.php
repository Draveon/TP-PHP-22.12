<?php
namespace FormBuilder;
/**
 * This class allows you to create a textarea. A textarea extends an Element,
 * it needs to implement a draw() method.
 * @package FormBuilder
 */
class Textarea extends Element{
	/** @var Boolean True if this element is required */
	private $required;

	/**
	 * Initialisation of all the attributes
	 * @param string $label Label attribute of the textarea
	 * @param string $name Name attribute of the textarea
	 * @param Boolean $required True if the textarea is required (default = true)
	 * @return void
	 */
	public function __construct($label, $name, $required = true){
		parent::__construct($label, $name);
		$this->setRequired($required);
	}

	/**
	 * This method draws (in HTML) the textarea
	 * @return void
	 */
	public function draw(){
		echo '<label>'.$this->getLabel().'</label>';
		echo '<textarea name="' . $this->getName() . '" '.($this->required?"required":"").' placeholder="' .$this->getLabel(). '">';
		echo '</textarea>';
	}

	public function setRequired($required){
		$this->required = $required;
	}

	public function isRequired(){
		return $this->required;
	}

}
