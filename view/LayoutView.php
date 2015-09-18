<?php

namespace view;

class LayoutView {
  
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
              ' . $loginView->response() . '
              
              ' . $dateTimeView->show() . '
          </div>
         </body>
      </html>
    ';
  }
  
  private function renderIsLoggedIn($isLoggedIn) {
    if ($isLoggedIn) {
      return '<h2>Logged in</h2>';
    }
    else {
      return '<h2>Not logged in</h2>';
    }
  }

  private function isLoggedIn()
  {
    //TODO : Implement function
    throw new Exception ("The function ".__Function__." in the class ".get_class($this)." is not implemented yet.");
  }
}
