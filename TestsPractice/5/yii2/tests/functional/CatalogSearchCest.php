<?php
use Yii;
class CatalogSearchCest 
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('/catalog/index');
    }

    public function seeTwoLinks(\FunctionalTester $I)
    {
        $I->see('Монитор', 'a');        
        $I->see('11000р');        
        $I->see('Клавиатура', 'a');        
        $I->see('350р');        
    }
   

    public function seeSearchField(\FunctionalTester $I){
        $I->see('Поиск', 'h2');
    }

    public function seeAllProductsLink(\FunctionalTester $I){
        $I->see('Все товары', 'a');
    }

    public function completelySearch(\FunctionalTester $I){
        $I->amOnPage('index');
        // $I->submitForm('#search_form', [
        //     'q' => 'da',
        // ],'Найти');
        // $I->seeCurrentUrlEquals('/catalog/index?q=da');
        $I->see('Ничего не найдено');
        // $I->see('Монитор'); 
    }

}
