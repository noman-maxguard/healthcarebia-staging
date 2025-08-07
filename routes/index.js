const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
  res.render("home");
});
router.get("/about-us", (req, res) => {
  res.render("about-us");
});
router.get("/lab-test-at-home", (req, res) => {
  res.render("lab-test-at-home");
});
router.get("/iv-drip-dubai", (req, res) => {
  res.render("iv-drip-dubai");
});
router.get("/blog", (req, res) => {
  res.render("blog");
});

module.exports = router;
