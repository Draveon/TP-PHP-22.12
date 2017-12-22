<?php
namespace FormBuilder;
/**
 * This class allows you to create an input. An input extends a Textarea.
 * @package FormBuilder
 */
class Input extends Textarea{
	/** @var string Type of the input */
	private $type; 

	/**
	 * Initialisation of all the attributes
	 * @param string $label Label attribute of the textarea
	 * @param string $name Name attribute of the textarea
	 * @param boolean $required True if the input is required (default = true)
	 * @param string $type Type of the input (default = text).
	 * @return void
	 */
	public function __construct($label, $name, $required = true, $type = "text"){
		parent::__construct($label, $name, $required);
		$this->setType($type);
	}

	/**
	 * This method draws (in HTML) the input
	 * @return void
	 */
	public function draw(){
		echo "<label>" . $this->getLabel() . "</label>" .
		'<input type="' . $this->getType() . '" name="' . $this->getName() . '" placeholder="'. $this->getLabel() .'" '.($this->isRequired()?"required":"").'/>';
	}

	public function setType($type){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}

}
