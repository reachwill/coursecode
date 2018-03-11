var express = require('express');
var router = express.Router();

/* GET home page. */
router.get('/', function (req, res, next) {
    res.render('index', {
        title: 'Express'
    });
});

//=================================step 1 of code editing===================
/* GET Hello World page. */
router.get('/helloworld', function (req, res) {
    res.render('helloworld', {
        title: 'Hello, World!'
    })
});
//====restart the server ctrl+c | npm start
//====now open views/index.jade and save as helloworld=========================================================================

//after that its time for mongodb in slides



//==================================step 16===================================
/* GET Userlist page. */
router.get('/userlist', function (req, res) {
    var db = req.db;
    var collection = db.get('usercollection');
    collection.find({}, {}, function (e, docs) {
        res.render('userlist', {
            "userlist": docs
        });
    });
});







module.exports = router;