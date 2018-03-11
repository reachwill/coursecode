$(document).ready(function() {
    //$.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.mode = 'popup';

    $('.editable').editable({
        url: '/post'
    });

    console.log('Ready in the browser');

    $('body').on('click', '.delete', function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        var message = $(this).closest('.message');
        $.ajax({
          url:'http://localhost:3001/delete/',
          type:'post',
          data:{id:id},
          dataType:'text',
          success:function(data){
            if(data=='deleted'){
              message.remove();
            }
          }
        });
    })
});
