FROM hacklab/mapasculturais:develop

COPY themes/IberCulturaViva /var/www/html/protected/application/themes/IberCulturaViva

RUN git clone https://github.com/LibreCoopUruguay/MultipleLocalAuth /var/www/html/protected/application/plugins/MultipleLocalAuth

COPY compose/config.d /var/www/html/protected/application/conf/config.d
