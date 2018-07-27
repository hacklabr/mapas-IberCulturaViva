<?php
return [
    'auth.provider' => '\MultipleLocalAuth\Provider',
    'auth.config' => array(
        'salt' => 'LT_SECURITY_SALT_SECURITY_SALT_SECURITY_SALT_SECURITY_SALT_SECU',
        'timeout' => '24 hours',
        'strategies' => [
           'Facebook' => array(
               'app_id' => 'SUA_APP_ID',
               'app_secret' => 'SUA_APP_SECRET',
               'scope' => 'email'
           ),

            'LinkedIn' => array(
                'api_key' => 'SUA_API_KEY',
                'secret_key' => 'SUA_SECRET_KEY',
                'redirect_uri' => URL_DO_SEU_SITE . '/autenticacao/linkedin/oauth2callback',
                'scope' => 'r_emailaddress'
            ),
            'Google' => array(
                'client_id' => 'SEU_CLIENT_ID',
                'client_secret' => 'SEU_CLIENT_SECRET',
                'redirect_uri' => URL_DO_SEU_SITE . '/autenticacao/google/oauth2callback',
                'scope' => 'email'
            ),
            'Twitter' => array(
                'app_id' => 'SUA_APP_ID',
                'app_secret' => 'SUA_APP_SECRET',
            ),

        ]
    ),
];
