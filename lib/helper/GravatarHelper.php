<?php
/**
 * Displays a gravatar image for a given email
 *
 * @param string  $email            Email of the gravatar
 * @param string  $gravatar_rating  Maximal rating of the gravatar
 * @param integer $gravatar_size    size of the gravatar
 * @param string  $alt_text         Alternative text
 * @return string
 * @see http://site.gravatar.com/site/implement#section_1_1
 * 
 * @author Clément Jobeili <clement.jobeili@gmail.com>
 */
function gravatar_image_tag($email, $size = 80, $rating = 'G', $default = '', $alt_text = 'Avatar')
{
  $gravatar = new GravatarApi();
  
  $avatar = image_tag($gravatar->get($email, $size, $rating, $default),
    array(
      'alt'    => $alt_text,
      'width'  => $size,
      'height' => $size,
      'class'  => 'gravatar_photo'
    ));
     
  return $avatar;
}

/**
 * get the gravatar string for a given email
 *
 * @param string  $email            Email of the gravatar
 * @param string  $gravatar_rating  Maximal rating of the gravatar
 * @param integer $gravatar_size    size of the gravatar
 * @param string  $alt_text         Alternative text
 * @return string
 * @see http://site.gravatar.com/site/implement#section_1_1
 * 
 * @author Clément Jobeili <clement.jobeili@gmail.com>
 */
function gravatar_image($email, $size = 80, $rating = null, $default = '')
{
  $gravatar = new GravatarApi();
  return $gravatar->get($email, $size, $rating, $default);
}

/**
 * if an user has an email, return true , otherwise false
 *
 * @param string  $email            Email of the gravatar
 * @return boolean
 * @see http://site.gravatar.com/site/implement#section_1_1
 * 
 * @author Clément Jobeili <clement.jobeili@gmail.com>
 */
 
function gravatar_has_image($email)
{
  $gravatar = new GravatarApi();
  return $gravatar->has($email);
}