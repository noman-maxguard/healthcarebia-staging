<!doctype html>
<html lang="en">
   <head>
      <?php include 'includes/inc_head_tag.php'; ?>
   </head>
   <body>
      <?php include 'includes/inc_header.php'; ?>
      <section class="sub-banner small-banner"
         style="background-image: url(<?= base_url() ?>assets/frontend/img/small-banner.png);">
         <div class="overlay">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h2>Download ebook</h2>
                     <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                           <li><a href="<?= base_url() ?>" class="hvr-underline-from-left menu-line">Home</a></li>
                           <li class="active" aria-current="page">Download ebook</li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section-gap d-flex justify-center align-center gap-5 text-center" style="height:80vh">
        <div class="container d-flex flex-column align-items-center justify-content-center mb-5">
          <h4>Download Our Free Home Healthcare eBook</h4>
          <p>Learn how to choose the right in-home care, prepare for visits, and more.</p>
          <button id="downloadBtn" class="btn primary-btn" style="color: white;background-color:#568259; margin-top:25px">Download eBook</button>
        </div>
    </section>

<!-- Hidden Bootstrap modal with the form -->
      <div class="modal fade" id="downloadModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content p-4 rounded-4 shadow-sm">
            <h5 class="modal-title mb-4 text-center">Just one more step…</h5>
            <form id="ebookForm"
                  method="post"
                  action="<?= base_url('ebook/download') ?>"
                  class="w-100">

              <div class="form-floating mb-3">
                <input  type="text"
                        class="form-control rounded-3"
                        id="ebookfName"
                        name="fname"
                        placeholder="First "
                        required>
                <label for="ebookName">First Name</label>
              </div>
              <div class="form-floating mb-3">
                <input  type="text"
                        class="form-control rounded-3"
                        id="ebooklName"
                        name="lname"
                        placeholder="Last name"
                        required>
                <label for="ebookName">Last Name</label>
              </div>

              <div class="form-floating mb-4">
                <input  type="email"
                        class="form-control rounded-3"
                        id="ebookEmail"
                        name="email"
                        placeholder="Your Email"
                        required>
                <label for="ebookEmail">Your Email</label>
              </div>
              <div class="form-floating mb-4">
                <input  type="tel"
                        class="form-control rounded-3"
                        id="phone"
                        name="phone"
                        placeholder="Your Phone number"
                        required>
                <label for="ebookEmail">Your Phone</label>
              </div>

              <button type="submit"
                      class="btn btn-lg w-100 rounded-pill" style="color: white;background-color: #568259">
                Get eBook
              </button>
            </form>
          </div>
        </div>
      </div>


      <?php include 'includes/inc_footer.php'; ?>
      <?php include 'includes/inc_footer_scripts.php'; ?>
      <script>
      document.getElementById('downloadBtn').addEventListener('click', function() {
        new bootstrap.Modal(document.getElementById('downloadModal')).show();
      });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
  var form = document.getElementById('ebookForm');

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    var xhrData = new FormData(form);
    xhrData.append('form_name', 'ebook_download');
    xhrData.append('url_from', window.location.href);
    fetch('<?= base_url("ebooks/download") ?>', {
      method: 'POST',
      body: xhrData
    }).catch(function(err){
      console.error('Email send failed:', err);
    });

    var link = document.createElement('a');
    link.href = '<?= base_url("assets/ebook/Healthcarebia-ebook.pdf") ?>';
    link.download = 'Healthcarebia-ebook.pdf';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);

    var existing = document.getElementById('thankYouMessage');
    if (!existing) {
      var msg = document.createElement('div');
      msg.id = 'thankYouMessage';
      msg.style.marginTop = '1rem';
      msg.textContent = 'Thank you for downloading our eBook!';
      form.parentNode.appendChild(msg);
    }
  });
});
</script>
   </body>
</html>