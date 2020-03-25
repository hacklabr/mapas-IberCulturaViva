</section>
<footer>
    <div id="footer-paises">
        <img src="<?php $this->asset('img/paises/segib.png'); ?>" alt="Secretaría General Iberoamericana">
        <img src="<?php $this->asset('img/paises/argentina.png'); ?>" alt="Argentina">
        <img src="<?php $this->asset('img/paises/brasil.png'); ?>" alt="Brasil">
        <img src="<?php $this->asset('img/paises/colombia.jpg'); ?>" alt="Colombia">
        <img src="<?php $this->asset('img/paises/chile.png'); ?>" alt="Chile">
        <img src="<?php $this->asset('img/paises/red-cultura.png'); ?>" alt="Red Cultura, Chile">
        <img src="<?php $this->asset('img/paises/costa-rica.png'); ?>" alt="Costa Rica">
        <img src="<?php $this->asset('img/paises/ecuador.jpg'); ?>" alt="Ecuador">
        <img src="<?php $this->asset('img/paises/el-salvador.jpg'); ?>" alt="El Salvador">
        <img src="<?php $this->asset('img/paises/espana.png'); ?>" alt="España">
        <img src="<?php $this->asset('img/paises/mexico.jpg'); ?>" alt="México">
        <img src="<?php $this->asset('img/paises/peru.png'); ?>" alt="Perú">
        <img src="<?php $this->asset('img/paises/uruguay.png'); ?>" alt="Uruguay">
    </div>
    <div id="main-footer">
        <div class="row">
            <div class="column">
                <p class="logo-iberculturaviva"><a href="http://iberculturaviva.org/"><img src="<?php $this->asset('img/logo-site.svg'); ?>" alt="IberCultura Viva"></a></p>
                <p class="social-icons">
                    <a href="https://www.facebook.com/iberculturaviva" aria-label="Facebook">&#xe093;</a>
                    <a href="https://twitter.com/iberculturaviva" aria-label="Twitter">&#xe094;</a>
                    <a href="#" aria-label="Vimeo">&#xe09c;</a>
                    <a href="#" aria-label="YouTube">&#xe0a3;</a>
                </p>
            </div>
            <div class="column">
                <p class="logo-hacklab">Desenvolvido pelo <a href="https://hacklab.com.br"><img src="<?php $this->asset('img/logo-hacklab.svg'); ?>" alt="hacklab/"></a></p>
            </div>
        </div>
    </div>
</footer>
<?php $this->part('templates'); ?>
<?php $this->bodyEnd(); ?>
<iframe id="require-authentication" src="" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; z-index:100000"></iframe>

<?php if ($this->isEditable()): ?>
    <div id="editbox-human-crop" class="js-editbox" title="<?php \MapasCulturais\i::esc_attr_e("Recortar imagem");?>">
        <img id="human-crop-image"/>
    </div>
<?php endif; ?>
</body>
</html>
