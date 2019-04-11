<?php
return [
    'registration.ownerDefinition' => array(
        'required' => true,
        'label' => \MapasCulturais\i::__('Agente responsável pela inscrição'),
        'agentRelationGroupName' => 'owner',
        'description' => \MapasCulturais\i::__('Agente individual (pessoa física) com os campos CPF, Data de Nascimento/Fundação, Gênero, Orientação Sexual, Raça/Cor, Email Privado e Telefone 1 obrigatoriamente preenchidos'),
        'type' => 1,
        'requiredProperties' => array('documento', 'endereco', 'En_Pais', 'dataDeNascimento', 'genero', 'emailPrivado', 'telefone1')
    ),

    'registration.propertiesToExport' => array(
        'id',
        'name',
        'nomeCompleto',
        'documento',
        'dataDeNascimento',
        'location',
        'endereco',
        'En_CEP',
        'En_Nome_Logradouro',
        'En_Num',
        'En_Complemento',
        'En_Bairro',
        'En_Municipio',
        'En_Estado',
        'En_Pais',
        'telefone1',
        'telefone2',
        'telefonePublico',
        'emailPrivado',
        'emailPublico',
        'site',
        'googleplus',
        'facebook',
        'twitter'
    ),
];