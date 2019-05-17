<?php 
use MapasCulturais\i;

return [
    'app.siteName' => env('SITE_NAME', 'Mapa IberCultura Viva'),
    'app.siteDescription' => \MapasCulturais\i::__("O Mapa IberCultura Viva é a plataforma livre, gratuita e colaborativa de mapeamento do programa de cooperação IberCultura Viva. Neste espaço, representantes de organizações culturais comunitárias e povos originários podem se registrar como agentes culturais, difundir eventos, cadastrar projetos e inscrever-se nos editais e concursos publicados.<br/><br/>
    A informação coletada pelo Mapa IberCultura Viva será utilizada para a construção/consolidação de indicadores culturais que fortalecerão os sistemas de informação cultural dos países membros do programa (Argentina, Brasil, Chile, Costa Rica, El Salvador, Equador, Espanha, Guatemala, México, Peru e Uruguai)."),

    'themes.active' => env('ACTIVE_THEME', 'IberCulturaViva'),

    'app.lcode' => env('APP_LCODE', 'es_ES,pt_BR'),

    'app.verifiedSealsIds' => explode(',', env('VERIFIED_SEALS', '3'))
];