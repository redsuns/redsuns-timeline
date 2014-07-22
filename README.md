#Redsuns Timeline

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
* Data Inicial
* Data Final
* Crédito Mídia
* Nome Alternativo

Note that is need to fill media info (Crédito Mídia / Nome Alternativo) this way stays clear that you must to provide an image or video link.


##Displaying Timeline

In a page content editor just put the shortcode ```[timeline]```. Thats all!

Another way to use is calling the shortcode in a custom page template:
```php
echo do_shortcode('[timeline]');
```

##TODO

* Set all entries and fields to english and create map to translate it

##Author

[Redsuns Tecnologia e Desing][3]

##Contributors

Andre Cardoso - [https://github.com/andrebian][4]


  [1]: timeline.knightlab.com
  [2]: http://knightlab.northwestern.edu/
  [3]: http://redsuns.com.br
  [4]: https://github.com/andrebian