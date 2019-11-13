const utilisateurs = require('../models').utilisateurs;

module.exports = {
    create(req, res) {
        return utilisateurs
        .create({
            email: req.body.mail,
            pw: req.body.pw,
            pdp: req.body.pdp,
            stat: req.body.stat,
            idp: req.body.idp
        })
    }
}