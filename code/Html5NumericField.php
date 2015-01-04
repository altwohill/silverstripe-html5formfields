<?php
class Html5NumericField extends NumericField implements Html5Field {
	protected $placeholder = '';
	protected $min;
    protected $max;
    protected $step;

	public function getPlaceholder() {
		return $this->placeholder;
	}
	public function setPlaceholder($string) {
		$this->placeholder = $string;
        return $this;
	}

    public function getMin() {
        return $this->min;
    }

    public function setMin($number) {
        $this->min = $number;
        return $this;
    }

    public function getMax() {
        return $this->max;
    }

    public function setMax($number) {
        $this->max = $number;
        return $this;
    }

    public function getStep() {
        return $this->step;
    }

    public function setStep($number) {
        $this->step = $number;
        return $this;
    }

    public function getAttributes() {
        return array_merge(parent::getAttributes(), array(
            'type' => 'number',
            'placeholder' => $this->placeholder,
            'required' => $this->Required(),
            'min' => $this->min,
            'max' => $this->max,
            'step' => $this->step,
        ));
    }
}