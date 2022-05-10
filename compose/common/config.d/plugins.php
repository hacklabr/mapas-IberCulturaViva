<?php

return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
         
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],

        "LocationPatch" => [
            "namespace" => "LocationPatch",
            "config" => [
                /**
                 * Flag para habilitar o plugin.
                 * Tipo: boolean
                 */
                "enable" => env("LOCATION_PATCH_ENABLE", false),
                /**
                 * Ponto de corte para seleção das entidades. São apenas consideradas
                 * as entidades atualizadas antes deste timestamp.
                 * Formato: yyyyMMddHHmmss
                 */
                "cutoff" => env("LOCATION_PATCH_CUTOFF", "20220510120000"),
            ],
        ],
    ]
];
