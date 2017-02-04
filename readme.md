# An example of using backbone and forms to separate content from template

This project is quick and dirty.  I'm using php to include files.  Sorry, but php is just fine for this.

Templates are defined in "jst" files.  They're just underscore templates, so JST is JavaScript Templates.  You can switch out to mustache or whatever.  That wasn't the point of this exercise.

Still to do:
 - render the outer "layout"
 - define structure of "document" as a json object.
 - find some way to bind editor and rendered template so that editors are draggable to reorder the document.  All this will prevent the need for injecting special html into the editor portion.
 - abstract the loading of templates and models.

the end goal with these templates is to have the templates be updatable and the content serialized so that you can store the content and update the templates without having to rebuild everything.  There's still a lot of work that needs to go in, binding editors like ckeditor onto the backbone forms, figuring out where the schema will be stored WRT template, because they should live together, etc.

Over all, I think there's less than an hour put into this, so don't consider it polished or even clean.  


to use:
`npm install`
`php -S localhost:8000`



