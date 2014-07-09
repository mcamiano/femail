<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script>
$( document ).ready( function() {

$('h2').on('click',function(e) {

  $.getJSON( "getfakemail.php?"+Math.random(), function( data ) {
    $("#mailbox").fadeOut();
    var items = [];
    $.each( data, function( key, val ) {
      items.push( "<li data-id='" + val.id + "'><span class='created_at'><div class='killme'>x</div>" +val.created_at +"</span><pre>"+ (val.mail) + "</pre></li>" );
    });

    $("#mailbox").html( "<ul>"+items.join("")+"</ul>" );
    $("#mailbox").fadeIn();
  });

});

$("h2").trigger("click");

$('body').on('click','.killme',function(e) {
  var parentid=$(e.target).parents('li').data('id');

  $.getJSON( "getfakemail.php?kill="+parentid, function( data ) {
    $("#mailbox").fadeOut();
    var items = [];
    $.each( data, function( key, val ) {
      items.push( "<li data-id='" + val.id + "'><span class='created_at'><div class='killme'>x</div>" +val.created_at +"</span><pre>"+  (val.mail) + "</pre></li>" );
    });

    $("#mailbox").html( "<ul>"+items.join("")+"</ul>" );
    $("#mailbox").fadeIn();
  });
});


});
</script>

<h2>Fake Mailbox</h2>
<div class="wrapper">
<div id="mailbox">
</div>
</div>
<style>
body {
  padding: 1em;
}
h2 {
  margin-bottom: 2em;
}
#mailbox {
  padding: 1em;
  border: solid thin red;
  border-radius: 5px;
  box-shadow: 0px 0px 200px black;
}
.wrapper {
  box-shadow: 0px 0px 200px black;
  border-radius: 5px;
}
.killme {
  border: solid thin red;
  border-radius: 10px;
  height: 1.4em;
  width: 1.4em;
  float: right;
  display: block;
  text-align: center;
}
ul li {
  list-style-type: none;
  padding: 1em;
  margin-left: 1em;
  border: solid thin black;
  border-radius: 5px;
  box-shadow: 0px 0px 20px black;
}

ul li span:first-child {
  border: solid thick black;
  background: white;
  position: relative;
  top: -1.5em;
  padding: 1em;
  border-radius: 5px;
  border-top: none;
  border-bottom: none;
}

</style>
