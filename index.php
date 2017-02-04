<html><head>
<script src="./node_modules/jquery/dist/jquery.js"></script>
<script src="./node_modules/underscore/underscore.js"></script>
<script src="./node_modules/backbone/backbone.js"></script>
<script src="./node_modules/backbone-forms/distribution/backbone-forms.js"></script>
  </head>
  <body>
    <div id="container">
      <div id="preview">

      </div>
      <div id="editor">
      </div>
    </div>
  </body>
  <script type="x-template" id="ccast">
    <?php include('templates/ccast.jst');?>
  </script>
  <script type="x-template" id="header">
    <?php include('templates/header.jst');?>
  </script>
  <script>
    // returns the render function for a template
    function loadTemplate(name){
      template = $("#"+name).html()
      return _.template(template);
    }
    var Header = Backbone.Model.extend({
        schema: {
        title:      'Text',
        textArea1:  'Text',
        textArea2:  'Text',
        image:      'Text'
        }
    });

    var header = new Header({
      title: "Title",
        textArea1:  'Text Area 1',
        textArea2:  'Text Area 2',
        image:      'http://placehold.it/192x108'
    });

    var form = new Backbone.Form({
        model: header
    }).render();

    $('#editor').append(form.el);
    headerRender = loadTemplate('header');
    $('#preview').append(headerRender(header.attributes));
  </script>
</html>
