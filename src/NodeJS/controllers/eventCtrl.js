//Imports
var jwt     = require('../jwt.utils');
var models  = require('../models');
var asl     = require('async');
var md5     = require('md5');
var sql     = require('mysql');


var con = sql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "testapi"
});
let exist = true;

module.exports = {

    test: (req, res) => {
        con.connect((err) => {
            if (err) throw err;
            con.query("SELECT * FROM evenements", (err, result, fields) => {
                if (err) throw err;
                res.status(400).send(result);
            });
        });
        con.end();

    },
    add: (req, res) => {

        var name = req.body.name;
        var desc = req.body.desc;
        var prix = req.body.prix;
        var date = req.body.year +"-"+ req.body.month +"-"+ req.body.day;

        con.query("SELECT NomEvenement FROM evenements WHERE NomEvenement = '" + name + "'", (err, result, fields) => {
            if (err) throw err;
            console.log(result.length);
            if (result.length != 0)
                return res.end('Product already exists');
            else {
                var query = "INSERT INTO evenements(NomEvenement, Description, Prix, Date) VALUES (?, ?, ?, ?)";
                var inserts = [name, desc, prix, date];
                con.query(query, inserts, (err, result) => {
                    if (err) throw err;
                    res.status(200).json({"productID": result.insertId});
                });
            }
        })


    },

    get: (req, res) => {
        con.query("SELECT * FROM evenements", (err, result, fields) => {
            if (err) throw err;
            console.log(result.length);
            if (result.length != 0)
                return res.status(200).send(result);
            else
                return res.status(404).send("No products found");
        });

    },
};
