;(function($, document, window){
  'use strict'
  $(document).ready(function() {
  })

  $('.remove_img').on('click', function( event ){
    event.preventDefault()

    var placeholder = $('#mc_placeholder_meta').val()

    $(this).parent().fadeOut('fast', function(){
      $(this).remove()
      $('.mc-current-img').addClass('placeholder').attr('src', placeholder)
    })
    $('#mc_upload_meta, #mc_upload_edit_meta, #mc_meta').val('')
  })
})(window.jQuery, document, window)