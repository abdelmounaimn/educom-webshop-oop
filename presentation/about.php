<?php
function showAboutBody()
{
  $user = get_logged_user();
  $return_str = '<h1>About</h1>';

  foreach ($user as $key => $element) {
    if($key!='wachtwoord')$return_str = $return_str . '<div class="gegevensElement">
    <div class="elementBlock">' .  $key . '</div>
    <div class="elementBlock">' .  $element . '</div>
    </div>';
  }
  $return_str = div(class: 'about', content:$return_str) ;

  return   $return_str;
}
