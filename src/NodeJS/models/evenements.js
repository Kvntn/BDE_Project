/* jshint indent: 2 */

module.exports = function(sequelize, DataTypes) {
  return sequelize.define('evenements', {
    IDEvenement: {
      type: DataTypes.INTEGER(11),
      allowNull: false,
      primaryKey: true,
      autoIncrement: true
    },
    NomEvenement: {
      type: DataTypes.STRING(50),
      allowNull: false
    },
    Description: {
      type: DataTypes.TEXT,
      allowNull: false
    },
    Date: {
      type: DataTypes.DATEONLY,
      allowNull: false
    },
    Prix: {
      type: DataTypes.DECIMAL,
      allowNull: false
    }
  }, {
    tableName: 'evenements'
  });
};
