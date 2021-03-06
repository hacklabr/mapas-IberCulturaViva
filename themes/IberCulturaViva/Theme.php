<?php
namespace IberCulturaViva;
use MapasCulturais\Themes\BaseV1;
use MapasCulturais\App;
use MapasCulturais\i;

class Theme extends BaseV1\Theme{

    protected static function _getTexts(){
        $app = App::i();
        $self = $app->view;
        $url_search_agents = $self->searchAgentsUrl;
        $url_search_spaces = $self->searchSpacesUrl;
        $url_search_events = $self->searchEventsUrl;
        $url_search_projects = $self->searchProjectsUrl;

        return [
           'site: name' => 'Mapa IberCultura Viva',
//            'site: description' => App::i()->config['app.siteDescription'],
//            'site: in the region' => 'na região',
//            'site: of the region' => 'da região',
//            'site: owner' => 'Secretaria',
//            'site: by the site owner' => 'pela Secretaria',
//
           'home: title' => i::__("Bem-vind@!"),
           'home: abbreviation' => "plataforma MICV",
           'home: colabore' => i::__('Participe'),
           'home: welcome' => i::__("O Mapa IberCultura Viva é a plataforma livre, gratuita e colaborativa de mapeamento do programa de cooperação IberCultura Viva. Neste espaço, representantes de organizações culturais comunitárias e povos originários podem se registrar como agentes culturais, difundir eventos, cadastrar projetos e inscrever-se nos editais e concursos publicados.<br/><br/>
           A informação coletada pelo Mapa IberCultura Viva será utilizada para a construção/consolidação de indicadores culturais que fortalecerão os sistemas de informação cultural dos países membros do programa (Argentina, Brasil, Chile, Colômbia, Costa Rica, El Salvador, Equador, Espanha, México, Peru e Uruguai)."),
//            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
//            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural da região. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
//            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
//            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
//            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/documentation/docs/mc_config_api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',
//
//            'search: verified results' => 'Resultados Verificados',
//            'search: verified' => "Verificados"
        ];
    }

    static function getThemeFolder() {
        return __DIR__;
    }

    function _init() {
        parent::_init();
        $app = App::i();
        $app->hook('view.render(<<*>>):before', function() use($app) {
            $this->_publishAssets();
        });

        // impede o download automático dos arquivos privados
        $app->hook('GET(file.privateFile).headers', function(&$headers){
            if(isset($headers['Content-Disposition']) && strpos($headers['Content-Disposition'], '.pdf')){
                unset($headers['Content-Description']);
                $headers['Content-Disposition'] = str_replace('attachment; ', '', $headers['Content-Disposition']);
            }
        });
        // atribui área de atuação padrão para novos agentes e espaços
        $app->hook("entity(<<Agent|Space>>).insert:before", function () use ($app) {
            /** @var \MapasCulturais\Entity $this */
            $terms = (array) $this->terms ?? [];
            if (empty($this->terms["area"])) {
                $terms["area"] = [$app->config["app.defaultActivity"]];
                $this->terms = $terms;
            }
            return;
        });
        // insere botão de imprimir na visualização do formulário de inscrição
        $app->hook("template(registration.view.form):begin", function () use ($app) {
            /** @var \MapasCulturais\Theme $this */
            if (!$this->controller->requestedEntity->canUser("admin")) {
                return;
            }
            $this->part("button-print-registration", [
                "registration" => $this->controller->requestedEntity
            ]);
            return;
        });
        // implementa o endpoint para o botão de imprimir
        $app->hook("GET(registration.print)", function () use ($app) {
            /** @var \MapasCulturais\Controller $this */
            $this->requireAuthentication();
            if (!$this->requestedEntity->canUser("admin")) {
                $this->errorJson("Unauthorised.", 401);
                return;
            }
            $app->view->enqueueScript("app", "print-registration", "js/print-registration.js");
            $app->view->enqueueStyle("app", "print-registration", "css/print-registration.css", ["main"]);
            $this->render("single", [
                "entity" => $this->requestedEntity
            ]);
            return;
        });
        return;
    }

    function includeCommonAssets()
    {
        parent::includeCommonAssets();
        $this->enqueueScript("app", "registration-phone", "js/registration-phone.js");
        return;
    }

    function includeVendorAssets()
    {
        parent::includeVendorAssets();
        $this->enqueueScript("vendor", "libphonenumber-min", "vendor/libphonenumber-min.js");
        return;
    }

    protected function _publishAssets() {
        $this->asset('img/home--agents.jpg', false);
        $this->asset('img/home--developers.jpg', false);
        $this->asset('img/home--events.jpg', false);
        $this->asset('img/home--intro.jpg', false);
        $this->asset('img/home--opportunities.jpg', false);
        $this->asset('img/home--projects.jpg', false);
        $this->asset('img/home--spaces.jpg', false);

        $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/logo-instituicao.png', false);
    }

    function getAddressByPostalCode($postalCode) {
        return [
            'success' => false,
            'error_msg' => 'Busca por CEP desabilitada para esse tema.'
        ];
    }

    function register() {
        parent::register();

        $app = App::i();

        // Metadata de espaço
        $this->registerSpaceMetadata('En_Pais', [
            'label' => i::__('País'),
            'type' => 'select',
            'options' => array(
                'AD' => 'Andorra',
                'AR'=>'Argentina',
                'BO' => 'Bolivia',
                'BR'=>'Brasil',
                'CL'=>'Chile',
                'CO' => 'Colombia',
                'CR'=>'Costa Rica',
                'CU' => 'Cuba',
                'EC'=>'Ecuador',
                'SV'=>'El Salvador',
                'ES'=>'España',
                'GT'=>'Guatemala',
                'HN' => 'Honduras',
                'MX'=>'México',
                'NI' => 'Nicarágua',
                'PA' => 'Panamá',
                'PY' => 'Paraguay',
                'PE'=>'Perú',
                'PT' => 'Portugal',
                'DO' => 'República Dominicana',
                'UY'=>'Uruguay',
                'VE' => 'Venezuela',
            )
        ]);
        $this->registerSpaceMetadata('En_Estado', ['label' => i::__('Estado') ]);

        //Metadata de agente
        $app->unregisterEntityMetadata('MapasCulturais\\Entities\\Agent', 'raca');
        $app->unregisterEntityMetadata('MapasCulturais\\Entities\\Agent', 'orientacaoSexual');

        $this->registerAgentMetadata('En_Pais', [
            'label' => i::__('País'),
            'private' => function(){
                return !$this->publicLocation;
            },
            'type' => 'select',
            'options' => array(
                'AD' => 'Andorra',
                'AR'=>'Argentina',
                'BO' => 'Bolivia',
                'BR'=>'Brasil',
                'CL'=>'Chile',
                'CO' => 'Colombia',
                'CR'=>'Costa Rica',
                'CU' => 'Cuba',
                'EC'=>'Ecuador',
                'SV'=>'El Salvador',
                'ES'=>'España',
                'GT'=>'Guatemala',
                'HN' => 'Honduras',
                'MX'=>'México',
                'NI' => 'Nicarágua',
                'PA' => 'Panamá',
                'PY' => 'Paraguay',
                'PE'=>'Perú',
                'PT' => 'Portugal',
                'DO' => 'República Dominicana',
                'UY'=>'Uruguay',
                'VE' => 'Venezuela',
            )
        ]);
        $this->registerAgentMetadata('En_Estado', [
            'label' => i::__('Estado'),
            'private' => function(){
                return !$this->publicLocation;
            }
        ]);

        $this->registerAgentMetadata('documento', [
            'private' => true,
            'label' => i::__('Documento de identidade')
        ]);

        $this->registerAgentMetadata('ehAfrodescendente', [
            'private' => true,
            'label' => i::__('É Afrodescendente?'),
            'type' => 'select',
            'options' => [
                'Sim' => i::__('Sim'),
                'Não' => i::__('Não')
            ]
        ]);

        $this->registerAgentMetadata('pertenceAPovoOriginario', [
            'private' => true,
            'label' => i::__('Pertence a um Povo Originário?'),
            'type' => 'select',
            'options' => [
                'Sim' => i::__('Sim'),
                'Não' => i::__('Não')
            ]
        ]);
        // international phone type for registrations
        $app->registerRegistrationFieldType(new \MapasCulturais\Definitions\RegistrationFieldType([
            "slug" => "phone",
            "name" => \MapasCulturais\i::__("Campo de telefone internacional"),
            "viewTemplate" => "registration-field-types/phone",
            "configTemplate" => "registration-field-types/phone-config",
            "validations" => [
                "v::phone()" => \MapasCulturais\i::__("O valor não é um telefone válido")
            ]
        ]));
        return;
    }


    protected function _getFilters(){
        $filters = parent::_getFilters();


        $filters['agent'] = [
            'paises' => [
                'label' => i::__('Países'),
                'placeholder' => i::__('Países'),
                'fieldType' => 'singleselect',
                'filter' => [
                    'param' => 'En_Pais',
                    'value' => 'IN({val})'
                ]
            ],
            'area' => $filters['agent']['area'],
            'tipos' => $filters['agent']['tipos'],
            'verificados' => $filters['agent']['verificados']
        ];

        $filters['space'] = [
            'paises' => [
                'label' => i::__('Países'),
                'placeholder' => i::__('Países'),
                'fieldType' => 'singleselect',
                'filter' => [
                    'param' => 'En_Pais',
                    'value' => 'IN({val})'
                ]
            ],
            'area' => $filters['space']['area'],
            'tipos' => $filters['space']['tipos'],
            'acessibilidade' => $filters['space']['acessibilidade'],
            'verificados' => $filters['space']['verificados']
        ];

        return $filters;
    }

}
