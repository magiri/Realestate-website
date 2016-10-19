<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function b_form_input($data = array('',)) {
    $datamain = array(
        'class' => 'form-control',
        'placeholder' => 'Beds',
        'name' => 'name',
        'id' => rand(8, 15),
        'setvalue' => '',
        
    );
    $c_data = array_merge($datamain, $data);
    echo '<div class="form-group">';
    echo '<label for = "' . $c_data['id'] . '">' . $c_data['placeholder'] . '</label>';
    echo form_input($c_data, set_value($c_data['name'], $c_data['setvalue']));
    echo '</div>';
}

function b_form_dropdown($data = array('')) {

    $datamain = array(
        'class' => 'form-control',
        'placeholder' => 'Beds',
        'name' => 'name',
        'id' => rand(8, 15),
        'setvalue' => '',
    );
    $c_data = array_merge($datamain, $data);
    echo'  <div class="form-group"><label>' . $c_data['placeholder'] . '</label>';
    $data['options'] = '';
    if (!isset($data['class'])) {
        $data['class'] = '';
    }
    $data['class'] = 'form-control ' . $data['class'];
    echo '<select name="' . $c_data['name'] . '" class="form-control">';
    foreach ($c_data['options'] as $key => $option) {
        if ($key == $c_data['setvalue']) {
            $select = 'selected';
        } else {
            $select = '';
        }
        echo '<option ' . $select . ' value="' . $key . '" >';
        echo $option . ' </option>';
    }
    echo'</select>';
    echo ' <span aria-hidden="true" class="dropdown-wrapper"></span></span> ';

    echo '</div>';
//      echo form_dropdown('', $c_data['options'], '', $data);
}

function c_checkbox($value, $allow) {
    if ($value == $allow) {
        return 'checked';
    } else {
        return '';
    }
}
