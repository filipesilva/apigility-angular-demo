<?php
return array(
    'router' => array(
        'routes' => array(
            'demo.rest.slides' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/slides[/:slides_id]',
                    'defaults' => array(
                        'controller' => 'demo\\V1\\Rest\\Slides\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'demo.rest.slides',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'demo\\V1\\Rest\\Slides\\SlidesResource' => 'demo\\V1\\Rest\\Slides\\SlidesResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'demo\\V1\\Rest\\Slides\\Controller' => array(
            'listener' => 'demo\\V1\\Rest\\Slides\\SlidesResource',
            'route_name' => 'demo.rest.slides',
            'route_identifier_name' => 'slides_id',
            'collection_name' => 'slides',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'demo\\V1\\Rest\\Slides\\SlidesEntity',
            'collection_class' => 'demo\\V1\\Rest\\Slides\\SlidesCollection',
            'service_name' => 'slides',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'demo\\V1\\Rest\\Slides\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'demo\\V1\\Rest\\Slides\\Controller' => array(
                0 => 'application/vnd.demo.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'demo\\V1\\Rest\\Slides\\Controller' => array(
                0 => 'application/vnd.demo.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'demo\\V1\\Rest\\Slides\\SlidesEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'demo.rest.slides',
                'route_identifier_name' => 'slides_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ArraySerializable',
            ),
            'demo\\V1\\Rest\\Slides\\SlidesCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'demo.rest.slides',
                'route_identifier_name' => 'slides_id',
                'is_collection' => true,
            ),
        ),
    ),
);
