/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('utilisateurs', {
    IDUtilisateur: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    Email: {
      type: DataTypes.STRING(255),
      allowNull: false
    },
    MotDePasse: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    Statut: {
      type: DataTypes.INTEGER(11),
      allowNull: false
    },
    PhotoDeProfil: {
      type: DataTypes.STRING(255),
      allowNull: true
    },
    IDPanier: {
      type: DataTypes.INTEGER(11),
      allowNull: true,
      references: {
        model: 'panier',
        key: 'IDPanier'
      },
      unique: true
    }
  }, {
    tableName: 'utilisateurs'
  });
};
