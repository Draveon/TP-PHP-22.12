<?php
namespace FormBuilder;

/**
 * Abstract class that implements IElement interface
 * All new elements must extends Element or one of it subclasses
 * @package FormBuilder
 */
abstract class Element implements IElement{
	/** @var string The label attribute of an element */
	private $label;
	/** @var string The name attribute of an element */
	private $name;
	/** @var Form The form it belongs to */
	private $form;

	/**
	 * Initialisation of all the attributes
	 * @param string $label
	 * @param string $name
	 * @return void
	 */
	public function __construct($label, $name){
		$this->setLabel($label);
		$this->setName($name);
	}

	/**
	 * Getter for label attribute
	 * @return string The label associated to the element
	 */
	public function getLabel(){
		return $this->label;
	}

	/**
	 * Setter for the label attribute
	 * @param string $label The label associated to the element
	 * @return void
	 */
	public function setLabel($label){
		$this->label = $label;
	}

	/**
	 * Getter for the name attribute
	 * @return string The name attribute of the element
	 */
	public function getName(){
		return $this->name;
	}

	/**
	 * Setter for the name attribute
	 * @param string $name The name attribute of the element
	 * @return void
	 */
	public function setName($name){
		$this->name = $name;
	}

	/**
	 * Return the form it belongs
	 * @return Form The form it belongs
	 */
	public function getForm(){
		return $this->form;
	}

	/**
	 * Set the form the element is attached to
	 * @param Form $form
	 */
	public function setForm(Form $form){
		$this->form = $form;
	}
}
?>
