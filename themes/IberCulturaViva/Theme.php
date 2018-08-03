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
           'home: title' => i::__("Bienvenid@!"),
           'home: abbreviation' => "MICV",
           'home: colabore' => i::__('Participe'),
           'home: welcome' => i::__("El Mapa IberCultura Viva es la plataforma libre, gratuita y colaborativa de mapeo del programa de cooperación IberCultura Viva sobre las políticas culturales de base comunitaria de los países iberoamericanos. Es un espacio colaborativo en el que puedes registrarte como agente cultural, difundir tus eventos, subir espacios, proyectos, e inscribirte a las convocatorias y concursos publicados.<br/><br/>
           La información recabada por el Mapa IberCultura Viva será utilizada para la construcción/consolidación de indicadores culturales que fortalecerán los sistemas de información cultural de los países miembros."),
//            'home: events' => "Você pode pesquisar eventos culturais nos campos de busca combinada. Como usuário cadastrado, você pode incluir seus eventos na plataforma e divulgá-los gratuitamente.",
//            'home: agents' => "Você pode colaborar na gestão da cultura com suas próprias informações, preenchendo seu perfil de agente cultural. Neste espaço, estão registrados artistas, gestores e produtores; uma rede de atores envolvidos na cena cultural da região. Você pode cadastrar um ou mais agentes (grupos, coletivos, bandas instituições, empresas, etc.), além de associar ao seu perfil eventos e espaços culturais com divulgação gratuita.",
//            'home: spaces' => "Procure por espaços culturais incluídos na plataforma, acessando os campos de busca combinada que ajudam na precisão de sua pesquisa. Cadastre também os espaços onde desenvolve suas atividades artísticas e culturais.",
//            'home: projects' => "Reúne projetos culturais ou agrupa eventos de todos os tipos. Neste espaço, você encontra leis de fomento, mostras, convocatórias e editais criados, além de diversas iniciativas cadastradas pelos usuários da plataforma. Cadastre-se e divulgue seus projetos.",
//            'home: home_devs' => 'Existem algumas maneiras de desenvolvedores interagirem com o Mapas Culturais. A primeira é através da nossa <a href="https://github.com/hacklabr/mapasculturais/blob/master/documentation/docs/mc_config_api.md" target="_blank">API</a>. Com ela você pode acessar os dados públicos no nosso banco de dados e utilizá-los para desenvolver aplicações externas. Além disso, o Mapas Culturais é construído a partir do sofware livre <a href="http://institutotim.org.br/project/mapas-culturais/" target="_blank">Mapas Culturais</a>, criado em parceria com o <a href="http://institutotim.org.br" target="_blank">Instituto TIM</a>, e você pode contribuir para o seu desenvolvimento através do <a href="https://github.com/hacklabr/mapasculturais/" target="_blank">GitHub</a>.',
//
//            'search: verified results' => 'Resultados Verificados',
//            'search: verified' => "Verificados"

            'opportunity_claim' => i::__('Solicitud de Recurso de Convocatoria'),
            'entities: Opportunities' => i::__('Convocatorias'),
            'entities: My Opportunities' => i::__('Mis Convocatorias'),
            'entities: My opportunities' => i::__('Mis convocatorias'),
            'entities: opportunity found' => i::__('convocatoria encontrada'),
            'entities: opportunities found' => i::__('convocatorias encontradas'),
            'entities: Opportunities of the agent' => i::__('Convocatorias del agente'),
            'entities: Opportunities of the space' => i::__('Convocatorias del espacio'),
            'entities: Opportunities of the event' => i::__('Convocatorias del evento'),
            'entities: opportunity' => i::__('convocatoria'),
            'entities: opportunities' => i::__('convocatorias'),
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
    }

    protected function _publishAssets() {
        $this->asset('img/home--agents.jpg', false);
        $this->asset('img/home--developers.jpg', false);
        $this->asset('img/home--events.jpg', false);
        $this->asset('img/home--intro.jpg', false);
        $this->asset('img/home--opportunities.jpg', false);
        $this->asset('img/home--projects.jpg', false);
        $this->asset('img/home--spaces.jpg', false);

        $this->enqueueScript('app', 'hide-fields', 'js/hide-fields.js');

        $this->jsObject['assets']['logo-instituicao'] = $this->asset('img/logo-instituicao.png', false);
    }

    function getAddressByPostalCode($postalCode) {
        return [
            'success' => false,
            'error_msg' => 'Busca por CEP desabilitada para esse tema.'
        ];
    }

}
