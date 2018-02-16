</div>
</div>
<!--footer-->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4  col-sm-4 col-xs-12">
                <div class="about">
                    <a href="<?= $this->generateUrl('news', 'index') ?>" class="logo">
                        <img alt="" src="<?= PATH_PUBLIC ?>/images/logo_footer.png" />
                    </a>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                </div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                <h3>NOS CATEGORIES</h3>
                <ul class="list-category">
                    <?php
                    /**
                    * https://stackoverflow.com/questions/12409915/php-casting-variable-as-object-type-in-foreach-loop
                    * @var $categorie Categorie
                    */
                    foreach ($categories as $categorie) : ?>
                        <li>
                            <a href="<?= $this->generateUrl('news', strtolower($article->getCATEGORIEOBJ()->getLIBELLECATEGORIE())) ?>">
                                <?= $categorie->getLIBELLECATEGORIE() ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                <h3>RECHERCHE PAR TAGS</h3>

                <div class="list-tags">
                    <?php
                    /**
                     * @var $tag Tags
                     */
                    foreach ($tags as $tag) : ?>
                        <a href="#"><?= $tag->getLIBELLETAGS() ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!--All right-->
        <div class="allright">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <p> © 2017 <a href="#">TECH NEWS</a>. All rights reserved.</p>
                </div>

                <div class="col-sm-6 col-xs-12">
                    <ul class="list-social-icon list-social-icon-footer">
                        <li>
                            <a href="#" class="facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="google">
                                <i class="fa fa-google"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="youtube">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="pinterest">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="rss">
                                <i class="fa fa-rss"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!--script file-->
<script src="<?= PATH_PUBLIC ?>/js/jquery.min.js"></script>
<script src="<?= PATH_PUBLIC ?>/js/bootstrap.js"></script>
<script src="<?= PATH_PUBLIC ?>/js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js" integrity="sha256-ABVkpwb9K9PxubvRrHMkk6wmWcIHUE9eBxNZLXYQ84k=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/locale/fr.js" integrity="sha256-zX28BNgk6820wpv/6OskpqvBUscfTBmeXaTDUBzqj1w=" crossorigin="anonymous"></script>
<script src="<?= PATH_PUBLIC ?>/js/main.js"></script>
</body>
</html>