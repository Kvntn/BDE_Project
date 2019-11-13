/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('commande', {
    IDCommande: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    Date: {
      type: DataTypes.DATEONLY,
      allowNull: false
    },
    Prix_Total: {
      type: DataTypes.DECIMAL,
      allowNull: false
    },
    IDPanier: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      references: {
        model: 'panier',
        key: 'IDPanier'
      }
    }
  }, {
    tableName: 'commande'
  });
};
