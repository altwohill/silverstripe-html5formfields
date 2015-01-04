<?php
class Html5UrlField extends Html5TextField {

    public function getAttributes() {
        $attributes = array(
            'type' => 'url',
        );
        return array_merge($attributes, parent::getAttributes());
    }
}