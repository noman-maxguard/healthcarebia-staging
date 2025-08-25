const express = require("express");
const router = express.Router();
const { blogs } = require("../assets/js/blogs");

router.get("/", (req, res) => {
  res.render("home");
});
router.get("/about-us", (req, res) => {
  res.render("about-us");
});
router.get("/terms-and-conditions", (req, res) => {
  res.render("terms-and-conditions");
});
router.get("/patients-rights", (req, res) => {
  res.render("patients-rights");
});
router.get("/refund", (req, res) => {
  res.render("refund");
});
router.get("/contact-us", (req, res) => {
  res.render("contact-us");
});
//Iv drips
router.get("/iv-drip-dubai", (req, res) => {
  res.render("iv-drip-dubai");
});
router.get("/post-party-drip", (req, res) => {
  res.render("drips/post-party-drip");
});
router.get("/nad-plus-drip", (req, res) => {
  res.render("drips/nad-plus-drip");
});
router.get("/gut-health-drip", (req, res) => {
  res.render("drips/gut-health-drip");
});
router.get("/good-sleep-drip", (req, res) => {
  res.render("drips/good-sleep-drip");
});
router.get("/energy-focus-drip", (req, res) => {
  res.render("drips/energy-focus-drip");
});
router.get("/myers-drip", (req, res) => {
  res.render("drips/myers-drip");
});
router.get("/immune-drip", (req, res) => {
  res.render("drips/immune-drip");
});
//Wellness
router.get("/oxygen-therapy", (req, res) => {
  res.render("wellness/oxygen-therapy");
});
router.get("/tele-consultation", (req, res) => {
  res.render("wellness/tele-consultation");
});
router.get("/nurse-at-home", (req, res) => {
  res.render("wellness/nurse-at-home");
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
router.get("/mens-health", (req, res) => {
  res.render("lab-test/mens-health");
});
router.get("/intimacy-and-wellness", (req, res) => {
  res.render("lab-test/intimacy-and-wellness");
});
router.get("/general-health-test", (req, res) => {
  res.render("lab-test/general-test");
});
router.get("/common-and-functional-test", (req, res) => {
  res.render("lab-test/common-test");
});
router.get("/allergy-and-intolerance-test", (req, res) => {
  res.render("lab-test/allergy-intolerance-test");
});
router.get("/dna-test", (req, res) => {
  res.render("lab-test/dna-test");
});
router.get("/blood-test", (req, res) => {
  res.render("lab-test/custom-blood-test");
});
// faqs
router.get("/faqs", (req, res) => {
  res.render("faqs");
});
// ebook form
router.post("/ebooks/download", (req, res) => {
  res.status(200).json({ message: "success" });
});
module.exports = router;
