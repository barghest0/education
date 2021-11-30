<?php

class CatalogCest 
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('catalog/index');
    }

    public function seeTwoLinks(\FunctionalTester $I)
    {
        $I->see('Монитор', 'a');        
        $I->see('11000р');        
        $I->see('Клавиатура', 'a');        
        $I->see('350р');        
    }
    //Запрет просмотра дня неавторизованных пользователей
    public function internalLoginById(\FunctionalTester $I)
    {
        $I->click('Монитор');
        $I->see('Доступ разрешен только для авторизированных пользователей');
    }
    //Просмотр товара для авторизованных пользователй
    public function internalLoginByInstance(\FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
        $I->submitForm('#login-form', [
            'LoginForm[username]' => 'admin',
            'LoginForm[password]' => 'admin',
        ]);
        $I->see('Logout (admin)');
        $I->amOnRoute('catalog/index');
        $I->see('Монитор', 'a');
        $I->see('11000р');   
        $I->click('Монитор');   
        $I->see('Монитор', 'h1');  
        $I->see('11000р', 'h2'); 
        $I->dontSee('Доступ разрешен только для авторизированных пользователей');   
    }

}
