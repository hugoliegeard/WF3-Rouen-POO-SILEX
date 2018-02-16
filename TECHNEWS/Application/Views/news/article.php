<div class="row">
    <!--colleft-->
    <div class="col-md-8 col-sm-12">
        <!--post-detail-->
        <article class="post-detail">
            <h1><?= $article->TITREARTICLE ?></h1>
            <div class="meta-post">
                <a href="#">
                    <?= $article->PRENOMAUTEUR . ' ' .$article->NOMAUTEUR ?>
                </a>
                <em></em>
                <span>
                    <time datetime="<?= $article->DATECREATIONARTICLE ?>"></time>
                </span>
            </div>

            <?= $article->CONTENUARTICLE ?>

            <h5 class="text-right font-heading"><strong><?= $article->PRENOMAUTEUR . ' ' .$article->NOMAUTEUR ?></strong> </h5>

        </article>
        <!--social-detail-->
        <div class="social-detail">
            <span>   Share article</span>

            <ul class="list-social-icon">
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

        <!--related post-->
        <div class="detail-caption">
            <span>  DANS LA MÊME CAT&Eacute;GORIE</span>
        </div>
        <section class="spotlight-thumbs spotlight-thumbs-related">
            <div class="row">
                <?php foreach ($suggestions as $article) : ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="spotlight-item-thumb">
                            <div class="spotlight-item-thumb-img">
                                <a href="<?= $this->generateUfm('article/$1-$2.html',
                                    [ $article->IDARTICLE,
                                        $this->slugify($article->TITREARTICLE) ]) ?>">
                                    <img alt="<?= $article->TITREARTICLE ?>" src="<?= PATH_PUBLIC . '/images/product/' . $article->FEATUREDIMAGEARTICLE;  ?>">
                                </a>
                                <a href="<?= $this->generateUrl('news', strtolower($article->LIBELLECATEGORIE)); ?>" class="cate-tag"><?= $article->LIBELLECATEGORIE ?></a>
                            </div>
                            <h3><a href="<?= $this->generateUfm('article/$1-$2.html',
                                    [ $article->IDARTICLE,
                                        $this->slugify($article->TITREARTICLE) ]) ?>"><?= $article->TITREARTICLE ?></a></h3>
                            <div class="meta-post">
                                <a href="#">
                                    <?= $article->PRENOMAUTEUR ?> <?= $article->NOMAUTEUR ?>
                                </a>
                                <em></em>
                                <time datetime="<?= $article->DATECREATIONARTICLE ?>"></time>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </div>

    <?php include PATH_SIDEBAR; ?>

</div>