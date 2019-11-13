/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('photos', {
    IDPhoto: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    NomPhoto: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    DescriptionPhoto: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    LienPhoto: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    IDEvenement: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      references: {
        model: 'evenements',
        key: 'IDEvenement'
      }
    },
    IDUtilisateur: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      references: {
        model: 'utilisateurs',
        key: 'IDUtilisateur'
      }
    }
  }, {
    tableName: 'photos'
  });
};
