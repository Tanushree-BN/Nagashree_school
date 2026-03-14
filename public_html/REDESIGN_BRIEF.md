# Nagashree English School Website — Redesign Brief

## 1) Project Purpose

This is the official public website for **Nagashree English School (Channarayapatna, Hassan, Karnataka)**.

Primary goals:

- Build trust with parents and guardians.
- Communicate school quality, facilities, and safety.
- Showcase campus life via photo gallery.
- Drive admissions enquiries.
- Provide clear contact information and location.

## 2) Current Tech Stack & Architecture

- Frontend: **HTML5 + CSS3 + JavaScript (jQuery)**
- Framework/CSS base: **Bootstrap 4.3.1**
- PHP usage: minimal; mostly static pages plus one PHP homepage.
- Animation/libs: AOS, Waypoints, Scrollax, Stellar parallax, Owl Carousel, Magnific Popup, Animate.css.
- Fonts/icons: Google Fonts (Poppins), Flaticon, Icomoon, Ionicons, Open Iconic.
- Build traces: SCSS source exists and Prepros config exists (`prepros-6.config`).

### File architecture (high-value)

- Pages (HTML): `index.html`, `about.html`, `gallery.html`, `faculties.html`, `facilities.html`, `contact.html`
- PHP homepage: `index.php`
- Shared PHP partials: `includes/header.php`, `includes/footer.php`
- Main styles: `css/style.css` (large compiled legacy/template CSS)
- Global enhancement layer: `css/site-enhancements.css`
- Main behavior: `js/main.js`
- Additional behavior: `js/site-enhancements.js`
- Map script: `js/google-map.js`
- Media: `images/` (large photo inventory + admission posters + logo + video)

## 3) Information Architecture (Current Sitemap)

Top navigation appears on all pages:

- Home
- About
- Gallery
- Faculties
- Facilities
- Contact

### Actual URL landscape

- Active static site routes: `.html` pages above.
- Also has `index.php` (partially modularized with PHP includes).

## 4) Page-by-Page Functional Inventory

## Home (`index.html` / `index.php`)

Main sections:

1. Top header with logo + email + 3 phone numbers.
2. Main navbar.
3. Hero section with headline + CTA buttons.
4. “Why Choose Nagashree” feature cards.
5. Admissions section with two poster images and enquiry CTA.
6. About/services grid (“What We Offer”).
7. Counter section (teachers/students/courses/awards) + school intro text + video player.
8. Mini gallery strip.
9. Footer with contact + quick links + social links.

Key interactions:

- Counter number animation.
- Scroll/reveal animations.
- Hero/button hover effects.
- Self-hosted video play toggle.

## About (`about.html`)

Sections:

1. Header + navbar.
2. Hero/breadcrumb.
3. About copy (unique positioning text).
4. Counter + embedded video popup.
5. 4-image gallery strip.
6. Footer.

## Gallery (`gallery.html`)

Sections/features:

1. Header + navbar.
2. Gallery title and category filters (`all/events/classroom/sports/facilities`).
3. Large masonry-like image grid with many school photos.
4. Lightbox zoom (Magnific Popup).
5. Client-side category filtering via data attributes.
6. Footer.

## Facilities (`facilities.html`)

Sections/features:

1. Header + navbar + hero.
2. Facilities grid cards (Smart Classrooms, Science Labs, Digital Library, Computer Lab, Sports, Transport).
3. Each card opens modal with detailed bullets.
4. Footer.

## Faculties (`faculties.html`)

Current state:

- Has header/nav + hero + footer.
- **No faculty listing/team cards in live body content currently**.
- CSS references a “teachers section” but body markup is missing/removed.

## Contact (`contact.html`)

Sections/features:

1. Header + navbar + hero.
2. Contact cards: address, phone, email.
3. Contact form UI (currently non-functional; no backend submission endpoint).
4. Embedded Google Map iframe.
5. Footer.

## 5) Core Content/Business Data Present

- School name: Nagashree English School.
- Location: Shravanabelagola Road, Near Vinayaka Gas Godown, Channarayapatna, Hassan - 573116.
- Contact email: `nagashreeschoolcrp@gmail.com`.
- Phones shown in UI:
  - Office: `+91-9742278222`
  - Principal: `+91-9241776070`
  - Admin: `+91-9901181966`
- Social links: YouTube, Facebook, Instagram.
- Admissions messaging: “Admission Open for 2025-26”.
- Schema JSON-LD present in multiple pages (`EducationalOrganization`).

## 6) Current Visual System Snapshot

- Primary recurring accent: warm gold/orange around `#f8b739` / `#e6a730` / legacy orange `#F96D00`.
- Typography: Poppins.
- Design style: template-based cards + dark navbar + image-heavy sections.
- New enhancement layer introduces cleaner premium look (nav gradients, improved cards/forms/footer shadows/radius).

## 7) JavaScript Behavior Inventory

Main behaviors from `js/main.js` and page scripts:

- Loader hide on page load.
- AOS and waypoint animation triggers.
- Parallax via Stellar + Scrollax.
- Owl carousel setup (legacy).
- Magnific popup for image and video iframes.
- Counter animation with animateNumber.
- Dropdown hover behavior.

Added behavior (`js/site-enhancements.js`):

- IntersectionObserver reveal class injection.
- Navbar shadow on scroll.
- Mobile collapsed menu polish.
- Disables heavy parallax on small screens.

Gallery page inline script:

