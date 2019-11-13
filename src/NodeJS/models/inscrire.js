/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('inscrire', {
    IDUtilisateur: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      references: {
        model: 'utilisateurs',
        key: 'IDUtilisateur'
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
    tableName: 'inscrire'
  });
};
