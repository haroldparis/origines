Origines WordPress Theme
========================

Version: 0.4

Author: Harold Paris

Twitter: @haroldparis

Author URI: http://www.tribeleadr.com/

GitHub URI: https://github.com/haroldparis/origines

Demo: http://www.trbldr.fr/origines/

WordPress Theme Package : https://github.com/haroldparis/origines/archive/master.zip

Based upon :
- Bootstrap v2.3.0
- HTML5 Shiv v3.6.2pre
- Twitter Bootstrap Hover Dropdown

Tags : light, white, one-column, two-columns, right-sidebar, flexible-width, 
responsive, featured-images, full-width-template, left-sidebar-template, 
portfolio-template, custom-post-type, bootstrap 

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

Origines is in pre-release. You may use it for production, but there is still a long 
way to go to optimize the code. I think it's cool enough to be tested and used and to 
show some potential.

Origines is fully widgetized. You've got:
- Hero: for displaying a Hero unit or whatever you want on the front page. Use the
it and add a text widget as an example. If it's not used, you will have a header by
default showing your blog title and blog description.
- Sidebar: well... the sidebar.
- 4 footers: from left to right. If you use 1, 2 or only 3 of them, they will 
automatically adjust in width to the content... which I think is cool. ^^
- 2 menus: available in the Appearance > Menus. Only the header one is used for the
moment, but I plan to add a second one in the footer for SEO purpose for large sites
in a clic-to-show box.

The classic template is content + sidebar, but I've created a full-width template
which doesn't show the sidebar. This can be selected in the model selection in Page's
Attributes.

If you want to use the Hero widget to display a... Hero unit. Here is an example 
of the code you will have to put in a text widget:

	<div id="hero" class="hero-unit">
		<h1>Heading</h1>
		<p>Tagline</p>
		<p><a class="btn btn-primary btn-large">Learn more</a></p>
	</div><!-- #hero -->

Google Analytics code can be found directly in the function.php file. In order to
configure it, you need to update the $propertyID variable "UA-XXX" with your GA Property ID.

And by the way, if you test it and have any comments or feedbacks to give, feel
free to do so right here : https://github.com/haroldparis/origines/issues
(Or if you prefer, give me a shout on Twitter: @haroldparis)

What may interest you:
----------------------

Ok, so you want to know a little bit more ?

Great! There was a few tricky thing with integrating Bootstrap with WordPress. So
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
- Testing support and "works well with" Yoast SEO, Digg Digg and Contact Form 7 which are
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
