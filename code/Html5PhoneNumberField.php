<?php
class Html5PhoneNumberField extends Html5TextField {

    public function getAttributes() {
        return array_merge(parent::getAttributes(), array(
            'type' => 'phone',
        ));
    }
}