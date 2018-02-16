<div class="row">
    <!--colleft-->
    <div class="col-md-8 col-sm-12">

        <?php if(!empty($articles)) : ?>

            <div class="box-caption">
                <span><?= $this->getAction() ?></span>
            </div>
            <!--list-news-cate-->
            <div class="list-news-cate">
                <?php foreach ($articles as $article) : ?>
                    <article class="news-cate-item">
                        <div class="row">
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <a href="<?= $this->generateUfm('article/$1-$2.html', [$article->getIDARTICLE(), $this->slugify($article->getTITREARTICLE())]) ?>">
                                    <img alt="<?= $article->getTITREARTICLE() ?>" src="<?= $article->getFULLIMAGEARTICLE() ?>">
                                </a>
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <h3><a href="<?= $this->generateUfm('article/$1-$2.html', [$article->getIDARTICLE(), $this->slugify($article->getTITREARTICLE())]) ?>"><?= $article->getTITREARTICLE() ?></a></h3>
                                <div class="meta-post">
                                    <a href="#">
                                        <?= $article->getAUTEUROBJ()->getNOMCOMPLETAUTEUR() ?>
                                    </a>
                                    <em></em>
                                    <span>
                                        <time datetime="<?= $article->getDATECREATIONARTICLE() ?>"></time>
                                    </span>
                                </div>
                                <?= $article->getACCROCHEARTICLE() ?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        <?php else : ?>

                <div class="alert alert-danger">
                    <strong>Aucune publication pour le moment</strong>
                </div>

        <?php endif; ?>

<!--        <div class="paging">-->
<!--            <a href="#">Prev</a>-->
<!--            <a href="#" class="current">1</a>-->
<!--            <a href="#">2</a>-->
<!--            <a href="#">3</a>-->
<!--            <a href="#">4</a>-->
<!--            <a href="#">5</a>-->
<!--            <a href="#">Next</a>-->
<!--        </div>-->

    </div>

<?php include PATH_SIDEBAR ?>

</div>
