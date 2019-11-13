/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('produits', {
    IDProduit: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    NomProduit: {
      type: DataTypes.STRING(255),
      allowNull: false
    },
    Description: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    Prix: {
      type: DataTypes.DECIMAL,
      allowNull: false
    },
    PhotoProduit: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    Quantite: {
      type: DataTypes.INTEGER(11),
      allowNull: false
    },
    Prix_Total: {
      type: DataTypes.DECIMAL,
      allowNull: false
    },
    IDCommande: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      references: {
        model: 'commande',
        key: 'IDCommande'
      }
    }
  }, {
    tableName: 'produits'
  });
};
