<?php
/*
Plugin Name: Email No Bot
Description: Humans will see the email addresses that you write on your website, but robots will not.
Author: Jose Mortellaro
Author URI: https://josemortellaro.com/
Domain Path: /languages/
Text Domain: email-no-bot
Version: 0.0.2
*/
/*  This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/
defined( 'ABSPATH' ) || exit; // Exit if accessed directly

//Definitions

$a_z = 'abcdefghijklmnopqrstuvwxyz';
define( 'ENCRYPT_EMAIL_ID',$a_z[intval( rand( 0,25 ) )].substr( uniqid(),0,intval( rand( 3,6 ) ) ) );
define( 'ENCRYPT_EMAIL_ID_PRE',$a_z[intval( rand( 0,25 ) )].$a_z[rand( 0,25 )] );
define( 'ENCRYPT_EMAIL_ID_DUMMY',$a_z[intval( rand( 0,25 ) )].substr( uniqid(),0,intval( rand( 3,6 ) ) ) );

//Add shortcodes
add_shortcode( 'hide_email','eos_encrypt_email' );
add_shortcode( 'hide_mail','eos_encrypt_email' );
add_shortcode( 'encrypt_email','eos_encrypt_email' );
add_shortcode( 'encrypt_mail','eos_encrypt_email' );

//Shortcode callback
function eos_encrypt_email( $atts,$content = null ){
 if( !isset( $atts['email'] ) && ( null === $content ) ) return;
 $email = isset( $atts['email'] ) ? sanitize_email( $atts['email'] ) : sanitize_email( $content );
 $new_email = '<span class="'.ENCRYPT_EMAIL_ID_PRE.ENCRYPT_EMAIL_ID.ENCRYPT_EMAIL_ID_PRE.'">';
 $styleA = $lA = array();
 $style = '<style>';
 $style .= '.'.ENCRYPT_EMAIL_ID_PRE.ENCRYPT_EMAIL_ID.ENCRYPT_EMAIL_ID_PRE.' span span{position:absolute;top:-'.( 9000 + absint( rand( 0,5000 ) ) ).'px}.'.ENCRYPT_EMAIL_ID_PRE.ENCRYPT_EMAIL_ID.ENCRYPT_EMAIL_ID_PRE.' .'.ENCRYPT_EMAIL_ID.'{position:static}.'.ENCRYPT_EMAIL_ID.':after{content:"@"}.'.ENCRYPT_EMAIL_ID.ENCRYPT_EMAIL_ID.':after{content:"."}';
 foreach( str_split( $email ) as $l ){
  if( '@' !== $l && '.' !== $l ){
    $s = array( '{position:absolute;top:-'.( 9000 + absint( rand( 0,5000 ) ) ).'px}','{top:-'.( 9000 + absint( rand( 0,5000 ) ) ).'px;position:absolute}' );
    $new_email .= '<span class="a'.esc_attr( $l ).ENCRYPT_EMAIL_ID.'"></span>';
    if( !in_array( $l,$lA ) ){
      $styleA[] = '.'.$l.ENCRYPT_EMAIL_ID.$s[absint( rand( 0,1 ) )];
      $styleA[] = '.a'.esc_attr( $l ).ENCRYPT_EMAIL_ID.':after{content:"'.esc_attr( $l ).'"}';
    }
  }
  elseif( '.' === $l ){
    $new_email .= '<span class="'.ENCRYPT_EMAIL_ID.ENCRYPT_EMAIL_ID.'"><span>'.ENCRYPT_EMAIL_ID.'</span></span>';
  }
  else{
    $new_email .= '<span class="'.ENCRYPT_EMAIL_ID.'"><span>'.ENCRYPT_EMAIL_ID.'</span></span>';
  }
  $lA[] = $l;
 }
 $N = absint( rand( 0,6 ) );
 for( $n = 0;$n < $N;++$n ){
   $styleA[] = '.'.$a_z[rand( 0,25 )].ENCRYPT_EMAIL_ID_DUMMY.':after{content:"'.$a_z[rand( 0,25 )].'"}';
 }
 shuffle( $styleA );
 $style .= implode( '',$styleA ).'</style>';
 $new_email .= '</span>';
 return $style.$new_email;
}

//Settings link in the plugins page
add_filter( "plugin_action_links_email-no-bot/email-no-bot.php",function( $links ){
  global $current_user;
  $email = $current_user && is_object( $current_user ) && isset( $current_user->user_email ) ? $current_user->user_email : 'example@email.com';
  $settings_link = '<a id="encrypt-email-setts" href="#">'. esc_html__( 'Settings','encrypt-email' ). '</a>';
  $settings_link .= '<script>document.getElementById("encrypt-email-setts").addEventListener("click",function(){prompt(\''.esc_js( __( "Use the following shortcode instead of the email. That's it.","encrypt-email" ) ).'\',\'[hide_email email="'.esc_js( esc_attr( sanitize_email( $email ) ) ).'"]\''.');return false;});</script>';
  array_push( $links, $settings_link );
  return $links;
} );
