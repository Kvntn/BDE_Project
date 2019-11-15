//Imports
var asl     = require('async');
var md5     = require('md5');
var sql     = require ('mysql');
var jwt     = require('../jwt.utils');
var token   = require('jsonwebtoken');


const ACCESS_KEY = 'X5IIB4QVYkVjX9hZfGAN52ZAXq4YCWu2C5F97Toc8WrVKtKqsBIyN1K6ZKg3doOx7j6EGQlKGr1vRYtFFO8X9gsrzPBKG1DlKvUdLrMMrp5u8jS32eHbHNMCUUmVUKuBdbFodwBZiM7MfoW0vK7u8C8I9N7JFph1A3nvCXquWBicn4Ad9hc7ZKi9DKkX4UuUg7hczhFoP21bBzrRgKCqRI2xkQCh7yygUaJp6ny4PCGnVh2RJ5286wjdRYRFXiMq';

var con = sql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "bde_local"
});
let exist = true;

// Constants
const EMAIL_REGEX = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const PASSWORD_REGEX = /^(?=.*\d).{4,12}$/;

module.exports = {

    test: (req, res) => { 
        con.query("SELECT * FROM utilisateurs", (err, result) => {
            if (err) throw err;
            res.status(400).json({
                'result': result,
                'token': jwt.genUserToken(result)
            });
        });
    },

    register: (req, res) => {

        var email   = req.body.mail;
        var pw      = req.body.pw;
        var pdp     = req.body.pdp;
        var stat    = req.body.stat;

        if (email == null || pw == null || stat == null) {
            return res.status(400).json({'error': 'missing parameters'});
        }

        if (!EMAIL_REGEX.test(email)) {
            return res.status(400).json({'error': 'email is not valid'});
        }

        if (!PASSWORD_REGEX.test(pw)) {
            return res.status(400).json({
                'error': 'password invalid (must length 4 - 12 and include 1 number at least)'
            });
        }

        con.query("SELECT email FROM utilisateurs WHERE email = ?",[email], (err, result, fields) => {
            if (err) throw err;
            console.log(result.length);
            if (result.length != 0) 
                return res.end('User already exists');
            else{
                con.query("SELECT email FROM utilisateurs WHERE email = ?",[email] , (err, result, fields) => {
                    if (err) throw err;
                    console.log(result + " " + pw);
                    pw = md5(pw);
                    console.log(pw + " " + exist);
                });

                var query = "INSERT INTO utilisateurs(email, motDePasse, statut, PhotoDeProfil ) VALUES (?, ?, ?, ?)";
                var inserts = [email, md5(pw), stat, null];
                con.query(query, inserts, (err, result) => {
                    if (err) throw err;
                    res.status(200).json({
                        'ID': result.insertId
                    });
                });
                var query = "UPDATE utilisateurs SET IDPanier = utilisateurs.IDutilisateur";
                con.query(query, (err, result) => {
                    if (err) throw err;
                    console.log('IDPanier generated');
                });
                var query = "UPDATE panier SET IDutilisateur = (SELECT IDPanier FROM utilisateurs WHERE panier.IDPanier = IDPanier)";
                con.query(query, inserts, (err, result) => {
                    if (err) throw err;
                    console.log('IDPanier generated');
                });
            }
        })
        
        
    },

    get: (req, res) => {
        con.query("SELECT * FROM utilisateurs", (err, result, fields) => {
            if (err) throw err;
            console.log(result.length);
            if (result.length != 0)
                return res.status(200).send(result);
            else
                return res.status(401).send("No user found");
            }
        );
        
    },

    login: (req, res) => {

        var email = req.body.mail;
        var pw = req.body.pw;

        console.log(pw + " " + email);
        
        var inserts = [md5(pw).toString(), email];
        con.query("SELECT * FROM utilisateurs WHERE motDePasse = ? AND email = ?", inserts, (err, userFound) => {
            if (err) throw err;
            console.log(userFound);
            if (userFound.length != 0)
                return res.status(200).json({
                    'user': userFound,
                    'mail': userFound[{email}],
                    'token': jwt.genUserToken(email)
                });
            else
                return res.status(401).send("No user found");
        });
    }
};
