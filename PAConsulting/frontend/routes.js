module.exports  = function(app){
    const getUsers = function() {
        return new Promise(resolve => {
          setTimeout(() => {
            resolve([
                {"name":"Jo","id":"0001"},
                {"name":"Sue","id":"0002"},
                {"name":"Jim","id":"0003"},
                {"name":"Sam","id":"0004"},
                {"name":"Jan","id":"0005"}
            ]);
          }, 5000);
        });
      }

    app.get('/',(req,res)=>{
        res.render('index',{
            title: 'Home Page',
            mainHeading: 'Home Page'
        });
    });
    
    app.get('/users',(req,res)=>{
        
          (async ()=>{
            const users = await getUsers();
            res.render('users',{
                title: 'Users',
                mainHeading: 'Users',
                users: users
            });
            console.log(users);
          })();
          
    });
    
    app.get('/contact',(req,res)=>{
        res.sendFile(__dirname + '/contact.html');
    });
}

