<?php
class Html5EmailField extends EmailField implements Html5Field {
	protected $placeholder = '';

	public function getPlaceholder() {
		return $this->placeholder;
	}
	public function setPlaceholder($string) {
		$this->placeholder = $string;
        return $this;
    }

    public function getAttributes() {
        return array_merge(parent::getAttributes(), array(
            'type' => 'email',
            'placeholder' => $this->placeholder,
            'required' => $this->Required(),
        ));
    }

}