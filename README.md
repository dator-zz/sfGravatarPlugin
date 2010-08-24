Installation
============

1. Add this plugin to your project as Git submodules:

          $ git submodule add git://github.com/dator/sfGravatarPlugin.git plugins/sfGravatarPlugin


  2. Add this plugin to your ProjectConfiguration file:

          // config/ProjectConfiguration.class.php
          public function setup()
          {
              $this->enablePlugins(array(
                  // ...
                  'sfGravatarPlugin',
                  // ...
              ));
          }
          
  3. Enable the helper in your settings.yml file

          // apps/frontend/config/settings.yml
          all:
            .settings:
              # ...
              standard_helpers:       [ ... , Gravatar]

Usage
=====

All you have to do is use the helper like this example:

      echo gravatar_image_tag('name@domain.com');

With parameters:

      echo gravatar_image_tag('name@domain.com', 140, 'G', 'Picture avatar');

Or :
      <img src="<?php echo gravatar_image('name@domain.com', 140, 'G'); ?>" />
    
You can check if an email as a gravatar (warning, very slow due to get_headers() php function)

      <?php if(gravatar_has_image('name@domain.com')): ?>  
        <!-- -->
      <?php endif;?>
Available options:
    - size : the size of the avatar (default to 80px)
    - rating : is the type of content in the image (default to G)
    - default_image: the default image (default to null)

For more information, check the gravatar page : http://fr.gravatar.com/site/implement/images/