const express = require("express");
const router = express.Router();
const { blogs } = require("../assets/js/blogs");
const nodemailer = require("nodemailer");
const axios = require("axios");
require("dotenv").config();
// const multer = require("multer");
// const upload = multer();

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
router.post("/ebooks/submit", async (req, res) => {
  const { email, consent } = req.body;
  const url = process.env.EBOOK_SCRIPT_URL;
  if (!email || !email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
    return res.status(400).send("Invalid form submission.");
  }
  if (!url) {
    return res
      .status(500)
      .json({ ok: false, error: "Server misconfigured: GOOGLE_SCRIPT_URL missing." });
  }
  const payload = {
    email: String(email).trim(),
    subscription: String(consent === "yes" ? "subscribed" : "not subscribed").trim(),
    date: new Date().toLocaleString("en-GB", { hour12: true }),
  };
  try {
    const gasResp = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });
    const text = await gasResp.text();
    if (!gasResp.ok) {
      return res
        .status(502)
        .json({ ok: false, error: "GAS error", status: gasResp.status, body: text });
    }
  } catch (err) {
    console.log("Sheet update failed :", err);
  }
});
router.post("/contact", async (req, res) => {
  const { name, phone, email, message, type } = req.body;
  const token = req.body["g-recaptcha-response"];
  console.log(token);
  const ip = req.headers["x-forwarded-for"] || req.socket.remoteAddress;

  if (
    !name ||
    !email ||
    !message ||
    !type ||
    !phone ||
    !email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)
  ) {
    return res.status(400).send("Invalid form submission.");
  }
  const url = process.env.GOOGLE_SCRIPT_URL;
  if (!url) {
    return res
      .status(500)
      .json({ ok: false, error: "Server misconfigured: GOOGLE_SCRIPT_URL missing." });
  }
  const payload = {
    fname: String(first_name).trim(),
    lname: String(last_name || "").trim(),
    email: String(email).trim(),
    phone: String(phone).trim(),
    message: String(message).trim(),
    type: String(type).trim(),
    date: new Date().toLocaleString("en-GB", { hour12: true }),
    source: "contact us page",
  };
  try {
    const gasResp = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });
    const text = await gasResp.text();
    if (!gasResp.ok) {
      return res
        .status(502)
        .json({ ok: false, error: "GAS error", status: gasResp.status, body: text });
    }
  } catch (err) {
    console.log("Sheet update failed :", err);
  }
  if (!process.env.MAIL_USER || !process.env.MAIL_PASS || !process.env.MAIL_TO) {
    console.error("Missing environment variables");
    return res.status(500).send("Something went wrong.");
  }
  try {
    const verifyUrl = `https://www.google.com/recaptcha/api/siteverify`;
    const response = await axios.post(verifyUrl, null, {
      params: {
        secret: process.env.CAPTCHA_SECRET,
        response: token,
        remoteip: ip,
      },
    });
    const { success } = response.data;
    if (!success) {
      console.error("reCAPTCHA verification failed:", response.data);
      return res.status(403).send("Failed reCAPTCHA verification.");
    }

    //save to database
    // const sql = `INSERT INTO contacts(name,email,message,ip)VALUES(?, ?, ?, ?)`;
    // const values = [name, email, message, ip];
    // db.query(sql, values, (err, result) => {
    //   if (err) {
    //     console.error("Error inserting into database:", err);
    //     return res.status(500).send("Error saving to database.");
    //   }
    //   console.log("Contact saved to database");
    // });

    const transporter = nodemailer.createTransport({
      host: "smtp.gmail.com",
      port: 465,
      secure: true,
      auth: { user: process.env.MAIL_USER, pass: process.env.MAIL_PASS },
      tls: { minVersion: "TLSv1.2", servername: "smtp.gmail.com" },
    });
    try {
      await transporter.verify();
      console.log("SMTP OK");
    } catch (e) {
      console.error("SMTP verify failed:", e);
    }
    const mailOptions = {
      from: `${first_name} ${last_name || ""} <${process.env.MAIL_USER}>`,
      to: process.env.MAIL_TO,
      subject: `Healthcarebia - Enquiry received.`,
      text: `Name: ${first_name} ${last_name || ""}\nEmail: ${email}\nPhone:${phone}\nMessage: ${message}\nType:${type}\nIP Address: ${ip}`,
    };
    let info = await transporter.sendMail(mailOptions);
    res.status(200).send("Your message was sent successfully! We will be in touch soon.");
  } catch (error) {
    res.status(500).send("Something went wrong, try refreshing and submitting the form again.");
    console.log(error);
  }
});
router.post("/talk-to-us", async (req, res) => {
  const { name, phone, email, message } = req.body;
  // const token = req.body["g-recaptcha-response"];
  // console.log(token);
  const ip = req.headers["x-forwarded-for"] || req.socket.remoteAddress;

  if (!name || !email || !message || !phone || !email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
    return res.status(400).send("Invalid form submission.");
  }
  const url = process.env.GOOGLE_SCRIPT_URL;
  if (!url) {
    return res
      .status(500)
      .json({ ok: false, error: "Server misconfigured: GOOGLE_SCRIPT_URL missing." });
  }
  const payload = {
    fname: String(name).trim(),
    lname: String("").trim(),
    email: String(email).trim(),
    phone: String(phone).trim(),
    message: String(message).trim(),
    type: String("").trim(),
    date: new Date().toLocaleString("en-GB", { hour12: true }),
    source: "home page",
  };
  try {
    const gasResp = await fetch(url, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });
    const text = await gasResp.text();
    if (!gasResp.ok) {
      return res
        .status(502)
        .json({ ok: false, error: "GAS error", status: gasResp.status, body: text });
    }
  } catch (err) {
    console.log("Sheet update failed :", err);
  }
  if (!process.env.MAIL_USER || !process.env.MAIL_PASS || !process.env.MAIL_TO) {
    console.error("Missing environment variables");
    return res.status(500).send("Something went wrong.");
  }
  try {
    //save to database
    // const sql = `INSERT INTO contacts(name,email,message,ip)VALUES(?, ?, ?, ?)`;
    // const values = [name, email, message, ip];
    // db.query(sql, values, (err, result) => {
    //   if (err) {
    //     console.error("Error inserting into database:", err);
    //     return res.status(500).send("Error saving to database.");
    //   }
    //   console.log("Contact saved to database");
    // });

    const transporter = nodemailer.createTransport({
      host: "smtp.gmail.com",
      port: 465,
      secure: true,
      auth: { user: process.env.MAIL_USER, pass: process.env.MAIL_PASS },
      tls: { minVersion: "TLSv1.2", servername: "smtp.gmail.com" },
    });
    try {
      await transporter.verify();
      console.log("SMTP OK");
    } catch (e) {
      console.error("SMTP verify failed:", e);
    }
    const mailOptions = {
      from: `${name} <${process.env.MAIL_USER}>`,
      to: process.env.MAIL_TO,
      subject: `Healthcarebia - Enquiry received.`,
      text: `Name: ${name} \nEmail: ${email}\nPhone:${phone}\nMessage: ${message}\nIP Address: ${ip}`,
    };
    let info = await transporter.sendMail(mailOptions);
    res.status(200).send("Your message was sent successfully! We will be in touch soon.");
  } catch (error) {
    res.status(500).send("Something went wrong, try refreshing and submitting the form again.");
    console.log(error);
  }
});
module.exports = router;
