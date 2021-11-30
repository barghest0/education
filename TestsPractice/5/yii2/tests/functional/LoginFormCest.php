<?php

class LoginFormCest
{
    //Переходим на login
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('site/login');
    }
    //Проверяем то, что видим заголовок
    public function openLoginPage(\FunctionalTester $I)
    {
        $I->see('Login', 'h1');

    }

    //Проверка токена
    public function internalLoginById(\FunctionalTester $I)
    {
        
        $I->amLoggedInAs(100);
        $I->amOnPage('/');
        $I->see('Logout (admin)');
    }

    //Если заходим под админом, то видим  Logout (admin)
    public function internalLoginByInstance(\FunctionalTester $I)
    {
        $I->amLoggedInAs(\app\models\User::findByUsername('admin'));
        $I->amOnPage('/');
        $I->see('Logout (admin)');
    }
    //Если ничего не ввели в форму, то видим ошибки
    public function loginWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', []);
        $I->expectTo('see validations errors');
        $I->see('Username cannot be blank.');
        $I->see('Password cannot be blank.');
    }
    //Если ввели неправильно пароль или логин, то видим ошибки
    public function loginWithWrongCredentials(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[username]' => 'admin',
            'LoginForm[password]' => 'wrong',
        ]);
        $I->expectTo('see validations errors');
        $I->see('Incorrect username or password.');
    }
    //Если зашли под пользователем, то видем logout
    public function loginSuccessfully(\FunctionalTester $I)
    {
        $I->submitForm('#login-form', [
            'LoginForm[username]' => 'admin',
            'LoginForm[password]' => 'admin',
        ]);
        $I->see('Logout (admin)');
        $I->dontSeeElement('form#login-form');              
    }
}