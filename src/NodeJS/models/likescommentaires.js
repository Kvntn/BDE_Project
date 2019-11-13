/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('likescommentaires', {
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
    IDCommentaire: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      references: {
        model: 'commentairesevenements',
        key: 'IDCommentaire'
      }
    }
  }, {
    tableName: 'likescommentaires'
  });
};
