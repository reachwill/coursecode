var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var ObjectId = require('mongodb').ObjectID;

const MongoClient = require('mongodb').MongoClient;
var url = 'mongodb://localhost:27017/nodecourse';
// Use connect method to connect to the Server
MongoClient.connect(url, (err, db) => {
    if (err) return console.log(err)
    console.log("Connected correctly to server");
    db.close();
});



app.use(bodyParser.urlencoded({
    extended: true
}));

app.use(bodyParser.json());


//HAVE TO ADD THIS FOR WHEN WE SEND AJAX REQUEST FROM CLIENT -- DELETE EXAMPLE
app.use(function(req, res, next) {
  res.header("Access-Control-Allow-Origin", "*");
  res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
  next();
});



app.get('/', function(req, res) {
    res.send('Hello World! This is an express app')
})

app.post('/process', function(req, res) {

    MongoClient.connect(url, (err, db) => {
        if (err) return console.log(err)
        console.log("Connected correctly to server");

        db.collection('messages').save(req.body, (err, result) => {
            if (err) return console.log(err)

            console.log('saved to database')
            res.send(JSON.stringify(req.body));
        })
        db.close();
    });
})

app.post('/update', function(req, res) {
    //console.log(req.body)
    var id = ObjectId(req.body.id);
    console.log(id)
    MongoClient.connect(url, (err, db) => {
        if (err) return console.log(err)
        console.log("Connected correctly to server");

        db.collection('messages').update({
            _id : id
        }, {
            $set: {
                message: req.body.message
            }

        }, (err, result) => {
            if (err) return console.log(err)

            console.log('updated in database')
            res.send(JSON.stringify(req.body));
        })
        db.close();
    });
})

app.post('/delete', function(req, res) {
    //console.log(req.body)
    var id = ObjectId(req.body.id);
    console.log(id)
    MongoClient.connect(url, (err, db) => {
        if (err) return console.log(err)
        console.log("Connected correctly to server - ready to delete");
        db.collection('messages').remove( {"_id": id},function(){
          if (err) return console.log(err)
          res.send('deleted');
        });
        db.close();
     });
})


app.post('/messages', function(req, res) {

    MongoClient.connect(url, (err, db) => {
        if (err) return console.log(err)
        console.log("Connected correctly to server");

        //STEP 1  - view docs in console
        // db.collection('messages').find({}, {}, function(e, docs) {
        //   if (err) return console.log(err)
        //   console.log(docs);
        // });

        //STEP 2 - make data useable .toArray()
        db.collection('messages').find().toArray(function(err, results) {
            if (err) return console.log(err)
            console.log(results); // output all records
            res.status(200).send(results);
        });
        db.close();
    });
})





app.listen(3001, function() {
    console.log('Example app listening on port 3001!')
})
