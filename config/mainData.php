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


    'model'=>[
      'name'=>'',
      'relations'=>[
          [
            'name'=>'',
            'model'=>'',
            'type'=>''
          ]
      ],
      'fillable'=>[
          ''=>[
              'type'=>'',
              'roles'=>[]
          ],
      ],
      'hidden'=>[
          '',
      ],
      'options'=>[
          'softDelete'=>true,
          'CreateRequest'=>true,
          'UpdateRequest'=>true,
          'controller'=>[
              'case'=>true,
              'namespace'=>'',
              'methods'=>[
                  'index'=>true,
                  'show'=>true,
                  'create'=>true,
                  'store'=>true,
                  'edit'=>true,
                  'update'=>true,
                  'delete'=>true
              ],
          ],
          'seeder'=>true,
          'seed'=>true,
          'Routes'=>true,
          'authorize'=>true,
          'notify'=>true,
          'scopes'=>true,
          'event'=>true,
          'policy'=>true,
          'mail'=>true,
          'test'=>true,
      ],
    ],
];
/* get Model TableName

\Illuminate\Support\Str::snake(Str::pluralStudly(class_basename(Model::class)));

*/
