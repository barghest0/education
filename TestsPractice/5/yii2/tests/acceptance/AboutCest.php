<?php

use yii\helpers\Url;

class AboutCest
{   
    //Проверка на то, что мы видим заголовок About на странице About
    public function ensureThatAboutWorks(AcceptanceTester $I)
    {
        $I->amOnPage(Url::toRoute('/site/about'));
        $I->see('About', 'h1');
    }
}
