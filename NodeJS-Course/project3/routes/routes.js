module.exports = function(app){
    
    app.get('/', function(req, res) {
        res.render(
            'index', {
                title: 'Hey Hey Hey!',
                message: 'Yo Yo'
            })
    })
    
    app.get('/users', function(req, res) {
    
        var results = [{
            "name": "Jo",
            "things": [21,22,23]
        }, {
            "name": "Jo",
            "things": [21,22,23]
        }, {
            "name": "Jo",
            "things": [21,22,23]
        }, {
            "name": "Jo",
            "things": [21,22,23]
        }, {
            "name": "Jo",
            "things": [21,22,23]
        }]
    
        res.render(
            'users', {
                title: 'Users',
                message: 'List users',
                results: results
            })
    })
}