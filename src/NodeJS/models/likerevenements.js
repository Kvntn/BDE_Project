/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('likerevenements', {
    IDLike: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'likesevenements',
        key: 'IDLike'
      }
    },
    IDUtilisateur: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'utilisateurs',
        key: 'IDUtilisateur'
      }
    }
  }, {
    tableName: 'likerevenements'
  });
};
