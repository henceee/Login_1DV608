<?php


class LayoutView
{
    private static $cookieName = 'LoginView::CookieName';

  public function render(LoginView $loginView, DateTimeView $dateTimeView) {
    echo '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>Assignment 2</h1>
          ' . $this->renderIsLoggedIn($this->isLoggedIn()) . '
          
          <div class="container">
              ' . $loginView->response($this->isLoggedIn()) . '
              
              ' . $dateTimeView->show() . '
          </div>
         </body>
      </html>
    ';
  }
  /**
  * Generate HTML code depending on login-status
  * @param bool $isLoggedIn
  * @return  void
  */
  private function renderIsLoggedIn($isLoggedIn)
  {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  private function isLoggedIn()
  {
    return isset($_SESSION['user']);      
  }
}
