=== Netcam / Webcam Live Stream ===
Contributors: blocknot.es
Tags: images,video
Donate link: http://www.blocknot.es/home/me/
Requires at least: 3.5.0
Tested up to: 4.0
Stable tag: 1.0.5
License: GPL3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt

Add a live video stream from a netcam / webcam in posts or pages

== Description ==

This plugin allows to show the live video of a webcam or a netcam.
The image is refreshed with the specified time.
If the refresh time is too low the image could skip.
To get good results it is better to set a refresh time between 1000 and 5000 milliseconds.

A widget is also available.

**Shortcode parameters**

* url (required): webcam URL to a single image of the live stream
* refresh: image reload time in milliseconds (default: 1000)
* width: image width (ex. 100%, 640)
* height: image height (ex. 50%, 480)
* click: enable/disable click event to freeze the current image

**Example**

	[netcam-live url="http://cam6284208.miemasu.net/snapshotJPEG?Resolution=640x480&Quality=Clarity" refresh="2000" width="100%"]

== Installation ==

1. Install the plugin
1. Activate it
1. Edit a post or a page
1. Use the shortcode with the correct image URL: [netcam-live url="..."]

== Frequently Asked Questions ==

= What webcams / netcams are supported? =

Every device that can provide a single image from the live stream.

= How do I find the URL of a live images? =

You can look in the device manual or in the admin section of the webcam / netcam. Otherwise you have to search online or trying to ask to the producer support.

== Screenshots ==

1. Three public netcams in a post

== Upgrade Notice ==

= 1.0.5 =
* Widget created
= 1.0.0 =
* First release

== Changelog ==

= 1.0.5 =
* Widget created
= 1.0.0 =
* First release
