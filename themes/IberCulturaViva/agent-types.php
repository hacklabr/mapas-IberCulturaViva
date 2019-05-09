<?php
/**
 * See https://github.com/Respect/Validation to know how to write validations
 */
return array(
    'metadata' => array(
        'nomeCompleto' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Nome completo ou Razão Social'),
            'validations' => array(
                //'required' => \MapasCulturais\i::__('Seu nome completo ou jurídico deve ser informado.')
            )
        ),

        'documento' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Documento de identidade'),
//            'validations' => array(
//                'required' => \MapasCulturais\i::__('Seu CPF ou CNPJ deve ser informado.'),
//                'unique' => \MapasCulturais\i::__('Este documento já está registrado em nosso sistema.'),
//                'v::oneOf(v::cpf(), v::cnpj())' => \MapasCulturais\i::__('O número de documento informado é inválido.'),
//                'v::regex("#^(\d{2}(\.\d{3}){2}/\d{4}-\d{2})|(\d{3}\.\d{3}\.\d{3}-\d{2})$#")' => \MapasCulturais\i::__('Utilize o formato xxx.xxx.xxx-xx para CPF e xx.xxx.xxx/xxxx-xx para CNPJ.')
//            )
        ),

        'ehAfrodescendente' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('É Afrodescendente?'),
            'type' => 'select',
            'options' => array(
                'Sim' => \MapasCulturais\i::__('Sim'),
                'Não' => \MapasCulturais\i::__('Não')
            )
        ),

        'pertenceAPovoOriginario' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Pertence a um Povo Originário?'),
            'type' => 'select',
            'options' => array(
                'Sim' => \MapasCulturais\i::__('Sim'),
                'Não' => \MapasCulturais\i::__('Não')
            )
        ),

        'dataDeNascimento' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Data de Nascimento/Fundação'),
            'type' => 'date',
            'validations' => array(
                'v::date("Y-m-d")' => \MapasCulturais\i::__('Data inválida').'{{format}}',
            )
        ),

        'localizacao' => array(
            'label' => \MapasCulturais\i::__('Localização'),
            'type' => 'select',
            'options' => array(
                '' => \MapasCulturais\i::__('Não Informar'),
                'Pública' => \MapasCulturais\i::__('Pública'),
                'Privada' => \MapasCulturais\i::__('Privada')
            )
        ),

        'genero' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Gênero'),
            'type' => 'select',
            'options' => array(
                '' => \MapasCulturais\i::__('Não Informar'),
                'Mulher Transexual' => \MapasCulturais\i::__('Mulher Transexual'),
                'Mulher' => \MapasCulturais\i::__('Mulher'),
                'Homem Transexual' => \MapasCulturais\i::__('Homem Transexual'),
                'Homem' => \MapasCulturais\i::__('Homem'),
                'Não Binário' => \MapasCulturais\i::__('Não Binário'),
                'Travesti' => \MapasCulturais\i::__('Travesti'),
                'Outras' => \MapasCulturais\i::__('Outras')
            )
        ),

        'emailPublico' => array(
            'label' => \MapasCulturais\i::__('Email Público'),
            'validations' => array(
                'v::email()' => \MapasCulturais\i::__('O email público não é um email válido.')
            )
        ),

        'emailPrivado' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Email Privado'),
            'validations' => array(
                //'required' => \MapasCulturais\i::__('O email privado é obrigatório.'),
                'v::email()' => \MapasCulturais\i::__('O email privado não é um email válido.')
            )
        ),

        'telefonePublico' => array(
            'label' => \MapasCulturais\i::__('Telefone Público'),
            'type' => 'string',
            'validations' => array(
                'v::allOf(v::regex("#^\(\d{2}\)[ ]?\d{4,5}-\d{4}$#"), v::brPhone())' => \MapasCulturais\i::__('Por favor, informe o telefone público no formato (xx) xxxx-xxxx.')
            )
        ),

        'telefone1' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Telefone 1'),
            'type' => 'string',
            'validations' => array(
                'v::allOf(v::regex("#^\(\d{2}\)[ ]?\d{4,5}-\d{4}$#"), v::brPhone())' => \MapasCulturais\i::__('Por favor, informe o telefone 1 no formato (xx) xxxx-xxxx.')
            )
        ),


        'telefone2' => array(
            'private' => true,
            'label' => \MapasCulturais\i::__('Telefone 2'),
            'type' => 'string',
            'validations' => array(
                'v::allOf(v::regex("#^\(\d{2}\)[ ]?\d{4,5}-\d{4}$#"), v::brPhone())' => \MapasCulturais\i::__('Por favor, informe o telefone 2 no formato (xx) xxxx-xxxx.')
            )
        ),

        'endereco' => array(
            'private' => function(){
                return !$this->publicLocation;
            },
            'label' => \MapasCulturais\i::__('Endereço'),
            'type' => 'text'
        ),

        'En_CEP' => [
            'label' => \MapasCulturais\i::__('CEP'),
            'private' => function(){
                return !$this->publicLocation;
            },
        ],
        'En_Nome_Logradouro' => [
            'label' => \MapasCulturais\i::__('Logradouro'),
            'private' => function(){
                return !$this->publicLocation;
            },
        ],
        'En_Num' => [
            'label' => \MapasCulturais\i::__('Número'),
            'private' => function(){
                return !$this->publicLocation;
            },
        ],
        'En_Complemento' => [
            'label' => \MapasCulturais\i::__('Complemento'),
            'private' => function(){
                return !$this->publicLocation;
            },
        ],
        'En_Bairro' => [
            'label' => \MapasCulturais\i::__('Bairro'),
            'private' => function(){
                return !$this->publicLocation;
            },
        ],
        'En_Municipio' => [
            'label' => \MapasCulturais\i::__('Município'),
            'private' => function(){
                return !$this->publicLocation;
            },
        ],
        'En_Estado' => [
            'label' => \MapasCulturais\i::__('Estado'),
            'private' => function(){
                return !$this->publicLocation;
            }
        ],
        'En_Pais' => [
            'label' => \MapasCulturais\i::__('País'),
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
        ],

        'site' => array(
            'label' => \MapasCulturais\i::__('Site'),
            'validations' => array(
                "v::url()" => \MapasCulturais\i::__("A url informada é inválida.")
            )
        ),
        'facebook' => array(
            'label' => \MapasCulturais\i::__('Facebook'),
            'validations' => array(
                "v::url('facebook.com')" => \MapasCulturais\i::__("A url informada é inválida.")
            )
        ),
        'twitter' => array(
            'label' => \MapasCulturais\i::__('Twitter'),
            'validations' => array(
                "v::url('twitter.com')" => \MapasCulturais\i::__("A url informada é inválida.")
            )
        ),
        'googleplus' => array(
            'label' => \MapasCulturais\i::__('Google+'),
            'validations' => array(
                "v::url('plus.google.com')" => \MapasCulturais\i::__("A url informada é inválida.")
            )
        ),
        'instagram' => array(
            'label' => \MapasCulturais\i::__('Instagram'),
            'validations' => array(
                "v::startsWith('@')" => \MapasCulturais\i::__("O usuário informado é inválido. Informe no formato @usuario e tente novamente")
            )
        )
    ),
    'items' => array(
        1 => array( 'name' => \MapasCulturais\i::__('Individual' )),
        2 => array( 'name' => \MapasCulturais\i::__('Coletivo') ),
    )
);