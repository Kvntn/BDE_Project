//Imports
var asl     = require('async');
var md5     = require('md5');
var sql     = require('mysql');
var jwt     = require('../jwt.utils');

var con = sql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "testapi"
});
let exist = true;

module.exports = {

    test: (req, res) => {
        con.query("SELECT * FROM listeproduits", (err, result, fields) => {
            if (err) throw err;
            res.status(400).send(result);
        });
    },
    add: (req, res) => {

        var name = req.body.name;
        var desc = req.body.desc;
        var prix = req.body.prix;
        var img = req.body.img;
        var cat = req.body.cat;


        con.query("SELECT NomProduit FROM listeproduits WHERE NomProduit = '" + name + "'", (err, result, fields) => {
            if (err) throw err;
            console.log(result.length);
            if (result.length != 0)
                return res.end('Product already exists');
            else {
                var query = "INSERT INTO listeproduits(NomProduit, Description, Prix, Photo, Categorie) VALUES (?, ?, ?, ?, ?)";
                var inserts = [name, desc, prix, img, cat];
                con.query(query, inserts, (err, result) => {
                    if (err) throw err;
                    res.status(200).json({"product": result.insertId});
                });
            }
        })


    },

    get: (req, res) => {
        con.query("SELECT * FROM listeproduits", (err, result, fields) => {
            if (err) throw err;
            console.log(result.length);
            if (result.length != 0)
                return res.status(200).send(result);
            else
                return res.status(404).send("No products found");
        });

    },
};
