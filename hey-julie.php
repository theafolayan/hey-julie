<?php
/**
 * @package Hey_Julie
 * @version 1.0.0
 */
/*
Plugin Name: Hey Julie
Plugin URI: https://github.com/opensaucedeveloper/hey-julie
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of a Kyle or Lil Yatchy Fan summed up in two words sung most famously by Kyle Featuring Lil Yatchy: Hey Julie. When activated you will randomly see a lyric from <cite>Hey, Julie</cite> in the upper right of your admin screen on every page. This Plugin was modelled after the Famous<cite> Hello, Dolly</cite> Plugin.
Author: Afolayan Raphael Oluwaseun
Version: 1.0.0
Author URI: http://opensaucedeveloper.com
*/

function hey_julie_get_lyric() {
	/** These are the lyrics to Hey Julie */
	$lyrics = "Hey, Julie
Hey Julie, heard you got that wet, wet, wet
Something for my neck, neck, neck
Hey Julie, heard you got that drip, got that drip
Something for my wrist, for my wrist
Hey Julie
Ooh, hey Julie
Hey Julie (Yeah), heard you got that drip, drip, drip, drip
Yeah, something for my wrist, wrist, wrist, wrist
Paparazzi sound like flick, flick, flick, flick (Flick flick, flick flick)
Nikon, I'm an Icon like Will Smith kid, yeah
Me and Yachty, that's a layup
My old life, hasta luego
Woah, I told Spanish mami, vete aqui, (woah) woah
Yeah, gold in my mouth, I don't talk cheap (No) no
Yeah, these bitches used to make fun of my teeth (Woo)
Now they crusty, AC busted, house 100 degrees, ha
Yo, that's fucked up, but oh well, she's an asshole
Told her no sweat, she can chill in my castle
This shit was so fire, Yachty had to run it back though
'Bout to write a chain off on my tax though
Hey Julie, heard you got that wet, wet, wet
Something for my neck, neck, neck
Hey Julie, heard you got that drip, got that drip
Something for my wrist, for my wrist
Hey Julie
Ooh, hey Julie
Hey Julie
Ooh, hey Julie
I got it, I got it, I got it
Hey Julie, how I act a fool with the jewelry
Ayy, I can read your mind like a story
Julie, why you gotta lie, gotta lie? (Don't lie)
Your little brother think I am so fly
Hey Julie (Yeah), I used to rap about the toolie, that's old me (Yeah)
Now I gotta go and see my jeweler, an oldie (Yeah)
Playing Sega Genesis like now I put in OT
Ayy (Wait), do you get it, O.T. Genasis (Yeah)
All these happy raps, SuperDuperBoat invented this (Yeah)
Ayy, I know that you hate this (Yeah)
I'm fucking on your mistress (Yeah)
Eat her like a biscuit (Yeah)
Tick, tick, tick, but my rollie don't tock
Young smart black nigga, finna buy some stock
Hey Julie, heard you got that wet, wet, wet
Something for my neck, neck, neck
Hey Julie, heard you got that drip, got that drip
Something for my wrist, for my wrist
Hey Julie
Ooh, hey Julie
Hey Julie
Ooh, hey Julie";

	// Here we split it into lines.
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line.
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later.
function hey_julie() {
	$chosen = hey_julie_get_lyric();
	$lang   = '';
	if ( 'en_' !== substr( get_user_locale(), 0, 3 ) ) {
		$lang = ' lang="en"';
	}

	printf(
		'<p id="julie"><span class="screen-reader-text">%s </span><span dir="ltr"%s>%s</span></p>',
		__( 'Quote from Hey, Julie song, by Lil Yatchy:' ),
		$lang,
		$chosen
	);
}

// Now we set that function up to execute when the admin_notices action is called.
add_action( 'admin_notices', 'hey_julie' );

// We need some CSS to position the paragraph.
function julie_css() {
	echo "
	<style type='text/css'>
	#julie {
		float: right;
		padding: 5px 10px;
		margin: 0;
		font-size: 12px;
		line-height: 1.6666;
	}
	.rtl #julie {
		float: left;
	}
	.block-editor-page #dolly {
		display: none;
	}
	@media screen and (max-width: 782px) {
		#julie,
		.rtl #julie {
			float: none;
			padding-left: 0;
			padding-right: 0;
		}
	}
	</style>
	";
}

add_action( 'admin_head', 'julie_css' );
