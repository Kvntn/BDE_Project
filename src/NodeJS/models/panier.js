/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('panier', {
    IDPanier: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    IDUtilisateur: {
      type: DataTypes.INTEGER(11),
      allowNull: true,
      references: {
        model: 'utilisateurs',
        key: 'IDUtilisateur'
      },
      unique: true
    }
  }, {
    tableName: 'panier'
  });
};
