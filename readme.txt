=== WP Customer Feedback ===
Contributors: endual
Tags: user-feedback, customer-feedback, feedback, review, customer, marketing, survey, popup, shortcode
Author URI: http://endual.com
Plugin URI: http://endual.com/wp-customer-feedback
Requires at least: 3.5
Tested up to: 4.2
Stable tag: 1.3.0
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Give users a quick and easy way to provide feedback. Feedback is sent directly to you, away from competitors eyes. Increases leads and conversions.

== Description ==

= Sick of wondering what your visitors are thinking? =

A loyal customer of a small business website can spend thousands of dollars over the course of a few years. Smart business owners spend up big on ads, coupons, and discounts, to get new customers in the door.

= But getting new customers should be just the start =

To keep customers happy and engaged you need to understand them. Do you know:

* How they got to your site?
* What products they want to see?
* What features they think your site needs?
* Is anything holdeing them back from buying more?
* Are there things you could be doing better?

You're always better off knowing more. If you know what's putting people off, you can change it. If you know what people love, you can give them more of it. You need all the customer feedback you can get.

= Savvy people get feedback from their users. =

The problem is that very few people use contact pages to give customer feedback. It’s an additional point of friction - it's just easier for your potential customers to click the back page than to hunt out your contact page.

Opening up comments is better, but not by much. You have to take care of spam, and you can bet competitors will be reading your comments too.

What if you had an easy way to ask users for feedback, at the most point in the sales funnel most valuable to you, and then get the feedback emailed directly to you?

= Getting customer feedback is what WP Customer Feedback is all about =

Hearing your customers’ feedback is awesome, especially for usability issues, prioritizing features and gaining insights into potential new features.

With more insight into your visitor's thinking you can:

* Know what people really think
* Better tailor your content
* Dramatically increase leads and conversions

= Current customization options =

* Panel title and feedback question
* Pop up panel title bar color
* Email request text
* Submit button text
* Delay before panel scrolls into view
* Thankyou text after feedback submitted

= Video walk through =
[Video walk through in Wistia](https://swoon.wistia.com/medias/cj34mg9sbp "WP Customer Feedback walk through video")

Suggestions for improvements are always welcome, and I love to hear suggestions for new plugins.

email: adrian@endual.com
twitter: @endual

== Installation ==

1. Upload the `wp-customer-feedback` folder to your `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Place `[get-feedback]` in your pages or posts.

== Frequently Asked Questions ==

= Short codes =

Short codes are a way to add functionality to a site through simple special text. You can change the colour of the panel, and the delay before the panel is displayed.

= Setting the Title Bar Color =

The Title Bar Color is the visible title in that enters the screen for your user to click. You can set this to whatever color works best with your site. If you want the Title Bar Color red, then you could use the following:

[get-feedback color="red"]

There is support for many named colors on the web. For a full list see here.

<http://css-tricks.com/snippets/css/named-colors-and-hex-equivalents/>

= Setting the Title =

The title is the panel title propting the user to submit feedback. You'll generally set this to the question you want feedback for. Note that there should be a maximum of about 30 characters for the title - but this depends on site fonts and which words you use. To ask for feedback on "What feature would you like to see next?" you would put:

[get-feedback title="What feature would you like to see next?"]

= Setting the Question =

The question is the prompt for user feedback, and appears in the text field until the user starts typing in a response. By default this will be the same as the title, but is customisable. To ask the question "How did you find us?" you would put:

[get-feedback question="How did you find us?"]

= Setting the Email request field =

The default request for an email address is "Your email address?", you can change it here. To use "Enter e-mail address", you would put:

[get-feedback email="Enter e-mail address"]

= Setting the Submit button text =

The Submit button is the button the user presses when submitting feedback. Some people get dramatically different response rates with different button text. You may want to try alternative text. To use "Send", you would put:

[get-feedback submit="Send"]

= Setting the Thankyou message =

The "Thankyou message" is a brief note to display the user on submitting of feedback. The default thankyou message is "Thanks for the feedback!". To use an alternate, say "Great, we'll get straight on this.", you would use:

[get-feedback thankyou="Great, we'll get straight on this."]

= Setting the Delay =

You can set a delay between loading a page, and showing the feeback panel by using the delay setting. To delay the panel by three seconds you would put:

[get-feedback delay="3"]

= Combining settings =

All of the above setting can be combined as you like. To have a blue panel, asking "How did you find us?", which waits 5 seconds before showing up, you would put:

[get-feedback color="blue" title="How did you find us?" delay="5"]

= Why am I seeing the wrong feedback question? =

WP Customer Feedback uses the first request finds for a feedback panel. When you show a list of posts, such as with a blog, WP Customer Feeback will use the first relevant shortcode it finds. Which is considered 'first' depends on how the posts are show, but it is usually the first post created.

== Screenshots ==

1. On page pop-in windows
2. Getting user suggestions
3. Researching user actions

== Changelog ==

= 1.3.0 =
Required WordPress bumped to 3.5 to allow for use of the Color Picker class
Additional parameters added to shortcode:
* question - the feedback question guide text
* email - email address field guide text
* submit - sumbit button text
* thankyou - text displayed on feedback submitted

= 1.2.1 =
Shutdown panel immediately on submit clicked

= 1.2.0 =
Added ability to show with non full page posts
Minor panel responsive design fix
Fixed CSS font variable issue
Updated email header
Stripping slashes from email body
Maintain linebreaks in feedback body

= 1.1.1 =
Fix minor JS class bug from 1.1.0

= 1.1.0 =
Updated readme.txt for WordPress 4.2
Namespaced all CSS
Added close button to panel when visible
Changed cursor to pointer over panel header

= 1.0.2 =
Updated readme.txt to include better shortcode info and added video to readme home tab.

= 1.0.1 =
Updated readme to reflect title parameter

= 1.0.0 =
Added 'title' to a user parameters
Improved panel behaviour during window resize
Additional shortcode instructions added

= 0.1.1 =
Removed footer text
Updated screenshots to reflect UI update
Improved feedback email
Changed image asset location
Bug fixes

= 0.1.0 =
Initial release
