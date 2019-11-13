/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('listeproduits', {
    IDProduit: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    NomProduit: {
      type: DataTypes.STRING(50),
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
    Photo: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    Categorie: {
      type: DataTypes.STRING(50),
      allowNull: false
    }
  }, {
    tableName: 'listeproduits'
  });
};
