/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('commentairesevenements', {
    IDCommentaire: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    ContenuCommentaire: {
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
    tableName: 'commentairesevenements'
  });
};
