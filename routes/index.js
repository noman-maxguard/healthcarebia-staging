const express = require("express");
const router = express.Router();
const { blogs } = require("../assets/js/blogs");
const { womensTest } = require("../assets/js/womens-health");

router.get("/", (req, res) => {
  res.render("home");
});
router.get("/about-us", (req, res) => {
  res.render("about-us");
});
//Iv drips
router.get("/iv-drip-dubai", (req, res) => {
  res.render("iv-drip-dubai");
});
router.get("/post-party-drip", (req, res) => {
  res.render("drips/post-party-drip");
});
//Blog
router.get("/blog", (req, res) => {
  res.render("blog", { blogs });
});
blogs.forEach((b) => {
  router.get(`/${b.link}`, (req, res) => {
    res.render(`blogs/${b.link}`, { blogs });
  });
});
//Lab test at home
router.get("/lab-test-at-home", (req, res) => {
  res.render("lab-test-at-home");
});
router.get("/womens-health", (req, res) => {
  res.render("lab-test/womens-health");
});
router.get("/womens-health", (req, res) => {
  res.render("lab-test/mens-health");
});
module.exports = router;
