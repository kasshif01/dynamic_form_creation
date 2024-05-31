<?php

use Src\InternalApi;


$form_data = array(
    "form_name" => "Contact Form 4",
    "fields" => array(
        array(
            "type" => "input",
            "name" => "first_name",
            "isEmailField" => true
        ),
        array(
            "type" => "input",
            "name" => "email",
            "isEmailField" => true
        ),
        array(
            "type" => "textarea",
            "name" => "message",
            "isEmailField" => true
        ),
        array(
            "type" => "select",
            "name" => "country",
            "options" => array("USA", "Canada"),
            "isEmailField" => true
        ),
        array(
            "type" => "radio",
            "name" => "gender",
            "options" => array("Male", "Female"),
            "isEmailField" => false
        ),
        array(
            "type" => "checkbox",
            "name" => "interest",
            "options" => array("Reading", "Traveling", "Cooking", "Sports"),
            "isEmailField" => false
        )
    ),
    "validation_rules" => array(
        "first_name" => array(
            "required" => true
        ),
        "email" => array(
            "required" => true,
            "email" => true
        ),
        "country" => array(
            "required" => true
        ),
        "gender" => array(
            "required" => true
        ),
        "interest" => array(
            "required" => true
        )
    )
);


InternalApi::send('/api/create-form', 'POST', $form_data);