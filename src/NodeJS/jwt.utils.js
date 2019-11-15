var jwt = require('jsonwebtoken');
const SECRET_SIGN='X5IIB4QVYkVjX9hZfGAN52ZAXq4YCWu2C5F97Toc8WrVKtKqsBIyN1K6ZKg3doOx7j6EGQlKGr1vRYtFFO8X9gsrzPBKG1DlKvUdLrMMrp5u8jS32eHbHNMCUUmVUKuBdbFodwBZiM7MfoW0vK7u8C8I9N7JFph1A3nvCXquWBicn4Ad9hc7ZKi9DKkX4UuUg7hczhFoP21bBzrRgKCqRI2xkQCh7yygUaJp6ny4PCGnVh2RJ5286wjdRYRFXiMq';

module.exports = {
    genUserToken: (data) => {
        return jwt.sign({
            'email': 'datamadefortestingpurposeonly'
        },
        SECRET_SIGN,
        {
            expiresIn: '1h'
        })
    }
}