const path = require('path');

console.log("Название файла: ", path.basename(__filename));
console.log('Имя директории: ', path.dirname(__filename));
console.log('Расширение файла: ', path.extname(__filename));
console.log("Parce: ", path.parse(__filename));