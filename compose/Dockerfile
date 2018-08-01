FROM hacklab/mapasculturais:4.1.1

COPY themes/IberCulturaViva /var/www/html/protected/application/themes/IberCulturaViva

RUN git clone https://github.com/LibreCoopUruguay/MultipleLocalAuth /var/www/html/protected/application/plugins/MultipleLocalAuth

COPY compose/config.php /var/www/html/protected/application/conf/config.php
COPY compose/config.d /var/www/html/protected/application/conf/config.d

COPY conf/opportunity-types.php /var/www/html/protected/application/conf/opportunity-types.php
COPY conf/taxonomies.php /var/www/html/protected/application/conf/taxonomies.php
