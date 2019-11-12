var express = require('express');
var app = express();
var bodyParser = require('body-parser');
var mysql = require('mysql');

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));
// default route
app.get('/', function (req, res) {
    return res.send({
        error: true,
        message: 'hello'
    })
});
// set port
app.listen(3000, function () {
    console.log('Node app is running on port 3000');
});
module.exports = app;

// connection configurations
var dbConn = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'bde_local'
});
// connect to database
dbConn.connect();

// Retrieve all utilisateurs 
app.get('/utilisateurs', function (req, res) {
    dbConn.query('SELECT * FROM utilisateurs', function (error, results, fields) {
        if (error) throw error;
        return res.send({
            error: false,
            data: results,
            message: 'users list  from loocal database (Nanterre).'
        });
    });
});

// Retrieve user with id 
app.get('/utilisateurs/:id', function (req, res) {
    let user_id = req.params.id;
    if (!user_id) {
        return res.status(400).send({
            error: true,
            message: 'Please provide user_id'
        });
    }
    dbConn.query('SELECT * FROM utilisateurs where id=?', user_id, function (error, results, fields) {
        if (error) throw error;
        return res.send({
            error: false,
            data: results[0],
            message: 'users list from local database (Nanterre) with wanted ID.'
        });
    });
});

// Add a new user  
app.post('/utilisateurs', function (req, res) {
    let user = req.body.user;
    if (!user) {
        return res.status(400).send({
            error: true,
            message: 'Please provide user'
        });
    }
    dbConn.query("INSERT INTO utilisateurs SET ? ", {
        user: user
    }, function (error, results, fields) {
        if (error) throw error;
        return res.send({
            error: false,
            data: results,
            message: 'New user has been created successfully.'
        });
    });
});

//  Update user with id
app.put('/utilisateurs', function (req, res) {
    let user_id = req.body.user_id;
    let user = req.body.user;
    if (!user_id || !user) {
        return res.status(400).send({
            error: user,
            message: 'Please provide user and user_id'
        });
    }
    dbConn.query("UPDATE utilisateurs SET user = ? WHERE id = ?", [user, user_id], function (error, results, fields) {
        if (error) throw error;
        return res.send({
            error: false,
            data: results,
            message: 'user has been updated successfully.'
        });
    });
});

//  Delete user
app.delete('/user', function (req, res) {
    let user_id = req.body.user_id;
    if (!user_id) {
        return res.status(400).send({
            error: true,
            message: 'Please provide user_id'
        });
    }
    dbConn.query('DELETE FROM utilisateurs WHERE id = ?', [user_id], function (error, results, fields) {
        if (error) throw error;
        return res.send({
            error: false,
            data: results,
            message: 'User has been updated successfully.'
        });
    });
});