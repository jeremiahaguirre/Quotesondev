(function($) {
  let lastPage = '';
  $(window).on('popstate', function() {
    window.location.replace(lastPage);
  });
  $('#new-quote').on('click', function(event) {
    event.preventDefault();

    //Store the pre-AJAX request URL for back/forward nav
    lastPage = document.URL;

    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    }).done(function(response) {
      $('.entry-header').html(response[0].content.rendered);
      $('.entry-title').html(
        `<h2 class="entry-title">&#8211; ${response[0].title.rendered}</h2>`
      );
      if (
        response[0]._qod_quote_source.length > 0 &&
        response[0]._qod_quote_source_url.length > 0
      ) {
        $('.source').html(
          `<a href="${response[0]._qod_quote_source_url}">${
            response[0]._qod_quote_source
          }</a>`
        );
      } else if (
        response[0]._qod_quote_source.length > 0 &&
        response[0]._qod_quote_source_url.length === 0
      ) {
        $('.source').html(response[0]._qod_quote_source);
      }

      const url = red_vars.home_url + '/' + response[0].slug;
      history.pushState(null, null, url);
    });
  });

  $('#form').on('submit', function(event) {
    event.preventDefault();

    const info = {
      title: $('#author').val(),
      content: $('#quote').val(),
      _qod_quote_source: $('#source').val(),
      _qod_quote_source_url: $('#url').val()
    };

    $.ajax({
      method: 'post',
      url: red_vars.rest_url + 'wp/v2/posts/',
      data: info,
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    })
      .done(function() {
        console.log('success');
        $('#form').slideUp('slow', function() {
          $('#submit').html('Your form has been submitted');
        });
      })
      .fail(function() {
        alert('There was an error');
      });
  });
})(jQuery);
