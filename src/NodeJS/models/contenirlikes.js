/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('contenirlikes', {
    IDLike: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'likesevenements',
        key: 'IDLike'
      }
    },
    IDEvenement: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'evenements',
        key: 'IDEvenement'
      }
    }
  }, {
    tableName: 'contenirlikes'
  });
};
