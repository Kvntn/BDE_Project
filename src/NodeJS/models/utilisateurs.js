'use strict';
module.exports = (sequelize, DataTypes) => {
  const utilisateurs = sequelize.define('utilisateurs', {
    email: DataTypes.STRING,
    MotDePasse: DataTypes.STRING,
    status: DataTypes.NUMBER,
    center: DataTypes.NUMBER,
    PhotoDeProfil: DataTypes.STRING
  }, {});
  utilisateurs.associate = function(models) {
    // associations can be defined here
    
  };
  return utilisateurs;
};