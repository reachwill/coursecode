$(document).ready(function(){
  console.log('Ready in the browser');

  $('body').on('click','.user',function(){
    console.log($(this).data('name'));
    
  })
});
