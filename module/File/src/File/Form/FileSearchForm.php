<?php
namespace File\Form;

class FileSearchForm extends FileForm
{
    protected $mergeElements = array(
        'status' => array (
            'options' => array (
                'value_options' => array(
                    array (
                        'label' => 'Select Status',
                        'value' => '',
                    ),
                )
            ),
            'attributes' => array (
                'value' => '',
            ),
        ),
        'keyword' =>     array(
            'name' => 'keyword',
            'type' => 'text',
            'options' => array (
                'label' => 'Keyword',
            ),
            'attributes' => array(
            ),
        ),
        'fileSizeFrom' => array (
            'name' => 'fileSizeFrom',
            'type' => 'range',
            'options' => array (
                'label' => 'From',
            ),
            'attributes' => array (
            ),
        ),
        'fileSizeTo' => array (
            'name' => 'fileSizeTo',
            'type' => 'range',
            'options' => array (
                'label' => 'To',
            ),
            'attributes' => array (
            ),
        ),
        'imageWidthFrom' => array (
            'name' => 'imageWidthFrom',
            'type' => 'number',
            'options' => array (
                'label' => 'From',
            ),
        ),
        'imageWidthTo' => array (
            'name' => 'imageWidthTo',
            'type' => 'number',
            'options' => array (
                'label' => 'To',
            ),
        ),
        'imageHeightFrom' => array (
            'name' => 'imageHeightFrom',

            'type' => 'number',
            'options' => array (
                'label' => 'From',
            ),
        ),
        'imageHeightTo' => array (
            'name' => 'imageHeightTo',
            'type' => 'number',
            'options' => array (
                'label' => 'To',
            ),
        ),
        'isImage' => array (
            'name' => 'isImage',
            'type' => 'checkbox',
            'options' => array(
                'label' => 'Is Image',
                'use_hidden_element' => false,
                'checked_value' => false,
            ),
            'attributes' => array (
                'value' => '1',
            ),
        ),
    );

    protected $mergeFilters = array(
        'fileSizeFrom' => array (
            'name' => 'fileSizeFrom',
            'required' => false,
        ),
        'fileSizeTo' => array (
            'name' => 'fileSizeTo',
            'required' => false,
        ),
        'imageWidthFrom' => array (
            'name' => 'imageWidthFrom',
            'required' => false,
        ),
        'imageWidthTo' => array (
            'name' => 'imageWidthTo',
            'required' => false,
        ),
        'imageHeightFrom' => array (
            'name' => 'imageHeightFrom',
            'required' => false,
        ),
        'imageHeightTo' => array (
            'name' => 'imageHeightTo',
            'required' => false,
        ),
        'isImage' => array (
            'name' => 'isImage',
            'required' => false,
        ),
    
    );
}
