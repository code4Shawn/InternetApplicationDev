const mysql = require('mysql')
const utils = require('util')

/*
TODO: Move the connection details to the .env file
Create a connection pool for storing multiple connections
 */
const pool   =  mysql.createPool({
    // TODO:change connection limit according to server on production
    connectionLimit : 10,
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'student'
  })

  /*Get connection throw error if error and release created connection*/
  pool.getConnection((err,connection)=>{
      if(err){
          console.log('Err code \t ' + err.code + '\n Err Message\t' + err.message)
         
      } 
      connection.release() 
      return
  })

  /*Use async/await tasks for mysql since the package does not provide it by default */
 pool.query = utils.promisify(pool.query)

 


module.exports = pool



