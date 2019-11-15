const jwt       = require('jsonwebtoken');
const ACCESS_KEY = 'X5IIB4QVYkVjX9hZfGAN52ZAXq4YCWu2C5F97Toc8WrVKtKqsBIyN1K6ZKg3doOx7j6EGQlKGr1vRYtFFO8X9gsrzPBKG1DlKvUdLrMMrp5u8jS32eHbHNMCUUmVUKuBdbFodwBZiM7MfoW0vK7u8C8I9N7JFph1A3nvCXquWBicn4Ad9hc7ZKi9DKkX4UuUg7hczhFoP21bBzrRgKCqRI2xkQCh7yygUaJp6ny4PCGnVh2RJ5286wjdRYRFXiMq';

function verifyToken(req, res, next) {
    var token = req.body.token;
    if (!token)
        return res.status(403).send({
            auth: false,
            message: 'No token provided.'
        });

    jwt.verify(token, ACCESS_KEY, (err, decoded) => {
        if (err)
            return res.status(500).send({
                auth: false,
                message: 'Failed to authenticate token.'
            });

        // if everything good, save to request for use in other routes
        req.userId = decoded.email;
        next();
    });
}

module.exports = verifyToken;