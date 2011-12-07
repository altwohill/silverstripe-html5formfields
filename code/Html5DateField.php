<?php
class Html5DateField extends DateField implements Html5Field {
	protected $required = false;
	protected $placeholder = '';
	
	public function getRequired() {
		return $this->required;
	}
	public function setRequired($bool) {
		$this->required = $bool;
	}
	public function getPlaceholder() {
		return $this->placeholder;
	}
	public function setPlaceholder($string) {
		$this->placeholder = $string;
	}
	
	function Field() {
		$attributes = array(
			'type' => 'date',
			'class' => 'text' . ($this->extraClass() ? $this->extraClass() : ''),
			'id' => $this->id(),
			'name' => $this->Name(),
			'value' => $this->Value(),
			'tabindex' => $this->getTabIndex(),
			'maxlength' => ($this->maxLength) ? $this->maxLength : null,
			'size' => ($this->maxLength) ? min( $this->maxLength, 30 ) : null 
		);
		
		if ($this->placeholder) $attributes['placeholder'] = $this->placeholder;
		if($this->disabled) $attributes['disabled'] = 'disabled';
		// @Todo: this doesn't work yet
		//if ($this->required) $attributes['required'] = 'required';
		
		return $this->createTag('input', $attributes);
	}
}