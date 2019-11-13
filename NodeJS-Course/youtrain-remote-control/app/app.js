module.exports = function(app,express){
    app.set('view engine', 'pug');

app.get('/',function(req,res){
  //res.sendFile(__dirname +'/index.html');
  res.render('index',{title:'Remote Control'});
});
app.get('/viewer',function(req,res){
  //res.sendFile(__dirname +'/viewer.html');
  res.render('viewer',{title:'Viewer'});
});



}