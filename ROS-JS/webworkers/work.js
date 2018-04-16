self.addEventListener('message',function(){
    for(var i=0 ; i < 10000 ; i++){
        console.log(i);
    }
});