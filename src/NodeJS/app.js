const express    = require('express');
const bodyParser = require('body-parser'); 
const router     = require('./apirouter').router;
var jwt          = require('jsonwebtoken');
//const Sequelize  = require('sequelize');
const sql        = require('mysql');

// This will be our application entry. We'll setup our server here.
const http = require('http');

// Set up the express app
const app = express();

// Parse incoming requests data (https://github.com/expressjs/body-parser)
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: false }));

app.get('/', (req, res) => {
    res.status(200).send('Welcome on G2W Group\'s API Server !');
});
app.use('/api/', router);

const port = parseInt(process.env.PORT, 10) || 8000;
app.set('port', port);

const server = http.createServer(app);
server.listen(port, () => {
    console.log(`Server local on port : ${port}`);
});