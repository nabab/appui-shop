<?php

use bbn\X;
use bbn\Appui\Search;

/** @var $ctrl \bbn\Mvc\Controller */


$id_type = $model->inc->options->fromCode('products', 'types', 'appui-note', 'plugins', 'shop', 'appui');
$url = $model->pluginUrl('appui-shop');
return Search::register(function($search) use ($url, $id_type){
  $fields = ['id' => 'bbn_shop_products.id', 'bbn_shop_products.id_note', 'version', 'bbn_notes.id_type', 'code', 'type' => 'bbn_options.text', 'title', 'latest', 'match' => 'title'];
  return [
    'score' => 65,
    'component' => 'appui-shop-search-item',
    'url' => $url . '/products/product/{{id}}/home',
    'cfg' => [
      'tables' => ['bbn_shop_products'],
      'fields' => $fields,
      'join' => [
        [
          'table' => 'bbn_notes',
          'on' => [
            [
              'field' => 'bbn_shop_products.id_note',
              'exp' => 'bbn_notes.id'
            ]
          ]
        ],
        [
          'table' => 'bbn_notes_versions',
          'on' => [
            [
              'field' => 'bbn_notes_versions.id_note',
              'exp' => 'bbn_notes.id'
            ]
          ]
        ],
        [
          'table' => 'bbn_options',
          'on' => [
            [
              'field' => 'id_type',
              'exp' => 'bbn_options.id'
            ]
          ]
        ],
      ],
      'where' => [
        'conditions' => [
          [
            'field' => 'latest',
            'value' => 1
          ], [
            'field' => 'title',
            'value' => $search
          ], [
            'field' => 'id_type',
            'value' => $id_type
          ]
        ]
      ]
    ],
    'alternates' => [
      [
        'where' => [
          'conditions' => [
            [
              'field' => 'latest',
              'value' => 1
            ], [
              'field' => 'title',
              'operator' => 'contains',
              'value' => $search
            ], [
              'field' => 'id_type',
              'value' => $id_type
              ]
          ]
        ],
        'score' => 30
      ],
      [
        'where' => [
          'conditions' => [
            [
              'field' => 'latest',
              'value' => 0
            ], [
              'field' => 'title',
              'operator' => 'contains',
              'value' => $search
            ], [
              'field' => 'id_type',
              'value' => $id_type
              ]
          ]
        ],
        'score' => 10
      ]
    ]
  ];
});

