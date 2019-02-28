(function($) {
  $('#new-quote').on('click', function(event) {
    event.preventDefault();
    // $('.entry-header').empty();
    $.ajax({
      method: 'GET',
      url:
        red_vars.rest_url +
        'wp/v2/posts?filter[orderby]=rand&filter[posts_per_page]=1',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('X-WP-Nonce', red_vars.wpapi_nonce);
      }
    }).done(function(response) {
      console.log(response);
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
      } else {
        return false;
      }
    });
  });
})(jQuery);
