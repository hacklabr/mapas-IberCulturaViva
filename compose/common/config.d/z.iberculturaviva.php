<?php 
use MapasCulturais\i;

return [
    'app.siteName' => env('SITE_NAME', 'Mapa IberCultura Viva'),
    'app.siteDescription' => \MapasCulturais\i::__("O Mapa IberCultura Viva é a plataforma livre, gratuita e colaborativa de mapeamento do programa de cooperação IberCultura Viva. Neste espaço, representantes de organizações culturais comunitárias e povos originários podem se registrar como agentes culturais, difundir eventos, cadastrar projetos e inscrever-se nos editais e concursos publicados.<br/><br/>
    A informação coletada pelo Mapa IberCultura Viva será utilizada para a construção/consolidação de indicadores culturais que fortalecerão os sistemas de informação cultural dos países membros do programa (Argentina, Brasil, Chile, Costa Rica, El Salvador, Equador, Espanha, Guatemala, México, Peru e Uruguai)."),

    'themes.active' => env('ACTIVE_THEME', 'IberCulturaViva'),

    'app.lcode' => env('APP_LCODE', 'es_ES,pt_BR'),

    'app.verifiedSealsIds' => explode(',', env('VERIFIED_SEALS', '3')),

    // MAP
    'maps.center' => [-5, -30],
    'maps.zoom.default' => env('MAPS_ZOOM_DEFAULTS', 3),
    'maps.zoom.approximate' => env('MAPS_ZOOM_APPROXIMATE', 14),
    'maps.zoom.precise' => env('MAPS_ZOOM_PRECISE', 16),
    'maps.zoom.max' => env('MAPS_ZOOM_MAX', 18),
    'maps.zoom.min' => env('MAPS_ZOOM_MIN', 3),
    'maps.includeGoogleLayers' => env('MAPS_INCLUDE_GOOGLE_LAYERS', false),

    // CEP API
    'cep.endpoint'      => env('CEP_ENDPOINT', 'http://www.cepaberto.com/api/v2/ceps.json?cep=%s'),
    'cep.token_header'  => env('CEP_TOKEN_HEADER', 'Authorization: Token token="%s"'),
    'cep.token'         => env('CEP_TOKEN', ''),
    
];