  jQuery('.vt_upload_button').click(function(e) {
      e.preventDefault();
      var frame, image_data;
      if ( undefined !== frame ) {

          file_frame.open();
          return;

      }

      frame = wp.media.frames.frame = wp.media({
          multiple: true, // True or false
          title: 'Select PDF files',
          library: {
              type: [ 'application/pdf']
        },
          button: {
              text: 'Upload PDF\'s'
          },
      });
      
      // Pre Selected 
      // get ids from html <input type="hidden" val="1,2,3,4,5" class="vt-hidden-attachments"> 
      
      frame.on('open', function(){
        var selection = frame.state().get('selection');
        var preSelectedIds = jQuery('.vt-hidden-attachments').val().split(',');
        if(preSelectedIds.length > 0) {
        preSelectedIds.forEach(function(id) {
            attachment = wp.media.attachment(id);
            attachment.fetch();
            selection.add(attachment ? [attachment] : []);
          });
        }
      });

      frame.on('select', function() {
          var attachments = file_frame.state().get('selection').toJSON();
          console.log(attachments);
      });

      frame.open();
  });
