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

    public function getAttributes() {
        $attributes = array(
            'type' => 'date',
            'name' => $this->getName(),
            'value' => $this->Value(),
            'class' => 'text' . ($this->extraClass() ? $this->extraClass() : ''),
            'id' => $this->ID(),
            'disabled' => $this->isDisabled(),
            'title' => $this->getDescription(),
            'maxlength' => ($this->maxLength) ? $this->maxLength : null,
            'size' => ($this->maxLength) ? min( $this->maxLength, 30 ) : null
        );
        if ($this->placeholder) $attributes['placeholder'] = $this->placeholder;
        if ($this->disabled) $attributes['disabled'] = 'disabled';
        if ($this->required) $attributes['required'] = 'required';


        return array_merge($attributes, $this->attributes);
    }
}