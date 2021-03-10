// Attach a submit handler to the form
$( "#form-comment" ).submit(function( event ) {

  // Stop form from submitting normally
  event.preventDefault();

  // Get some values from elements on the page:
  var form = $( this ),
      name = form.find("#name").val(),
      email = form.find("#email").val(),
      comment = form.find("#comment").val(),
      urlLink = form.attr( "action" ),
      str = $(this).serialize();

  if ( form.find( ".checkbox" ).is( ":checked")){
    var check = 1;
  } else {
    var check = 0;
  }
  // Send the data using post
  var posting = $.post(
                        urlLink,
                        {
                          _token: $('meta[name="csrf-token"]').attr('content'),
                          checkbox:check,
                          name:name,
                          email:email,
                          comment:comment
                        });

  // Put the results in a div
  posting.done(function(data) {
              $('input[name]').removeClass('is-invalid');
              $('.form-label-group span').remove();
              var n = $(data).find(".cmt-nbr").first().text();
              $('.cmt-nbr').text(n);

              var comment = $( data ).find( ".comment-item" ).last();
              $( ".comments" ).append( comment );
              $('.form-control').val('');
          })
         .fail(function(data) {

              var err = $("<span class='invalid-feedback' role='alert'><strong></strong></span>");
              $('input[name]').removeClass('is-invalid');
              $('.form-label-group span').remove();
              $('.form-label-group').append(err);
              if (data.responseJSON.errors.name) {
                $('input[name="name"]').addClass('is-invalid');
                $('.name-div strong').text(data.responseJSON.errors.name);
              }
              if (data.responseJSON.errors.email) {
                $('input[name="email"]').addClass('is-invalid');
                $('.email-div strong').text(data.responseJSON.errors.email);
              }
              if (data.responseJSON.errors.comment) {
                $('input[name="comment"]').addClass('is-invalid');
                $('.comment-div strong').text(data.responseJSON.errors.comment);
              }
          });
  });
