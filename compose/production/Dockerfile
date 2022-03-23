FROM mapasculturais/mapasculturais:v5.0.23

# clona versão v1.0.1 do autenticador
RUN git clone --depth 1 --branch v1.0.1 https://github.com/hacklabr/mapasculturais-multipleLocalAuth /var/www/html/protected/application/plugins/MultipleLocalAuth

RUN curl https://raw.githubusercontent.com/opauth/facebook/master/FacebookStrategy.php > /var/www/html/protected/application/plugins/MultipleLocalAuth/Facebook/FacebookStrategy.php

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php
COPY compose/common/config.d /var/www/html/protected/application/conf/config.d
COPY compose/production/config.d /var/www/html/protected/application/conf/config.d

COPY themes /var/www/html/protected/application/themes
COPY plugins /var/www/html/protected/application/plugins
COPY translations /var/www/html/protected/application/translations

RUN sass /var/www/html/protected/application/themes/IberCulturaViva/assets/css/sass/main.scss /var/www/html/protected/application/themes/IberCulturaViva/assets/css/main.css