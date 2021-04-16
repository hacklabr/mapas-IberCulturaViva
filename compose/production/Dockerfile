FROM mapasculturais/mapasculturais:v5.0.1

RUN git clone https://github.com/hacklabr/mapasculturais-multipleLocalAuth /var/www/html/protected/application/plugins/MultipleLocalAuth
RUN curl https://raw.githubusercontent.com/opauth/facebook/master/FacebookStrategy.php > /var/www/html/protected/application/plugins/MultipleLocalAuth/Facebook/FacebookStrategy.php

# versão do plugin anterior as modificações da Aldir Blanc, pq ainda não foi traduzido
WORKDIR /var/www/html/protected/application/plugins/MultipleLocalAuth
RUN git checkout d9430f9b2541fb7eca2c73cbcacd6b8a447304da 
WORKDIR /var/www/html/

COPY compose/common/config.php /var/www/html/protected/application/conf/config.php
COPY compose/common/config.d /var/www/html/protected/application/conf/config.d
COPY compose/production/config.d /var/www/html/protected/application/conf/config.d

COPY themes /var/www/html/protected/application/themes
COPY plugins /var/www/html/protected/application/plugins
COPY translations /var/www/html/protected/application/translations

RUN sass /var/www/html/protected/application/themes/IberCulturaViva/assets/css/sass/main.scss /var/www/html/protected/application/themes/IberCulturaViva/assets/css/main.css