self.addEventListener('message',function(e){
    for(var i=0;i<10000;i++){
        //$('#process').html(i);
        console.log(i)
    }
});