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
    'default' => null,
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
   * @todo VERY SLOW (due to get_headers, feel free to fork :))
   */
  public function has($email)
  {
    $headers = get_headers($this->get($email));
    $header = substr($headers[0], 9, 3);
    
    return ($header == '200');
  } 
}