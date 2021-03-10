
var targ = null;
    $('input[type="submit"]').focus(function() {
      targ = $(this).val();
    });

// Attach a submit handler to the form
$( "#form-post" ).submit(function( event ) {

  // Stop form from submitting normally
  event.preventDefault();

  // Get some values from elements on the page:
  var form = $( this ),
      title = form.find("#title").val(),
      tags = form.find("#tags").val(),
      content = tinymce.get("content").getContent(),
      image = $(content).find('img').attr('src'),
      urlLink = form.attr( "action" );

  var publish = 0;
  if(targ == "Save & Publish"){
    publish = 1;
  };

  // Send the data using post
  var posting = $.post(
                        urlLink,
                        {
                          _token: $('meta[name="csrf-token"]').attr('content'),
                          title:title,
                          tags:tags,
                          publish:publish,
                          content:content,
                          image:image
                        });

  // Put the results in a div
  posting.done(function(data) {
              var message = $(data).find('#messuc');
              $('.content').before(message);
              $('.form-control').val('');
              tinymce.get("content").setContent('');
              $('#title').focus();
          })
         .fail(function(data) {
              /*$.each(data, function(i,val){
                alert(val);
              });*/
              var err = $("<span class='invalid-feedback' role='alert'><strong></strong></span>");
              $('input[name]').removeClass('is-invalid');
              $('.form-group span').remove();
              $('.form-group').append(err);
              if (data.responseJSON.errors.title) {
                $('input[name="title"]').addClass('is-invalid');
                $('.title-div strong').text(data.responseJSON.errors.title);
              }
              if (data.responseJSON.errors.tags) {
                $('input[name="tags"]').addClass('is-invalid');
                $('.tags-div strong').text(data.responseJSON.errors.tags);
              }
              if (data.responseJSON.errors.content) {
                $('input[name="content"]').addClass('is-invalid');
                $('.content-div strong').text(data.responseJSON.errors.content);
              }
          });
  });
