#Redsuns Timeline

[![Latest Stable Version](https://poser.pugx.org/redsuns/redsuns-timeline/v/stable.svg)](https://packagist.org/packages/redsuns/redsuns-timeline) [![Total Downloads](https://poser.pugx.org/redsuns/redsuns-timeline/downloads.svg)](https://packagist.org/packages/redsuns/redsuns-timeline) [![Latest Unstable Version](https://poser.pugx.org/redsuns/redsuns-timeline/v/unstable.svg)](https://packagist.org/packages/redsuns/redsuns-timeline) [![License](https://poser.pugx.org/redsuns/redsuns-timeline/license.svg)](https://packagist.org/packages/redsuns/redsuns-timeline)


----------


Welcome, this is a plugin that provides management for Timeline items. It uses the [TimelineJS][1] from [KnightLab][2] but all maintence of events on timeline are easilly configurable in WordPress admin panel.

##Requeriments

* PHP >5.3
* Wordpress >3.8
* Mysql >5
* **Advanced Custom Fields** (installed and enabled)


##Download and Install

####Composer (Most recommended)

Just type ```json "redsuns/redsuns-timeline" : "dev-master" ``` in your composer.json file.


####Cloning

Just clone this repo at *wp-content/plugins* directory:
```git clone git@github.com:redsuns/redsuns-timeline.git```


####Unzipping

You can donwload this repos as a zip file, unzip it at *wp-content/plugins/* directory and rename it as **redsuns-timeline**.


###Install

Just enter in plugins section in Wordpress Admin, find **Redsuns Timeline** and activate it. You are now ready to enjoy!


##Adding events on timeline

The events are simple WordPress posts. This way add some new events is just like to add a new post. Note that some fields are required.

####Required Fields
* Initial Date
* Final Date
* Media Credit
* Media Alt

Note that is need to fill media info (Crédito Mídia / Nome Alternativo) this way stays clear that you must to provide an image or video link.


##Categories

You can link your timeline posts to one or more category and group timeline preview or show all timeline posts in a single timeline.

In **Timeline** menu item you can find a submenu **Categories** where you can add which category you want. Fill up the name, the slug and description. Now you can link which timeline post you want to one or more category.

##Displaying Timeline

####Showing all timeline events

In a page content editor just put the shortcode ``` [timeline] ```. Thats all!

Another way to use is calling the shortcode in a custom page template: 

```php    
echo do_shortcode('[timeline]');
```

###Showing timeline events by category

In a page content editor just put the shortcode ```[timeline category-slug]```. Thats all!

Another way to use is calling the shortcode in a custom page template:

```php
echo do_shortcode('[timeline category-slug]');
```

Example: ```[timeline carrer]```

##Author

[Redsuns Tecnologia e Desing][3]

##Contributors

Andre Cardoso - [https://github.com/andrebian][4]


  [1]: timeline.knightlab.com
  [2]: http://knightlab.northwestern.edu/
  [3]: http://redsuns.com.br
  [4]: https://github.com/andrebian