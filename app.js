const express = require("express");
const app = express();
const path = require("path");
const bodyParser = require("body-parser");
const routes = require("./routes/index.js");
const ejs = require("ejs");

app.set("view engine", "ejs");

//Static
app.use("/assets", express.static(path.join(__dirname, "assets")));
//Views
app.set("views", path.join(__dirname, "views"));

// Caching
app.set("view cache", false);
ejs.clearCache(); // clear any compiled template cache
app.locals.cache = false; // some setups check this flag
// prevent browser caching while debugging
app.use((req, res, next) => {
  res.set("Cache-Control", "no-store");
  next();
});

// Parsers
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

//Routes
app.use("/", routes);
//error handling
app.use((req, res, next) => {
  res.status(404).render("404.ejs");
});
app.use((err, req, res, next) => {
  console.log("Unhandled error", err);
  res.status(500).send("Something broke.");
});

app.listen(3000, () => {
  console.log("APP LISTENING TO PORT 3000");
});
