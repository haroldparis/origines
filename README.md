Origines WordPress Theme
========================

Version: 0.9 Pre-release ! Woohoo !

Author: Harold Paris

Twitter: @haroldparis

Theme URI: http://www.tribeleadr.com/solutions/origines-theme-wordpress-bootstrap/ (French)

Author URI: http://www.tribeleadr.com/

GitHub URI: https://github.com/haroldparis/origines

Demo: http://www.trbldr.fr/origines/

WordPress Theme Package : http://bit.ly/origineswpzip

Translations:
- en_EN
- fr_FR

Works well with:
- SEO by Yoast

Based upon :
- Bootstrap v2.3.0
- HTML5 Shiv v3.6.2pre
- Twitter Bootstrap Hover Dropdown

Tags : light, white, one-column, two-columns, right-sidebar, flexible-width, 
responsive, featured-images, full-width-template, left-sidebar-template, 
portfolio-template, custom-post-type, bootstrap, translation-ready

Description:
------------

Origines is a WordPress Theme developed with Twitter Bootstrap framework.

Origines is set to become a framework for developing child themes.
It works well as it is, but you may need a little bit of styling to add
the perfect touch to your site.

If you like it, feel free to give me a shout on twitter !

Want to participate and help me make it the best WordPress+Bootstrap theme?
Source code is available on Github ! https://github.com/haroldparis/origines

Use Origines:
-------------

Origines is in pre-release. You may use it for production, but there is still a 
way to go to optimize the code and add more features. I think it's cool enough to 
be tested and used and I believe it shows some potential.

### Add your own logos (or other graphics):

All the themes images (icons, favicons, official logo, etc) are available in /origines/img/.
You can modify them. 

If you want to display your logo (max 30px height) in the top
navigation bar in replacement of your WordPress title, you can register it in the
header.php template (line 59) using the origines_logo function. 
Your logo must be placed in /origines/img/ (via FTP or prior to
uploading the theme)

### Widgets:

Origines is fully widgetized. You've got:
- Hero: for displaying a Hero unit or whatever you want on the front page just on top
of the articles. Use it and add a text widget as an example. If it's not used, you will 
have a header by default showing your blog title and blog description.
- Sidebar: well... the sidebar.
- 4 footers: from left to right. If you use 1, 2 or only 3 of them, they will 
automatically adjust in width to the content... which I think is cool. ^^
- 2 menus: available in the Appearance > Menus. Only the header one is used for the
moment, but I plan to add a second one in the footer for SEO purpose for large sites
in a clic-to-show box.

If you want to use the Hero widget to display a... Hero unit. Here is an example 
of the code you will have to put in a text widget:

	<div id="hero" class="hero-unit">
		<h1>Heading</h1>
		<p>Tagline</p>
		<p><a class="btn btn-primary btn-large">Learn more</a></p>
	</div><!-- #hero -->

### Templates:

- By default: The classic template is content + sidebar.
- Left Sidebar: Just the opposite which is sidebar + content.
- Full-width: Does not show the sidebar. Nice for pages.
- Portfolio: This page show the "Projects" available in the custom post category "Portfolio".
The presentation is a lot more graphic focusing on thumbnails and showing two buttons at the
bottom.
- Front-page: This page is whatever you want it to be, but you will have to code it. This
template doesn't show a title or a sidebar for the page. Nice to use for front-page styling.

### Using a Page as a Front-page:

- Create a page, style it and give it a name. 
- Make sure you use the Front-page template.
- In the wordpress options (reading option), you can chose this page as your Front-page !

### Using the Portfolio:

- Create a few "Projects" in the custom post category (don't forget to add thumbnails). You
have access to a custom meta box allowing you to add the preview URL (it can be the website of
your client as an example) and the portfolio page URL (the page on which you will list your
projects)
- Create a page using the "Portfolio 3 Columns" template, do not add content. This page will
diplay the projects available in the custom post category.

### Google Analytics:

Google Analytics code can be found directly in the function.php file. 

In order to configure it, you need to update the $propertyID variable "UA-XXX" with your 
GA Property ID.

### Feedbacks needed:

Well, I think that's it for using Origines ! Have fun !

And by the way, if you test Origines and have any comments or feedbacks to give, feel
free to do so right here : https://github.com/haroldparis/origines/issues
(Or if you prefer, give me a shout on Twitter: @haroldparis)

What may interest you:
----------------------

Ok, so you want to know a little bit more ?

Great! There was a few tricky things with integrating Bootstrap with WordPress. So
let's talk about that.

First, Bootstrap use a specific syntax for breadcrumbs, navigation and media formatting
(which I used for comments). I had to build some walker class for comments and navigation 
as well as a specific function for displaying breadcrumbs correctly.

I'd like to really thank these authors and their nice tutorials available on the web,
cause I would certainly still be struggling with these at the moment if it wasn't for
them:
- Edward McIntyre (@twittem) for his tutorial about Bootstrap navbar and integrating it
inside WordPress, 
- Daniel Roche for his nice tutorial on how to rebuild breadcrumbs which helped me do it 
Bootstrap's style: http://www.seomix.fr/fil-dariane-chemin-navigation/
- bitacre for his nice tutorial here on how to rebuild comments which helped me do it
Bootstrap's style as well using media: http://shinraholdings.com/621/custom-walker-to-extend-the-walker_comment-class/
- And finally, Cameron Spear and Mattia Laurentis for their awesome work on Twitter 
Bootstrap Hover Dropdown which was definitely perfect to adapt the behavior of the
navbar to provide a better user experience: http://cameronspear.com/blog/twitter-bootstrap-dropdown-on-hover-plugin/

So thanks a lot guys !

Where is this project going:
----------------------------

Well, I have learned a lot concerning php and WordPress during this project, which I'm
quite proud of. And I'm really looking forward to keep learning some more to be able to
release a nice framework.

Here are the next steps I will dive into:
- Adding the footer click-to-show menu
- Testing support and "works well with" Digg Digg and Contact Form 7 which are
definitely some of my prefered plugins.
- Launching a website to showcase Origines
- Integrating Less support to remove styling from the templates and use it in the CSS

What do you think about this? Any other thoughts?

Licence:
--------

Copyright &copy; 2013 TRIBELEADR

This file is part of Origines.

Origines is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

Origines is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Origines.  If not, see http://www.gnu.org/licenses/.
