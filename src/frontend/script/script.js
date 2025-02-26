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
});
