=== Email No Bot - Prevent bots from detecting emails ===
Contributors: giuse
Donate link: buymeacoffee.com/josem
Tags: spam email, email encryption, no bot, spam protection, email obfuscation
Requires at least: 4.6
Tested up to: 6.5
Stable tag: 0.0.2
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html



Humans will see the email address on your page, but robots will not.


== Description ==

With Email No Bot humans will see the emails that you write using the <a href="https://codex.wordpress.org/Shortcode">shortcode</a> [hide_email email="example@mail.com"], but robots will not.

The user will not be able to copy the email in the clipboard. If you think this is a problem, this plugin is not for you.

Looking at the screen you can see the email, but if you inspect elements, instead of the email you will see something strange, and not predictable. That's what a bot will also see.

The output is something very random for the bot, and even if the code of this plugin is open source, no bot will be able to decrypt the email.

There are amazing plugins for contact forms, but sometimes what you really need is just an email that people can use to contact you.
Contact forms are so popular because a bot will not be able to get your email, but if you have a way to prevent bots from getting your email, you can simply add it to your page without the need of a contact form. Your page will be lighter and simple.

Email No Bot has no settings page, it doesn't write anything in the database, and it doesn't load any asset on frontend, it just provides a shortcode, that's it.



== How to encrypt an email with Email No Bot ==
To encrypt an email use the shortcode <strong>[hide_email email="example@mail.com"]</strong>.
Of course, replace example@mail.com with the email that you want to display.
You can see an example and see how it works on the blog post <a href="https://josemortellaro.com/prevent-bots-from-getting-emails-from-your-website/">Prevent bots from getting emais from your website</a>.


== Main features of Email No Bot ==
It obfuscate emails with 52 lines of code! The entire zip is less than 3 kB. No complicated settings, no database queries, no assets, nothing else than a shortcode. You will have no spam at zero cost in terms of performance. The weight of this plugin similar to the weight of <a href="https://wordpress.org/plugins/hello-dolly/">Hello Dolly</a>.
You can see here the <a href="https://plugintests.com/plugins/wporg/email-no-bot/latest">consumption of Email No Bot</a>. As you will see it's not measurable.


== Limitations of Email No Bot ==
The user will not be able to copy the email in the clipboard. But this is also what makes this plugin so powerful against spam bots.



== Similar plugin to hide links ==
If you need something similar to hide links, you can try <a href="https://wordpress.org/plugins/hide-link/">Hide Link</a>



== Changelog ==

= 0.0.2 =
*Added: action link in the plugins page to show the shortcode


= 0.0.1 =
*Initial release of <a href="https://wordpress.org/plugins/email-no-bot/">Email No Bot</a>
