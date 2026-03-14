(function () {
  "use strict";

  function throttle(fn, wait) {
    let inThrottle;
    return function () {
      if (!inThrottle) {
        fn.apply(this, arguments);
        inThrottle = true;
        setTimeout(function () {
          inThrottle = false;
        }, wait);
      }
    };
  }

  function addRevealAnimation() {
    const targets = document.querySelectorAll(
      ".ftco-section .row > div, .services, .services-2, .gallery-card, .staff, .facility-card, .contact-info",
    );

    if (!("IntersectionObserver" in window) || targets.length === 0) {
      return;
    }

    targets.forEach(function (el) {
      el.classList.add("reveal-on-scroll");
    });

    const observer = new IntersectionObserver(
      function (entries, obs) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("revealed");
            obs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" },
    );

    targets.forEach(function (el) {
      observer.observe(el);
    });
  }

  function enhanceNavOnScroll() {
    const navbar = document.querySelector("#ftco-navbar");
    if (!navbar) {
      return;
    }

    const onScroll = throttle(function () {
      if (window.scrollY > 40) {
        navbar.style.boxShadow = "0 10px 26px rgba(0,0,0,0.12)";
      } else {
        navbar.style.boxShadow = "none";
      }
    }, 120);

    window.addEventListener("scroll", onScroll, { passive: true });
    onScroll();
  }

  function improveMobileMenu() {
    if (window.matchMedia("(max-width: 991.98px)").matches) {
      const navCollapse = document.querySelector("#ftco-nav");
      if (navCollapse) {
        navCollapse.style.background = "rgba(33,37,41,0.97)";
        navCollapse.style.borderRadius = "10px";
        navCollapse.style.marginTop = "8px";
        navCollapse.style.padding = "8px 10px";
      }
    }
  }

  function disableHeavyParallaxOnSmallScreens() {
    if (!window.jQuery) {
      return;
    }

    if (window.matchMedia("(max-width: 767.98px)").matches) {
      try {
        window.jQuery(window).stellar("destroy");
      } catch (error) {}
    }
  }

  document.addEventListener("DOMContentLoaded", function () {
    addRevealAnimation();
    enhanceNavOnScroll();
    improveMobileMenu();
    disableHeavyParallaxOnSmallScreens();
  });
})();
