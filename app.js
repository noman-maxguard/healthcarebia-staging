const express = require('express');
const app = express();
const path = require('path');
const bodyParser = require('body-parser');
const routes = require('./routes/index.js');

app.set("view engine", "ejs");
app.use("/assets", express.static(path.join(__dirname, "assets")));
app.set("views", path.join(__dirname, "views"));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use('/',routes);
//error handling
app.use((req,res,next)=>{
  res.status(404).render('404.ejs')
})
app.use((err,req,res,next)=>{
  console.log('Unhandled error',err);
  res.status(500).send('Something broke.');
})

app.listen(3000,()=>{
  console.log('APP LISTENING TO PORT 3000');
})