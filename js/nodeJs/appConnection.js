<!-- basic excess -->
require('dotenv').config()
const express = require('express');
const app = express()
const mongoose = require('mongoose')
const config = require('config')


// ******Database Connection******
const URI = `mongodb+srv://${config.get('db-username')}:${config.get('db-password')}@cluster0-wqw2c.mongodb.net/test3?retryWrites=true&w=majority`

//   set Environment
app.set('view engine', 'ejs');
app.set('views', 'views');





const PORT = process.env.PORT || 8080

mongoose.connect(URI,{ useNewUrlParser: true,useUnifiedTopology: true  } )
.then(()=>{
    console.log('Database conected')
    app.listen(PORT, () => {
        console.log('App in running on ' + PORT)
    })
})
.catch(e=>{
    console.log(e)
})

