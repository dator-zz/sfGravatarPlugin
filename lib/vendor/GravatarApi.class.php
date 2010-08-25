<?php

/**
* Simple wrapper to the gravatar API
* http://en.gravatar.com/site/implement/url
* 
* Usage:
* 
* $gravatar = new GravatarApi();
* $gravatar->get($email, $size, $rating, $default);
*
* @author Thibault Duplessis <thibault.duplessis@gmail.com>
* @author Henrik Bjørnskov <henrik@bearwoods.dk>
* @author Clément JOBEILI <clement.jobeili@gmail.com>
*/
class GravatarApi
{
  /**
  * @var array $default array of default options that can be overriden with getters and in the construct.
  */
  protected $defaults = array(
    'size' => 80,
    'rating' => 'g',
    'default' => '',
  );
  
  /**
  * Constructor
  *
  * @param array $options the array is merged with the defaults.
  * @return void
  */
  public function __construct(array $options = array())
  {
    $this->defaults = array_merge($this->defaults, $options);
  }
  
  /**
  * Returns a url for a gravatar.
  *
  * @param string $email
  * @param integer $size
  * @param string $rating
  * @param string $default
  * @return string
  */
  public function get($email, $size = null, $rating = null, $default = null)
  {
    $hash = md5(strtolower($email));
    
    $map = array(
        's' => $size ? $size : $this->defaults['size'],
        'r' => $rating ? $rating : $this->defaults['rating'],
        'd' => $default ? $default : $this->defaults['default'],
    );
    
    return 'http://www.gravatar.com/avatar/' . $hash . '?' . http_build_query(array_filter($map));
  }
  
  /**
   * Returns true or false if the email has a gravatar
   *
   * @param string $email 
   * @return boolean
   * @todo Slow 
   */
  public function has($email)
  {
    $url = $this->get($email, null, null, 404);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    if(curl_exec($ch) !== false){
        return true;
    }else{
      return false;  
    }
  } 
}