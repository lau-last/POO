<?php

require_once '..\src\App\Entity\Article.php';
use App\Entity\Article;

$article_1 = new Article();

$article_1->setPrice(100);
//$article_1->increasePrice(5);
//$article_1->setTradeName('Clavier ultraplat noir');
//$article_1->autoAssignmentReference();

//$article_2 = new Article();

//$article_2->setPrice(200);
//$article_2->increasePrice(10);

//affichage de la remise
//echo 'Article::$remise => '.Article::$remise;

//echo $article_1->getPriceAfterDiscount();

Article::setRemise(20.3);

echo Article::getRemise();

var_dump($article_1);

