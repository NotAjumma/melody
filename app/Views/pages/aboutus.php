<link rel="stylesheet" href="<?= base_url('css/aboutus.css') ?>" />
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>" />
    <div class="body-content-aboutus">
      <div class="members-container">
        <div class="header-about-us banner-bold-text">
          At Melody, we believe that music has the power to inspire, heal, and
          bring people together.
        </div>
        <div class="list-members">
          <div class="member">
            <div onmouseover="zoomIn(this)" onmouseout="zoomOut(this)">
              <img
                class="img-profile"
                src="<?= base_url('assets/members/akmalWhite.jpg') ?>"
                id="image1"
              />
            </div>
            <div class="member-name karla-regular-blod-small-text">
              Akmal <span class="title">Founder, Full-stack Programmer</span>
            </div>
          </div>
          <div class="member">
            <div>
              <img
                class="img-profile"
                src="<?= base_url('assets/members/sharulWhite.jpg') ?>"
                id="image2"
              />
            </div>
            <div class="member-name karla-regular-blod-small-text">
              Sharul <span class="title">Ambassador</span>
            </div>
          </div>
          <div class="member">
            <div>
              <img
                class="img-profile"
                src="<?= base_url('assets/members/iqbal.jpg') ?>"
                id="image3"
              />
            </div>
            <div class="member-name karla-regular-blod-small-text">
              Iqbal <span class="title">System Administrator</span>
            </div>
          </div>
          <div class="member">
            <div>
              <img
                class="img-profile"
                src="<?= base_url('assets/members/haziq.jpg') ?>"
                id="image4"
              />
            </div>
            <div class="member-name karla-regular-blod-small-text">
              Haziq <span class="title">Quality Assurance Tester</span>
            </div>
          </div>
        </div>
      </div>
      <div class="sub-text">
        <div class="sub-text-first large-text">
          We are an online platform that specializes in selling albums and
          providing exclusive memberships to music enthusiasts all around the
          world. Whether you're a die-hard fan or someone who simply enjoys the
          beauty of music, we have something for everyone.
        </div>

        <div class="sub-text-sec large-text">
          Our mission is to curate a diverse collection of albums that cater to
          a wide range of musical tastes. From classical masterpieces to the
          latest chart-topping hits, our catalog offers a rich tapestry of
          genres and artists. We take pride in handpicking albums that evoke
          emotions, ignite creativity, and make lasting memories.
        </div>
      </div>

      <div style="padding: 7rem"></div>
    </div>
<script>
  const image1 = document.getElementById("image1");
  const image2 = document.getElementById("image2");
  const image3 = document.getElementById("image3");
  const image4 = document.getElementById("image4");

  const originalSrc1 = image1.src;
  const originalSrc2 = image2.src;
  const originalSrc3 = image3.src;
  const originalSrc4 = image4.src;
  const hoverSrc = "<?= base_url('assets/members/profile.jpg') ?>";
  const hoverSrc2 = "<?= base_url('assets/members/sharulHover.jpg') ?>";
  const hoverSrc3 = "<?= base_url('assets/members/iqbal.jpg') ?>";
  const hoverSrc4 = "<?= base_url('assets/members/haziqHover.jpg') ?>";

  image1.addEventListener("mouseover", function () {
    image1.src = hoverSrc;
  });
  image1.addEventListener("mouseout", function () {
    image1.src = originalSrc1;
  });

  image2.addEventListener("mouseover", function () {
    image2.src = hoverSrc2;
  });
  image2.addEventListener("mouseout", function () {
    image2.src = originalSrc2;
  });

  image3.addEventListener("mouseover", function () {
    image3.src = hoverSrc3;
  });
  image3.addEventListener("mouseout", function () {
    image3.src = originalSrc3;
  });

  image4.addEventListener("mouseover", function () {
    image4.src = hoverSrc4;
  });
  image4.addEventListener("mouseout", function () {
    image4.src = originalSrc4;
  });

  function zoomIn(element) {
    element.classList.add("hovered");
  }

  function zoomOut(element) {
    element.classList.remove("hovered");
  }
</script>
