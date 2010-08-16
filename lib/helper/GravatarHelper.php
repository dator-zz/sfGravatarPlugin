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
  $options = array(
    'rating'  => $rating,
    'size'    => $size,
    'default' => $default
  );
  
  return image_tag(sfGravatarApi::getUrl($email, $options),
     array(
       'alt'    => $alt_text,
       'width'  => $size,
       'height' => $size,
       'class'  => 'gravatar_photo'
     ));
}

function gravatar_image($email, $size = 80, $rating = null, $default = '')
{
  $options = array(
    'rating'  => $rating,
    'size'    => $size,
    'default' => $default
  );
  return sfGravatarApi::getUrl($email, $options);
}