<?php
class Html5FormValidator extends RequiredFields {
	public function php($data) {
		//don't validate if they click cancel
		if (!$this->isCancelled()) {
			return parent::php($data);
		} else {
			return true;
		}
	}

	public function includeJavascriptValidation() {
		$fields = $this->form->Fields();
		if($this->required) {
			foreach($this->required as $fieldName) {
				$field = $fields->dataFieldByName($fieldName);
				if($field instanceof Html5Field) {
					$field->setRequired(true);
				}
			}
		}
		
		Requirements::javascript('html5formfields/thirdparty/validator.js');
		Requirements::javascript('html5formfields/thirdparty/dateinput.js');
		Requirements::themedCSS('date');
		Requirements::javascript('html5formfields/js/forms.js');
		// HACK Notify the form that the validators client-side validation code has already been included
		if($this->form) $this->form->jsValidationIncluded = true;
	}
	
	/**
	 * Check for an action called cancel - if it exists,
	 * we know the form is being cancelled
	 */
	public function isCancelled() {
		foreach ($_POST as $key => $value) {
			if (strpos($key, 'cancel') !== false) {
				return true;
			}
		}
		return false;
	}
}