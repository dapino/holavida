<?php

function optionsframework_options() {

    $options = array();

//header
    $options[] = array(
    'name' => __('Home', 'options_check'),
    'type' => 'heading');

    $options[] = array(
    'name' => __('titulo categorías', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-categorias',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Texto Call to action', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'texto-cta',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('link Call to action', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'link-cta',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('texto boton Call to action', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'texto-btn-cta',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('título experiencias', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-experiencias',
    'std' => '',
    'type' => 'text');
    $options[] = array(
    'name' => __('texto boton de ver todas las experiencias', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'texto-boton-experiencias',
    'std' => '',
    'type' => 'text');
    $options[] = array(
    'name' => __('texto boton de ir al blog', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'ir-blog',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('enlace facebook', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'link-fbook',
    'std' => '',
    'type' => 'text');
    $options[] = array(
    'name' => __('enlace instagram', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'link-inst',
    'std' => '',
    'type' => 'text');
    $options[] = array(
    'name' => __('email', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'mail',
    'std' => '',
    'type' => 'text');
    $options[] = array(
    'name' => __('Teléfono', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'telefono',
    'std' => '',
    'type' => 'text');
    $options[] = array(
    'name' => __('Texto de copyright', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'copyright',
    'std' => '',
    'type' => 'text');




    return $options;
}