- Filter buttons to show/hide by `data-category`.
- Magnific popup gallery binding.

Facilities page inline script:

- Open/close modals.
- Escape key close.
- Click-outside close.

## 8) Important Gaps / Inconsistencies to Fix in Redesign

1. **Content gap:** Faculties page missing faculty listing module.
2. **Routing mismatch:** PHP includes (`includes/header.php`, `includes/footer.php`) link to `.php` pages that do not exist (except `index.php`), while public nav uses `.html` pages.
3. **Data inconsistency:** Some phone values differ between markup/schema/tel links (e.g., schema uses `+919740078222`; contact block includes `+91-9742278222`; one footer line has typo for principal).
4. **Map/API inconsistency:** contact page uses `YOUR_API_KEY`; other pages include a concrete key; `google-map.js` is hardcoded to New York and is not aligned with school location.
5. **Duplication debt:** Large inline `<style>` blocks repeated in each page; hard to maintain.
6. **Mixed architecture:** both static HTML and partial PHP approach coexist.
7. **Accessibility gaps:** repeated vague alt text (“Computer Lab”), icon-only controls, weak semantic hierarchy in places.
8. **Form not wired:** contact form has `action="#"` and no server/email pipeline.
9. **Asset hygiene:** duplicate/odd filenames (`std5 - Copy.JPG`, `.DS_Store`, typo `vedio.mp4`).

## 9) Redesign Objectives (for AI tool)

A redesign should deliver:

- Clean, premium school brand presentation.
- Strong admissions conversion path.
- Faster mobile-first UX.
- Centralized and maintainable style/component architecture.
- Consistent, trustworthy contact data.
- Better accessibility and SEO.

## 10) Redesign Requirements (Must-Have)

### A. UX & IA

- Keep top-level pages: Home, About, Gallery, Faculties, Facilities, Contact.
- Add missing complete faculty/team section with cards and profile essentials.
- Keep admissions section prominent on home page.
- Keep gallery with category filtering and lightbox.
- Keep contact card + map + enquiry form.

### B. Visual Design

- Contemporary school identity (professional, warm, trustworthy).
- Cohesive spacing scale and typography rhythm.
- Consistent card styles and section backgrounds.
- Refined CTA hierarchy (primary admissions, secondary explore/contact).

### C. Content Integrity

- Preserve existing school story and key claims unless user supplies updated text.
- Normalize all phone/email/address across all pages and schema.
- Preserve social links.

### D. Technical

- Choose one routing strategy and standardize:
  - Option 1: full static `.html`
  - Option 2: full PHP templating with shared header/footer partials.
- Remove duplicated inline style blocks into modular CSS files.
- Keep or replace jQuery plugins with modern equivalents; avoid redundant libraries.
- Optimize images and lazy-load non-critical media.
- Ensure contact form actually submits (email, CRM, or API endpoint).

### E. Accessibility & SEO

- Proper heading structure (`h1` unique/page, logical `h2/h3`).
- Better alt text for every media item.
- Keyboard-safe modals and focus management.
- Fix structured data consistency.
- Keep canonical/meta tags page-specific.

## 11) Component Model for Redesign

Use these reusable components:

- SiteHeader (logo + utility contact strip)
- MainNav
- HeroBanner
- FeatureCardGrid
- AdmissionsBanner
- AboutSplitSection
- StatsCounter
- MediaGalleryGrid (+ filters + lightbox)
- FacultyCardGrid
- FacilityCardGrid (+ modal/drawer details)
- ContactInfoCards
- ContactForm
- MapEmbed
- SiteFooter

## 12) Data Model Suggested for Dynamic Future

Represent content as JSON/CMS-friendly objects:

- `siteMeta`
- `contactInfo`
- `socialLinks`
- `hero`
- `admissions`
- `features[]`
- `stats[]`
- `faculties[]`
- `facilities[]`
- `galleryItems[]` with categories/titles/alt paths

## 13) Recommended Build Path

1. Freeze current content and normalize business data.
2. Pick architecture (all HTML or all PHP templates).
3. Build design tokens and component CSS.
4. Recompose each page from reusable sections.
5. Move old inline CSS into component styles.
6. Re-implement interactions cleanly (no dead plugin code).
7. QA for mobile, accessibility, and broken links.
8. Deploy and run lighthouse checks.

## 14) Acceptance Criteria for “Professional Redesign Complete”

- All pages share a consistent high-quality visual system.
- Faculties page fully populated and navigable.
- No dead links (`.php/.html` mismatch resolved).
- Contact data consistent everywhere.
- Contact form functional end-to-end.
- Gallery filters and lightbox work.
- Mobile layout stable, no overflow issues.
- Basic performance + accessibility targets met.

## 15) Ready-to-Use Prompt for Another AI Tool

Use this prompt verbatim if needed:

"Redesign the Nagashree English School website as a modern, premium, mobile-first school website using the existing sitemap: Home, About, Gallery, Faculties, Facilities, Contact. Preserve core content and media intent, but rebuild layout/components with a consistent design system. Normalize all contact/address/schema data, add complete faculty listing section, keep admissions CTA prominent, keep categorized gallery with lightbox, and keep contact form + map. Remove duplicated inline CSS by creating reusable components and centralized styles. Resolve `.php` vs `.html` route mismatch by choosing one architecture. Improve accessibility (semantic headings, alt text, keyboard-safe modals) and SEO consistency. Output production-ready files with clean structure and minimal dependency bloat."
