const app       = require('express');
const usrCtrl   = require('./controllers/userCtrl.js');
const prodCtrl  = require('./controllers/produitsCtrl');
const eventCtrl = require('./controllers/eventCtrl');
var vToken      = require('./VerifyToken');

exports.router = (() => {
    const router = app.Router();

    //User-related routes
    router.route('/users/register').post(vToken, usrCtrl.register);
    router.route('/users/get').get(vToken, usrCtrl.get);
    router.route('/users/login').post(usrCtrl.login);

    //Products routes
    router.route('/produits/get').get(vToken,prodCtrl.get);
    router.route('/produits/add').post(vToken,prodCtrl.add);

    //Event routes
    router.route('/event/add').post(vToken, eventCtrl.add);
    router.route('/event/get').get(vToken, prodCtrl.get);

    //testing routes
    router.route('/test')
        .get(vToken, usrCtrl.test)
        .post(vToken, usrCtrl.test)
        .put(vToken, eventCtrl.test);
   
    return router;
})();

