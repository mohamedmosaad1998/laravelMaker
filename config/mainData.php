<?php
return [
    'types'=>collect([
        'model'     ,'channel'  ,'command',
        'event'     ,'exception','factory',
        'job'       ,'listener' ,'mail',
        'middleware','migration','notification',
        'observer'  ,'policy'   ,'provider',
        'request'   , 'resource', 'rule',
        'seeder'    , 'test'    , 'controller'
    ])->sort()->toArray(),

    'data'=>[
        'attributes'=>[],
        'public'=>[],
        'const'=>[],
        'protected'=>[],
        'more'=>[],
        'model'=>[],
        'event'=>[],
        'factory'=>[],
        'listener'=>[],
        'mail'=>[],
        'middleware'=>[],
        'notification'=>[],
        'observer'=>[],
        'policy'=>[],
        'request'=>[],
        'resource'=>[],
        'test'=>[],
        'controller'=>[]
    ],
];
