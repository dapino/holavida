<?php

function optionsframework_options() {

    $options = array();

//header
    $options[] = array(
    'name' => __('Header', 'options_check'),
    'type' => 'heading');

    $options[] = array(
    'name' => __('Teléfono', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'telefono',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Email', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'email',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Link Plan Eco', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'link-plan-eco',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Link Estado de Cuenta', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'link-estado-cuenta',
    'std' => '',
    'type' => 'text');

//home
    $options[] = array(
    'name' => __('Home', 'options_check'),
    'type' => 'heading');

    $options[] = array(
    'name' => __('Título Tabs', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-tabs-home',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Subítulo Tabs', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'subtitulo-tabs-home',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Título Carrusel de Servicios', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-carusel-servicios',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Subtítulo Carrusel de Servicios', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'subtitulo-carusel-servicios',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Call to Action', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'call-to-action',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Título Carrusel Blog', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-carusel-blog',
    'std' => '',
    'type' => 'text');

     $options[] = array(
    'name' => __('Subtítulo Carrusel Blog', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'subtitulo-carusel-blog',
    'std' => '',
    'type' => 'text');

//Servicios
     $options[] = array(
    'name' => __('Servicios', 'options_check'),
    'type' => 'heading');

    $options[] = array(
    'name' => __('Texto tarjeta de contacto', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'text-contact-card',
    'std' => '',
    'type' => 'text');


    $options[] = array(
    'name' => __('Texto verde tarjeta de contacto', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'text-green-contact-card',
    'std' => '',
    'type' => 'text');

//Vincúlese
     $options[] = array(
    'name' => __('Vincúlese', 'options_check'),
    'type' => 'heading');

    $options[] = array(
    'name' => __('Título Tab 1', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-tab-1',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Título Tab 2', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-tab-2',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Título Tab 3', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-tab-3',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Título Tab 4', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-tab-4',
    'std' => '',
    'type' => 'text');

    //Estado de cuenta
    $options[] = array(
    'name' => __('TAB ESTADO DE CUENTA ', 'options_check'),
    'type' => 'title');

     $options[] = array(
    'name' => __('Título', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'titulo-estado-cuenta',
    'std' => '',
    'type' => 'text');

    $options[] = array(
    'name' => __('Texto 1', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'before-enter',
    'std' => '',
    'type' => 'text');

     $options[] = array(
    'name' => __('Botón 1', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'suscriptor-1',
    'std' => '',
    'type' => 'text');

     $options[] = array(
    'name' => __('Botón 2', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'suscriptor-2',
    'std' => '',
    'type' => 'text');

     $options[] = array(
    'name' => __('Texto inferior', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'bottom-text-suscriptor',
    'std' => '',
    'type' => 'text');

     $options[] = array(
    'name' => __('Texto Enlace', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'bottom-text-link',
    'std' => '',
    'type' => 'text');

     $options[] = array(
    'name' => __('Enlace', 'options_check'),
    'desc' => __('', 'options_check'),
    'id' => 'bottom-link',
    'std' => '',
    'type' => 'text');

//Clientes
     $options[] = array(
    'name' => __('Clientes', 'options_check'),
    'type' => 'heading');

    $options[] = array(
    'name' => __('CARD 1', 'options_check'),
    'type' => 'title');

        $options[] = array(
        'desc' => __('Título card 1', 'options_check'),
        'id' => 'cl-card-1-title',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('texto card 1', 'options_check'),
        'id' => 'cl-card-1-content',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Enlace card 1', 'options_check'),
        'id' => 'cl-card-1-link',
        'std' => '',
        'type' => 'text');

    $options[] = array(
    'name' => __('CARD 2', 'options_check'),
    'type' => 'title');

        $options[] = array(
        'desc' => __('Título card 2', 'options_check'),
        'id' => 'cl-card-2-title',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('texto card 2', 'options_check'),
        'id' => 'cl-card-2-content',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Enlace card 2', 'options_check'),
        'id' => 'cl-card-2-link',
        'std' => '',
        'type' => 'text');

//sostenibilidad
     $options[] = array(
    'name' => __('Sostenibilidad', 'options_check'),
    'type' => 'heading');


     $options[] = array(
    'name' => __('ACORDEÓN 1', 'options_check'),
    'type' => 'title');

        $options[] = array(
        'nae' => __('Título acordion 1', 'options_check'),
        'desc' => __('título acordeón 1', 'options_check'),
        'id' => 'ac-1-title',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Texto acordeón 1', 'options_check'),
        'id' => 'ac-1-content',
        'std' => '',
        'type' => 'text');

     $options[] = array(
    'name' => __('ACORDEÓN 2', 'options_check'),
    'type' => 'title');

        $options[] = array(
        'desc' => __('título acordeón 2', 'options_check'),
        'id' => 'ac-2-title',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Texto acordeón 2', 'options_check'),
        'id' => 'ac-2-content',
        'std' => '',
        'type' => 'text');


            $options[] = array(
            'desc' => __('Título tab 1', 'options_check'),
            'id' => 'ac-2-t1',
            'std' => '',
            'type' => 'text');

                $options[] = array(
                'desc' => __('Texto tab 1', 'options_check'),
                'id' => 'ac-2-c1',
                'std' => '',
                'type' => 'text');

            $options[] = array(
            'desc' => __('Título tab 2', 'options_check'),
            'id' => 'ac-2-t2',
            'std' => '',
            'type' => 'text');

                $options[] = array(
                'desc' => __('Texto tab 2', 'options_check'),
                'id' => 'ac-2-c2',
                'std' => '',
                'type' => 'text');

            $options[] = array(
            'desc' => __('Título tab 3', 'options_check'),
            'id' => 'ac-2-t3',
            'std' => '',
            'type' => 'text');

                $options[] = array(
                'desc' => __('Texto tab 3', 'options_check'),
                'id' => 'ac-2-c3',
                'std' => '',
                'type' => 'text');

     $options[] = array(
    'name' => __('ACORDEÓN 3', 'options_check'),
    'type' => 'title');

        $options[] = array(
        'desc' => __('título acordeón 3', 'options_check'),
        'id' => 'ac-3-title',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Texto acordeón 3', 'options_check'),
        'id' => 'ac-3-content',
        'std' => '',
        'type' => 'text');

            $options[] = array(
            'desc' => __('Título tab 1', 'options_check'),
            'id' => 'ac-3-t1',
            'std' => '',
            'type' => 'text');

                $options[] = array(
                'desc' => __('Texto tab 1', 'options_check'),
                'id' => 'ac-3-c1',
                'std' => '',
                'type' => 'text');

                $options[] = array(
                'desc' => __('Imagen tab 1', 'options_check'),
                'id' => 'ac-3-i1',
                'std' => '',
                'type' => 'upload');


            $options[] = array(
            'desc' => __('Título tab 2', 'options_check'),
            'id' => 'ac-3-t2',
            'std' => '',
            'type' => 'text');

                $options[] = array(
                'desc' => __('Texto tab 2', 'options_check'),
                'id' => 'ac-3-c2',
                'std' => '',
                'type' => 'text');

     $options[] = array(
    'name' => __('ACORDEÓN 4', 'options_check'),
    'type' => 'title');

        $options[] = array(
        'desc' => __('título acordeón 4', 'options_check'),
        'id' => 'ac-4-title',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Texto acordeón 4', 'options_check'),
        'id' => 'ac-4-content',
        'std' => '',
        'type' => 'text');

            $options[] = array(
            'desc' => __('Título tab 1', 'options_check'),
            'id' => 'ac-4-t1',
            'std' => '',
            'type' => 'text');

                $options[] = array(
                'desc' => __('Texto tab 1', 'options_check'),
                'id' => 'ac-4-c1',
                'std' => '',
                'type' => 'text');

                $options[] = array(
                'desc' => __('Imagen tab 1', 'options_check'),
                'id' => 'ac-4-i1',
                'std' => '',
                'type' => 'upload');

            $options[] = array(
            'desc' => __('Título tab 2', 'options_check'),
            'id' => 'ac-4-t2',
            'std' => '',
            'type' => 'text');

                $options[] = array(
                'desc' => __('Texto tab 2', 'options_check'),
                'id' => 'ac-4-c2',
                'std' => '',
                'type' => 'text');

                $options[] = array(
                'desc' => __('Imagen tab 2', 'options_check'),
                'id' => 'ac-4-i2',
                'std' => '',
                'type' => 'upload');
//Trbaje
     $options[] = array(
    'name' => __('Trabaja con nosotros', 'options_check'),
    'type' => 'heading');

     $options[] = array(
        'desc' => __('Título sección', 'options_check'),
        'id' => 'trabaja-title',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Título botón 1', 'options_check'),
        'id' => 'tr-t1',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Texto botón 1', 'options_check'),
        'id' => 'tr-c1',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Título botón 2', 'options_check'),
        'id' => 'tr-t2',
        'std' => '',
        'type' => 'text');

        $options[] = array(
        'desc' => __('Texto botón 1', 'options_check'),
        'id' => 'tr-c2',
        'std' => '',
        'type' => 'text');

    return $options;
}


