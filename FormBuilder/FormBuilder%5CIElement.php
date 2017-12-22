<?php
namespace FormBuilder;
/**
 * All Elements needs to implement this interface 
 */
interface IElement{

	/**
	 * This method draw (in HTML5) the element
	 * @return void
	 */
	public function draw();

}
