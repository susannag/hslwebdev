<?php

/* add new theme features */

function mac_hs_library_form_system_theme_settings_alter(&$form, $form_state) {
	
	$form['site_footer'] = array(
		'#type' => 'fieldset',
		'#title' => t('Site Footer'),
	);
	
	$form['site_footer']['social'] = array(
		'#type' => 'fieldset',
		'#title' => t('Social Media Links'),
	);
	$facebook = theme_get_setting('facebook');
	$form['site_footer']['social']['facebook'] = array(
		'#type' => 'textfield',
		'#title' => t('Facebook'),
		'#default_value' => $facebook,
	);
	$twitter = theme_get_setting('twitter');
	$form['site_footer']['social']['twitter'] = array(
		'#type' => 'textfield',
		'#title' => t('Twitter'),
		'#default_value' => $twitter,
	);
	$instagram = theme_get_setting('instagram');
	$form['site_footer']['social']['instagram'] = array(
		'#type' => 'textfield',
		'#title' => t('Instagram'),
		'#default_value' => $instagram,
	);
	$youtube = theme_get_setting('youtube');
	$form['site_footer']['social']['youtube'] = array(
		'#type' => 'textfield',
		'#title' => t('YouTube'),
		'#default_value' => $youtube,
	);
	/*
	$form['site_footer']['social']['linkedin'] = array(
		'#type' => 'textfield',
		'#title' => t('LinkedIn'),
	);
	*/
	
}