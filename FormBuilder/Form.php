<?php
namespace FormBuilder;

/**
 * This class allows you to create a form, add some inputs, select, textarea, ...
 * When your form is ready, just call the draw method
 * @package FormBuilder
 */
class Form{
	/** @var IElement[] List of elements of the form */
	private $elements;
	/** @var string Method attribute of the form */
	private $method;
	/** @var string Action attribute of the form */
	private $action;
	/** @var string Label of the submit button */
	private $submit;

	/**
	 * Initialisation of all the attributes
	 * @param string $action Action attribute of the form
	 * @param string $method Method attribut of the form
	 * @return void
	 */
	public function __construct($action, $method = "POST"){
		$this->setAction($action);
		$this->setMethod($method);
		$this->setSubmit("Go");
		$this->elements = [];
	}

	/**
	 * Instanciate an input and add it to the form
	 * @param string $label Label of the input
	 * @param string $name Name attribute
	 * @param boolean $required Required input (default = true)
	 * @param string $type Type of the input (default = text)
	 * @return Form Return the form for chaining purpose
	 */
	public function addInput($label, $name, $required = true, $type = "text"){
		$input = new Input($label, $name, $required, $type);
		$this->addElement($input);
		return $this;
	}

	/**
	 * Instanciate a textarea and add it to the form
	 * @param string $label Label of the textarea
	 * @param string $name Name attribute
	 * @param string $required Required textarea (default = true)
	 * @return Form Return the form for chaining purpose
	 */
	public function addTextarea($label, $name, $required = true){
		$textarea = new Textarea($label, $name, $required);
		$this->addElement($textarea);
		return $this;
	}

	/**
	 * Instanciate a select input and add it to the form
	 * @param string $label The label of the select input
	 * @param string $name The name of the select input
	 * @param array $options The option's labels in an array of String
	 */
	public function addSelect($label, $name, $options){
		$select = new Select($label, $name, $options);
		$this->addElement($select);
		return $this;
	}

	/**
	 * This method draws (in HTML) the full form. It calls all the draw
	 * methods of its elements
	 * @return void
	 */
	public function draw(){
		echo "<form class=\"fb-form\" method=\"$this->method\" action=\"$this->action\">";
		echo "<div>";
		foreach($this->getElements() as $element){
			echo "<div>";
			$element->draw();
			echo "</div>";
		}
		echo "<button type=\"submit\">$this->submit</button>";
		echo "</div>";
		echo "</form>";
	}

	/**
	 * Setter for the submit button value
	 * @param string $name Value of the submit button
	 * @return Form Return the form for chaining purpose
	 */
	public function setSubmit($name){
		$this->submit = $name;
		return $this;
	}

	/**
	 * Setter for the action attribute
	 * @param string $action Action called when the form is submited
	 * @return Form Return the form for chaining purpose
	 */
	public function setAction($action){
		$this->action = $action;
		return $this;
	}

	/**
	 * Setter for the method attribute
	 * @param string $method Method used when the form is submited
	 * @return Form Return the form for chaining purpose
	 */
	public function setMethod($method){
		$this->method = $method;
		return $this;
	}

	/**
	 * Add an element to the form; the form attribute of the element is set to this form
	 * @param Element $element The added element
	 */
	public function addElement(IElement $element){
		$this->elements[] = $element;
		$element->setForm($this);
	}

	/**
	 * Return the elements of the form
	 * @return array
	 */
	public function getElements(){
		return $this->elements;
	}

	/**
	 * Get an element of the form base on its name
	 * @param  string $name The name of the element
	 * @return Element       Return the element or null
	 */
	public function getElement($name){
		foreach($this->elements as $element){
			if($element->getName() === $name){
				return $element;
			}
		}
		return null;
	}

	/**
	 * Remove an element from the form
	 * @param  Element $element The removed element
	 * @return void
	 */
	public function removeElement(IElement $element){
		$index = array_search($element, $this->elements);
		$ok = array_splice($this->elements, $index, 1);
		if(!is_null($ok)){
			$element->setForm(null);
		}
	}

}
