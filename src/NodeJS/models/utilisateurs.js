/* jshint indent: 2 */

module.exports = (sequelize, DataTypes) => {
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
      type: DataTypes.STRING(255),
      allowNull: false
    },
    PhotoDeProfil: {
      type: DataTypes.STRING(255),
      allowNull: true
    },
    Statut: {
      type: DataTypes.INTEGER(11),
      allowNull: false
    },
    IDPanier: {
      type: DataTypes.INTEGER(11),
      allowNull: false
    }
  }, {
    tableName: 'utilisateurs'
  });
};
