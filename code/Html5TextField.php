<?php
class Html5TextField extends TextField implements Html5Field {

	protected $placeholder = '';
	

	public function getPlaceholder() {
		return $this->placeholder;
	}
	public function setPlaceholder($string) {
		$this->placeholder = $string;
        return $this;
	}

    public function Type() {
        return 'text';
    }

    public function getAttributes() {
        return array_merge(parent::getAttributes(), array(
            'placeholder' => $this->placeholder,
            'required' => $this->Required(),
        ));
    }
}