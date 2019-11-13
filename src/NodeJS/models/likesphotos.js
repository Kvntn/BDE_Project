/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('likesphotos', {
    IDLike: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    IDUtilisateur: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      references: {
        model: 'utilisateurs',
        key: 'IDUtilisateur'
      }
    },
    IDPhoto: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      references: {
        model: 'photos',
        key: 'IDPhoto'
      }
    }
  }, {
    tableName: 'likesphotos'
  });
};
