<?php
namespace FormBuilder;

use FormBuilder\Form;

/**
 * This class allows you to generate some forms.
 * @package FormBuilder
 */
class FormBuilder{

	/**
	 * Create a new Form and retur it
	 * @return Form The form object
	 */
	public function buildContactForm(){
		$form = new Form("traitement.php", "GET");
		$form->addInput("Motif", "motif")
			->addInput("Mail", "mail", true, "mail")
			->addTextarea("Message", "message", true)
			->addSelect("Destinataire", "destinataire", ["Administration", "Formateurs", "Réseau"])
			->setSubmit("Valider");

		return $form;
	}

}
?>
