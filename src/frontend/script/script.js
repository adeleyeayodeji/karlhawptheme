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
  const headerNavLinkBlock = $(".khala-desktop-menu .header-nav-link-block");

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
   * Get mobile menu trigger
   *
   *
   */
  const mobileMenuTrigger = $(".khala-desktop-menu .w-nav-button");

  mobileMenuTrigger.click((e) => {
    e.preventDefault();

    const menu = $(".w-nav-overlay.khala-mobile-menu");

    if (menu.is(":visible")) {
      menu.stop().animate({ height: "toggle", opacity: "toggle" }, 200, () => {
        mobileMenuTrigger.removeClass("w--open");
      });
    } else {
      menu
        .stop()
        .css("display", "none")
        .animate({ height: "toggle", opacity: "toggle" }, 200, () => {
          mobileMenuTrigger.addClass("w--open");
        });
    }
  });

  /**
   * Get all .mobile-nav-link-block
   *
   */
  const mobileNavLinkBlock = $(".khala-mobile-menu .mobile-nav-link-block");

  mobileNavLinkBlock.each(function () {
    const $this = $(this);
    //on click, show the dropdown
    $this.click(function () {
      //find mobile-dropdown-list-block w-dropdown-list
      const dropdown = $(this).find(".mobile-dropdown-list-block");
      //toggle slideToggle
      dropdown.slideToggle();
    });
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
