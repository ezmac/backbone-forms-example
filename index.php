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

    var HeaderView = Backbone.View.extend({
      template: loadTemplate('header'),
      render : function(){

        this.$el.html(this.template(this.model.attributes));
        return this;    
      },
      initialize: function() {
        this.listenTo(this.model, "change", this.render);
      },

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
    // So at this point, you just need to bind all input elements for "on change" or add a submit button.
    function commit(form){
      form.commit();
      this.preventDefault();

    }
    commitButton = $("<button type='button'>commit</button>");
    commitAction=_.bind(function(){
      this.commit();},
    form);

    commitButton.on("click",commitAction);
    $(form.el).append(commitButton);

    $('#editor').append(form.el);
    headerViewContainer = $('<div>');

    headerView = new HeaderView({
      model: header,
        $el: headerViewContainer
    });
    headerView.render();
    headerViewContainer.append(headerView.$el);
    
    $('#preview').append(headerViewContainer);
  </script>
</html>
