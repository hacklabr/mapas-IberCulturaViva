FROM hacklab/mapasculturais:v4.4.0

RUN git clone https://github.com/LibreCoopUruguay/MultipleLocalAuth /var/www/html/protected/application/plugins/MultipleLocalAuth
RUN curl https://raw.githubusercontent.com/opauth/facebook/master/FacebookStrategy.php > /var/www/html/protected/application/plugins/MultipleLocalAuth/Facebook/FacebookStrategy.php

COPY compose/config.d /var/www/html/protected/application/conf/config.d

COPY conf/agent-types.php /var/www/html/protected/application/conf/agent-types.php
COPY conf/opportunity-types.php /var/www/html/protected/application/conf/opportunity-types.php
COPY conf/taxonomies.php /var/www/html/protected/application/conf/taxonomies.php

COPY translations/pt_BR.mo /var/www/html/protected/application/translations/pt_BR.mo
COPY translations/pt_BR.po /var/www/html/protected/application/translations/pt_BR.po
COPY translations/es_ES.mo /var/www/html/protected/application/translations/es_ES.mo
COPY translations/es_ES.po /var/www/html/protected/application/translations/es_ES.po

COPY themes/IberCulturaViva /var/www/html/protected/application/themes/IberCulturaViva
