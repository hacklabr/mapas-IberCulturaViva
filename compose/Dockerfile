FROM hacklab/mapasculturais:develop

COPY themes/IberCulturaViva /var/www/html/protected/application/themes/IberCulturaViva

RUN git clone https://github.com/LibreCoopUruguay/MultipleLocalAuth /var/www/html/protected/application/plugins/MultipleLocalAuth

COPY compose/config.d /var/www/html/protected/application/conf/config.d

COPY conf/agent-types.php /var/www/html/protected/application/conf/agent-types.php
COPY conf/opportunity-types.php /var/www/html/protected/application/conf/opportunity-types.php
COPY conf/taxonomies.php /var/www/html/protected/application/conf/taxonomies.php

COPY translations/es_ES.mo /var/www/html/protected/application/translations/es_ES.mo
COPY translations/es_ES.po /var/www/html/protected/application/translations/es_ES.po
