jQuery(document).ready(function ($) {
  /**
   * class array
   *
   */
  const classArray = [
    ".home-hero-header",
    ".home-hero-text .OutlineElement",
    ".home-hero-cta"
  ];

  classArray.forEach((selector, index) => {
    $(selector)
      .delay(index * 500)
      .animate(
        {
          opacity: 1,
          top: "0px"
        },
        800
      );
  });

  /**
   * Get all .header-nav-link-block
   *
   */
  const headerNavLinkBlock = $(".header-nav-link-block");

  headerNavLinkBlock.each(function () {
    const $this = $(this);
    //on hover, show the dropdown
    $this.hover(
      function () {
        $(this).find(".header-nav-dropdown").fadeIn();
      },
      function () {
        $(this).find(".header-nav-dropdown").hide();
      }
    );
  });

  /**
   * Onclick top-header-icon-block search
   *
   */
  $(".top-header-icon-block.search").click(function (e) {
    e.preventDefault();
    //hide all .top-header-icon-block
    $(".top-header-icon-block").hide();
    //show .top-header-icon-block.searchform
    $(".top-header-icon-block.searchform").show();
  });

  $(".top-header-icon-block.searchform span").click(function (e) {
    e.preventDefault();
    $(".top-header-icon-block").show();
    $(".top-header-icon-block.searchform").hide();
  });
});
