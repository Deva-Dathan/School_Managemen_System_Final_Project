<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tag
  -->
  <link rel="icon" href="assets/images/school_logo.png" type="image/x-icon">
  <title>GHSS - The Autonomous School</title>
  <meta name="title" content="GHSS - The Autonomous School">
  <meta name="description" content="This is an autonomous education portal">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="../assets/images/school_logo.png" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@400;500;600;700;800&family=Poppins:wght@400;500&display=swap"
    rel="stylesheet">

  <!-- 
    - preload landing_images
  -->
  <link rel="preload" as="image" href="./assets/landing_images/hero-bg.svg">
  <link rel="preload" as="image" href="./assets/landing_images/hero-banner-1.jpg">
  <link rel="preload" as="image" href="./assets/landing_images/hero-banner-2.jpg">
  <link rel="preload" as="image" href="./assets/landing_images/hero-shape-1.svg">
  <link rel="preload" as="image" href="./assets/landing_images/hero-shape-2.png">

  <style>
    
:root {
  --selective-yellow: hsl(42, 94%, 55%);
  --eerie-black-1: hsl(0, 0%, 9%);
  --eerie-black-2: hsl(180, 3%, 7%);
  --quick-silver: hsl(0, 0%, 65%);
  --radical-red: hsl(351, 83%, 61%);
  --light-gray: hsl(0, 0%, 80%);
  --isabelline: hsl(36, 33%, 94%);
  --gray-x-11: hsl(0, 0%, 73%);
  --kappel_15: hsla(170, 75%, 41%, 0.15);
  --platinum: hsl(0, 0%, 90%);
  --gray-web: hsl(0, 0%, 50%);
  --black_80: hsla(0, 0%, 0%, 0.8);
  --white_50: hsla(0, 0%, 100%, 0.5);
  --black_50: hsla(0, 0%, 0%, 0.5);
  --black_30: hsla(0, 0%, 0%, 0.3);
  --kappel: hsl(170, 75%, 41%);
  --white: hsl(0, 0%, 100%);

  /**
   * gradient color
   */

  --gradient: linear-gradient(-90deg,hsl(151, 58%, 46%) 0%,hsl(170, 75%, 41%) 100%);

  /**
   * typography
   */

  --ff-league_spartan: 'League Spartan', sans-serif;
  --ff-poppins: 'Poppins', sans-serif; 

  --fs-1: 4.2rem;
  --fs-2: 3.2rem;
  --fs-3: 2.3rem;
  --fs-4: 1.8rem;
  --fs-5: 1.5rem;
  --fs-6: 1.1rem;
  --fs-7: 1.3rem;

  --fw-500: 500;
  --fw-600: 600;

  /**
   * spacing
   */

  --section-padding: 75px;

  /**
   * shadow
   */

  --shadow-1: 0 6px 15px 0 hsla(0, 0%, 0%, 0.05);
  --shadow-2: 0 10px 30px hsla(0, 0%, 0%, 0.06);
  --shadow-3: 0 10px 50px 0 hsla(220, 53%, 22%, 0.1);

  /**
   * radius
   */

  --radius-pill: 500px;
  --radius-circle: 50%;
  --radius-3: 3px;
  --radius-5: 5px;
  --radius-10: 10px;

  /**
   * transition
   */

  --transition-1: 0.25s ease;
  --transition-2: 0.5s ease;
  --cubic-in: cubic-bezier(0.51, 0.03, 0.64, 0.28);
  --cubic-out: cubic-bezier(0.33, 0.85, 0.4, 0.96);

}





/*-----------------------------------*\
  #RESET
\*-----------------------------------*/

*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

li { list-style: none; }

a,
img,
span,
data,
input,
button,
ion-icon { display: block; }

a {
  color: inherit;
  text-decoration: none;
}

img { height: auto; }

input,
button {
  background: none;
  border: none;
  font: inherit;
}

input { width: 100%; }

button { cursor: pointer; }

ion-icon { pointer-events: none; }

address { font-style: normal; }

html {
  font-family: var(--ff-poppins);
  font-size: 10px;
  scroll-behavior: smooth;
}

body {
  background-color: var(--white);
  color: var(--gray-web);
  font-size: 1.6rem;
  line-height: 1.75;
}

:focus-visible { outline-offset: 4px; }

::-webkit-scrollbar { width: 10px; }

::-webkit-scrollbar-track { background-color: hsl(0, 0%, 98%); }

::-webkit-scrollbar-thumb { background-color: hsl(0, 0%, 80%); }

::-webkit-scrollbar-thumb:hover { background-color: hsl(0, 0%, 70%); }





/*-----------------------------------*\
  #REUSED STYLE
\*-----------------------------------*/

.container { padding-inline: 15px; }

.section { padding-block: var(--section-padding); }

.shape {
  position: absolute;
  display: none;
}

.has-bg-image {
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
}

.h1,
.h2,
.h3 {
  color: var(--eerie-black-1);
  font-family: var(--ff-league_spartan);
  line-height: 1;
}

.h1,
.h2 { font-weight: var(--fw-600); }

.h1 { font-size: var(--fs-1); }

.h2 { font-size: var(--fs-2); }

.h3 {
  font-size: var(--fs-3);
  font-weight: var(--fw-500);
}

.section-title {
  --color: var(--radical-red);
  text-align: center;
}

.section-title .span {
  display: inline-block;
  color: var(--color);
}

.btn {
  background-color: var(--kappel);
  color: var(--white);
  font-family: var(--ff-league_spartan);
  font-size: var(--fs-4);
  display: flex;
  align-items: center;
  gap: 7px;
  max-width: max-content;
  padding: 10px 20px;
  border-radius: var(--radius-5);
  overflow: hidden;
}

.has-before,
.has-after {
  position: relative;
  z-index: 1;
}

.has-before::before,
.has-after::after {
  position: absolute;
  content: "";
}

.btn::before {
  inset: 0;
  background-image: var(--gradient);
  z-index: -1;
  border-radius: inherit;
  transform: translateX(-100%);
  transition: var(--transition-2);
}

.btn:is(:hover, :focus)::before { transform: translateX(0); }

.img-holder {
  aspect-ratio: var(--width) / var(--height);
  background-color: var(--light-gray);
  overflow: hidden;
}

.img-cover {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.section-subtitle {
  font-size: var(--fs-5);
  text-transform: uppercase;
  font-weight: var(--fw-500);
  letter-spacing: 1px;
  text-align: center;
  margin-block-end: 15px;
}

.section-text {
  font-size: var(--fs-5);
  text-align: center;
  margin-block: 15px 25px;
}

.grid-list {
  display: grid;
  gap: 30px;
}

.category-card,
.stats-card { background-color: hsla(var(--color), 0.1); }

:is(.course, .blog) .section-title { margin-block-end: 40px; }





/*-----------------------------------*\
  #HEADER
\*-----------------------------------*/

.header .btn { display: none; }

.header {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  background-color: var(--white);
  box-shadow: var(--shadow-1);
  z-index: 4;
}

.header.active { position: fixed; }

.header .container,
.header-actions,
.navbar .wrapper {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 6px;
}

.header-action-btn,
.nav-close-btn {
  position: relative;
  color: var(--eerie-black-1);
  font-size: 20px;
  transition: var(--transition-1);
}

.header-action-btn:is(:hover, :focus) { color: var(--kappel); }

.header-action-btn .btn-badge {
  position: absolute;
  top: -10px;
  right: -10px;
  background-color: var(--kappel);
  color: var(--white);
  font-family: var(--ff-league_spartan);
  font-size: var(--fs-6);
  min-width: 20px;
  height: 20px;
  border-radius: var(--radius-circle);
}

.navbar {
  position: fixed;
  top: 0;
  left: -320px;
  background-color: var(--white);
  width: 100%;
  max-width: 320px;
  height: 100%;
  z-index: 2;
  transition: 0.25s var(--cubic-in);
}

.navbar.active {
  transform: translateX(320px);
  transition: 0.5s var(--cubic-out);
}

.navbar .wrapper {
  padding: 15px 20px;
  border-block-end: 1px solid var(--platinum);
}

.nav-close-btn {
  background-color: var(--white);
  box-shadow: var(--shadow-2);
  padding: 8px;
  border-radius: var(--radius-circle);
}

.nav-close-btn:is(:hover, :focus) {
  background-color: var(--kappel);
  color: var(--white);
}

.navbar-list { padding: 15px 20px; }

.navbar-item:not(:last-child) { border-block-end: 1px solid var(--platinum); }

.navbar-link {
  padding-block: 8px;
  font-weight: var(--fw-500);
  transition: var(--transition-1);
}

.navbar-link:is(:hover, :focus) { color: var(--kappel); }

.overlay {
  position: fixed;
  inset: 0;
  background-color: var(--black_80);
  pointer-events: none;
  opacity: 0;
  z-index: 1;
  transition: var(--transition-1);
}

.overlay.active {
  opacity: 1;
  pointer-events: all;
}





/*-----------------------------------*\
  #HERO
\*-----------------------------------*/

.hero { padding-block-start: calc(var(--section-padding) + 80px); }

.hero .container {
  display: grid;
  gap: 40px;
}

.hero-text {
  color: var(--eerie-black-1);
  font-size: var(--fs-4);
  text-align: center;
  margin-block: 18px 20px;
}

.hero .btn { margin-inline: auto; }

.hero-banner {
  display: grid;
  grid-template-columns: 1fr 0.8fr;
  align-items: flex-start;
  gap: 30px;
}

.hero-banner .img-holder.one {
  border-top-right-radius: 70px;
  border-bottom-left-radius: 110px;
}

.hero-banner .img-holder.two {
  border-top-left-radius: 50px;
  border-bottom-right-radius: 90px;
}





/*-----------------------------------*\
  #CATEGORY
\*-----------------------------------*/

.category .section-subtitle { color: var(--radical-red); }

.category .section-title { --color: var(--kappel); }

.category .section-text { margin-block-end: 40px; }

.category-card {
  padding: 50px 30px;
  text-align: center;
  border-radius: var(--radius-5);
}

.category-card .card-icon {
  background-color: hsla(var(--color), 0.1);
  width: 80px;
  height: 80px;
  display: grid;
  place-items: center;
  border-radius: var(--radius-circle);
  margin-inline: auto;
  margin-block-end: 30px;
}

.category-card .card-text {
  color: var(--eerie-black-1);
  font-size: var(--fs-5);
  margin-block: 15px 25px;
}

.category-card .card-badge {
  background-color: hsla(var(--color), 0.1);
  color: hsl(var(--color));
  font-size: var(--fs-5);
  font-weight: var(--fw-500);
  padding: 2px 18px;
  max-width: max-content;
  margin-inline: auto;
  border-radius: var(--radius-5);
}





/*-----------------------------------*\
  #ABOUT
\*-----------------------------------*/

.about {
  padding-block-start: 0;
  overflow: hidden;
}

.about .container {
  display: grid;
  gap: 30px;
}

.about-banner {
  position: relative;
  z-index: 1;
}

.about-banner .img-holder { border-radius: var(--radius-10); }

.about-shape-2 {
  display: block;
  bottom: -100px;
  left: -60px;
  animation: bounce 2.5s infinite;
}

@keyframes bounce {
  0%,
  20%,
  50%,
  80%,
  100% { transform: translateY(0); }

  40% { transform: translateY(-30px); }

  60% { transform: translateY(-15px); }
}

.about :is(.section-subtitle, .section-title, .section-text) {
  text-align: left;
}

.about-item {
  margin-block: 15px;
  display: flex;
  align-items: center;
  gap: 15px;
}

.about-item ion-icon {
  color: var(--selective-yellow);
  font-size: 20px;
  --ionicon-stroke-width: 50px;
}

.about-item .span {
  color: var(--eerie-black-1);
  font-family: var(--ff-league_spartan);
}





/*-----------------------------------*\
  #COURSE
\*-----------------------------------*/

.course { background-color: var(--isabelline); }

.course-card {
  position: relative;
  background-color: var(--white);
  border-radius: var(--radius-5);
  overflow: hidden;
}

.course-card .img-cover { transition: var(--transition-2); }

.course-card:is(:hover, :focus-within) .img-cover { transform: scale(1.1); }

.course-card :is(.abs-badge, .badge) {
  font-family: var(--ff-league_spartan);
  border-radius: var(--radius-3);
}

.course-card .abs-badge {
  position: absolute;
  top: 10px;
  right: 10px;
  background-color: var(--selective-yellow);
  color: var(--white);
  display: flex;
  align-items: center;
  gap: 5px;
  line-height: 1;
  padding: 6px 8px;
  padding-block-end: 3px;
}

.course-card .abs-badge ion-icon {
  font-size: 18px;
  margin-block-end: 5px;
  --ionicon-stroke-width: 50px;
}

.course-card .card-content { padding: 25px; }

.course-card .badge {
  background-color: var(--kappel_15);
  max-width: max-content;
  color: var(--kappel);
  line-height: 25px;
  padding-inline: 10px;
}

.course-card .card-title {
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 2;
  overflow: hidden;
  margin-block: 15px 8px;
  transition: var(--transition-1);
}

.course-card .card-title:is(:hover, :focus) { color: var(--kappel); }

.course-card :is(.wrapper, .rating-wrapper, .card-meta-list, .card-meta-item) {
  display: flex;
  align-items: center;
}

.course-card .wrapper { gap: 10px; }

.course-card .rating-wrapper { gap: 3px; }

.course-card .rating-wrapper ion-icon { color: var(--selective-yellow); }

.course-card .rating-text {
  color: var(--eerie-black-1);
  font-size: var(--fs-6);
  font-weight: var(--fw-500);
}

.course-card .price {
  color: var(--radical-red);
  font-family: var(--ff-league_spartan);
  font-size: var(--fs-4);
  font-weight: var(--fw-600);
  margin-block: 8px 15px;
}

.course-card .card-meta-list { flex-wrap: wrap; }

.course-card .card-meta-item {
  position: relative;
  gap: 5px;
}

.course-card .card-meta-item:not(:last-child)::after {
  content: "|";
  display: inline-block;
  color: var(--platinum);
  padding-inline: 10px;
}

.course-card .card-meta-item ion-icon {
  color: var(--quick-silver);
  --ionicon-stroke-width: 50px;
}

.course-card .card-meta-item .span {
  color: var(--eerie-black-1);
  font-size: var(--fs-7);
}

.course .btn {
  margin-inline: auto;
  margin-block-start: 60px;
}





/*-----------------------------------*\
  #VIDEO
\*-----------------------------------*/

.video {
  background-size: contain;
  background-position: center top;
}

.video-banner {
  position: relative;
  border-top-right-radius: 80px;
  border-bottom-left-radius: 120px;
}

.video .play-btn {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: var(--radical-red);
  font-size: 30px;
  padding: 16px;
  color: var(--white);
  border-radius: var(--radius-circle);
  box-shadow: 0 0 0 0 var(--white_50);
  z-index: 1;
  animation: pulse 3s ease infinite;
}

@keyframes pulse {
  0% { box-shadow: 0 0 0 0 var(--white_50); }
  100% { box-shadow: 0 0 0 20px transparent; }
}

.video-banner::after {
  inset: 0;
  background-color: var(--black_30);
}





/*-----------------------------------*\
  #STATS
\*-----------------------------------*/

.stats-card {
  text-align: center;
  padding: 25px;
  border-radius: var(--radius-10);
}

.stats-card :is(.card-title, .card-text) { font-family: var(--ff-league_spartan); }

.stats-card .card-title {
  color: hsl(var(--color));
  font-size: var(--fs-2);
  line-height: 1.1;
}

.stats-card .card-text {
  color: var(--eerie-black-1);
  text-transform: uppercase;
}





/*-----------------------------------*\
  #BLOG
\*-----------------------------------*/

.blog-card .card-banner { border-radius: var(--radius-10); }

.blog-card .card-banner .img-cover { transition: var(--transition-2); }

.blog-card .card-banner::after {
  inset: 0;
  background-color: var(--black_50);
  opacity: 0;
  transition: var(--transition-1);
}

.blog-card:is(:hover, :focus-within) .card-banner .img-cover { transform: scale(1.1); }

.blog-card:is(:hover, :focus-within) .card-banner::after { opacity: 1; }

.blog-card .card-content {
  position: relative;
  margin-inline: 15px;
  background-color: var(--white);
  padding: 20px;
  border-radius: var(--radius-10);
  box-shadow: var(--shadow-3);
  margin-block-start: -100px;
  z-index: 1;
}

.blog-card .card-btn {
  position: absolute;
  top: -40px;
  right: 30px;
  background-color: var(--kappel);
  color: var(--white);
  font-size: 20px;
  padding: 20px;
  border-radius: var(--radius-circle);
  transition: var(--transition-1);
  opacity: 0;
}

.blog-card .card-btn:is(:hover, :focus) { background-color: var(--radical-red); }

.blog-card:is(:hover, :focus-within) .card-btn {
  opacity: 1;
  transform: translateY(10px);
}

.blog-card :is(.card-meta-item, .card-text, .card-subtitle) {
  font-size: var(--fs-5);
}

.blog-card .card-subtitle { text-transform: uppercase; }

.blog-card .card-title {
  margin-block: 10px 15px;
  transition: var(--transition-1);
}

.blog-card .card-title:is(:hover, :focus) { color: var(--kappel); }

.blog-card :is(.card-meta-list, .card-meta-item) { display: flex; }

.blog-card .card-meta-list {
  flex-wrap: wrap;
  gap: 10px 20px;
  margin-block-end: 20px;
}

.blog-card .card-meta-item {
  gap: 10px;
  align-items: center;
  color: var(--eerie-black-1);
}

.blog-card .card-meta-item ion-icon {
  color: var(--kappel);
  font-size: 18px;
  --ionicon-stroke-width: 40px;
}





/*-----------------------------------*\
  #FOOTER
\*-----------------------------------*/

.footer {
  background-repeat: no-repeat;
  background-color: var(--eerie-black-2);
  color: var(--gray-x-11);
  font-size: var(--fs-5);
}

.footer-top {
  display: grid;
  gap: 30px;
}

.footer-brand-text { margin-block: 20px; }

.footer-brand .wrapper {
  display: flex;
  gap: 5px;
}

.footer-brand .wrapper .span { font-weight: var(--fw-500); }

.footer-link { transition: var(--transition-1); }

.footer-link:is(:hover, :focus) { color: var(--kappel); }

.footer-list-title {
  color: var(--white);
  font-family: var(--ff-league_spartan);
  font-size: var(--fs-3);
  font-weight: var(--fw-600);
  margin-block-end: 10px;
}

.footer-list .footer-link { padding-block: 5px; }

.newsletter-form { margin-block: 20px 35px; }

.newsletter-form .input-field {
  background-color: var(--white);
  padding: 12px;
  border-radius: var(--radius-5);
  margin-block-end: 20px;
}

.newsletter-form .btn {
  min-width: 100%;
  justify-content: center;
}

.social-list {
  display: flex;
  gap: 25px;
}

.social-link { font-size: 20px; }

.footer-bottom {
  border-block-start: 1px solid var(--eerie-black-1);
  padding-block: 30px;
}

.copyright { text-align: center; }

.copyright-link {
  color: var(--kappel);
  display: inline-block;
}





/*-----------------------------------*\
  #BACK TO TOP
\*-----------------------------------*/

.back-top-btn {
  position: fixed;
  bottom: 40px;
  right: 30px;
  background-color: var(--kappel);
  color: var(--white);
  font-size: 20px;
  padding: 15px;
  border-radius: var(--radius-circle);
  z-index: 3;
  opacity: 0;
  pointer-events: none;
  transition: var(--transition-1);
}

.back-top-btn.active {
  transform: translateY(10px);
  opacity: 1;
  pointer-events: all;
}





/*-----------------------------------*\
  #MEDIA QUERIES
\*-----------------------------------*/

/**
 * responsive for large than 575px screen
 */

@media (min-width: 575px) {

  /**
   * REUSED STYLE
   */

  .container {
    max-width: 520px;
    width: 100%;
    margin-inline: auto;
  }

  .grid-list { grid-template-columns: 1fr 1fr; }

  :is(.course, .blog) .grid-list { grid-template-columns: 1fr; }



  /**
   * HEADER
   */

  .header .container { max-width: unset; }

  .header-actions { gap: 30px; }



  /**
   * HERO
   */

  .hero-banner { grid-template-columns: 1fr 0.9fr; }



  /**
   * VIDEO
   */

  .video .play-btn { padding: 25px; }



  /**
   * STATS
   */

  .stats-card { padding: 40px 30px; }



  /**
   * FOOTER
   */

  .footer-brand,
  .footer-list:last-child { grid-column: 1 / 3; }

  .newsletter-form {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .newsletter-form .input-field { margin-block-end: 0; }

  .newsletter-form .btn { min-width: max-content; }

}





/**
 * responsive for large than 768px screen
 */

@media (min-width: 768px) {

  /**
   * CUSTOM PROPERTY
   */

  :root {

    /**
     * typography
     */

    --fs-1: 4.6rem;
    --fs-2: 3.8rem;

  }



  /**
   * REUSED STYLE
   */

  .container { max-width: 720px; }

  .btn { padding: 15px 30px; }

  :is(.course, .blog) .grid-list { grid-template-columns: 1fr 1fr; }



  /**
   * HEADER
   */

  .header .container { padding-inline: 30px; }

  .header .btn {
    display: flex;
    padding: 10px 30px;
    margin-inline: 20px;
  }



  /**
   * HERO
   */

  .hero { padding-block-start: calc(var(--section-padding) + 90px); }

  .hero .container { gap: 50px; }

  .hero-text { margin-block-end: 30px; }

  .hero-banner {
    position: relative;
    z-index: 1;
  }

  .hero-banner .img-holder { max-width: max-content; }

  .hero-banner .img-holder.one { justify-self: flex-end; }

  .hero-banner .img-holder.two { margin-block-start: 100px; }

  .hero-shape-1 {
    display: block;
    position: absolute;
    bottom: -40px;
    left: -10px;
  }



  /**
   * ABOUT
   */

  .about { padding-block-start: 50px; }

  .about-banner {
    padding: 60px;
    padding-inline-end: 0;
  }

  .about-banner .img-holder {
    max-width: max-content;
    margin-inline: auto;
  }

  .about-shape-1 {
    display: block;
    top: -40px;
    right: -70px;
  }



  /**
   * FOOTER
   */

  .footer-brand,
  .footer-list:last-child { grid-column: auto; }

  .newsletter-form .btn { padding-block: 10px; }

}





/**
 * responsive for large than 992px screen
 */

@media (min-width: 992px) {

  /**
   * CUSTOM PROPERTY
   */

  :root {

    /**
     * typography
     */

    --fs-1: 5.5rem;
    --fs-2: 4.5rem;

  }



  /**
   * REUSED STYLE
   */

  .container { max-width: 960px; }

  .grid-list { grid-template-columns: repeat(4, 1fr); }

  :is(.course, .blog) .grid-list { grid-template-columns: repeat(3, 1fr); }



  /**
   * HERO
   */

  .hero .container {
    grid-template-columns: 1fr 1fr;
    align-items: center;
  }

  .hero .section-title,
  .hero-text { text-align: left; }

  .hero .btn { margin-inline: 0; }



  /**
   * ABOUT
   */

  .about .container {
    grid-template-columns: 1fr 0.6fr;
    align-items: center;
    gap: 60px;
  }



  /**
   * VIDEO
   */

  .video-banner {
    max-width: 75%;
    margin-inline: auto;
  }



  /**
   * FOOTER
   */

  .footer .grid-list { grid-template-columns: 1fr 0.6fr 0.6fr 1.2fr; }

}





/**
 * responsive for large than 1200px screen
 */

@media (min-width: 1200px) {

  /**
   * CUSTOM PROPERTY
   */

  :root {

    /**
     * typography
     */

    --fs-1: 6.5rem;

    /**
     * spacing
     */

    --section-padding: 120px;

  }



  /**
   * REUSED STYLE
   */

  .container { max-width: 1185px; }

  .shape { display: block; }

  .about-content,
  .video-card,
  .blog { position: relative; }



  /**
   * HEADER
   */

  .header-action-btn:last-child,
  .navbar .wrapper,
  .overlay { display: none; }

  .header.active {
    transform: translateY(-100%);
    animation: slideIn 0.5s ease forwards;
  }

  @keyframes slideIn {
    0% { transform: translateY(-100%); }
    100% { transform: translateY(0); }
  }

  .navbar,
  .navbar.active { all: unset; }

  .navbar-list {
    display: flex;
    gap: 50px;
    padding: 0;
  }

  .navbar-item:not(:last-child) { border-block-end: none; }

  .navbar-link {
    color: var(--eerie-black-1);
    padding-block: 20px;
  }

  .header .btn { margin-inline-end: 0; }



  /**
   * HERO
   */

  .hero { padding-block-start: calc(var(--section-padding) + 120px); }

  .hero .container { gap: 80px; }

  .hero-shape-2 {
    top: -80px;
    z-index: -1;
  }



  /**
   * ABOUT
   */

  .about .container { gap: 110px; }

  .about-banner .img-holder { margin-inline: 0; }

  .about-shape-3 {
    top: -20px;
    left: -100px;
    z-index: -1;
  }

  .about-content { z-index: 1; }

  .about-shape-4 {
    top: 30px;
    right: -60px;
    z-index: -1;
  }



  /**
   * VIDEO
   */

  .video-shape-1 {
    top: -50px;
    left: 0;
  }

  .video-shape-2 {
    top: -80px;
    right: 120px;
    z-index: 1;
  }



  /**
   * BLOG
   */

  .blog-shape {
    top: 0;
    left: 0;
  }

}

.parallax {
    position: relative;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    overflow: hidden;
}

.parallax::after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Adjust opacity as needed */
    z-index: 1;
}

.container {
    position: relative;
    z-index: 2; /* Ensure content appears above the overlay */
}

/* Ensure text wrapping */
.section-title {
    white-space: normal;
}

.typing-line {
    overflow: hidden; /* Hide overflowing text */
    white-space: nowrap; /* Prevent line breaks */
    margin: 0; /* Remove default margin */
    padding: 0; /* Remove default padding */
    display: inline-block;
    opacity: 0; /* Initially hide text */
}

.typing-line.typing {
    animation: typing 0.5s forwards; /* Adjust animation duration here */
}

@keyframes typing {
    from { opacity: 0; }
    to { opacity: 1; }
}



  </style>
</head>

<body id="top">

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="assets/images/school_logo.png" width="70" height="50" alt="GHSS Logo">
      </a>

      <nav class="navbar" data-navbar>

        <div class="wrapper">
          <a href="#" class="logo">
            <img src="" width="162" height="50" alt="EduWeb logo">
          </a>

          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="#home" class="navbar-link" data-nav-link>Home</a>
          </li>

          <li class="navbar-item">
            <a href="Allotment_Cell/allot_login.php" class="navbar-link" style="color:red; font-weight: bold;" data-nav-link>2024 ADMISSION</a>
          </li>

        </ul>

      </nav>

      <div class="header-actions">

        <a href="login_page.php" class="btn has-before">
          <span class="span">Existing Login</span>
        </a>

        <button class="header-action-btn" aria-label="open menu" data-nav-toggler>
          <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
        </button>

      </div>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero has-bg-image" id="home" aria-label="home">
    <div class="container">
        <div class="hero-content">

        <h1 class="h1 section-title">
    <span class="typing-line">The Best</span><br>
    <span class="typing-line">Autonomous</span><br>
    <span class="typing-line span">School For Building Your</span><br>
    <span class="typing-line">Career</span>
</h1>



<script>

// Function to trigger the typing animation for each line
function startTypingAnimation() {
    var lines = document.querySelectorAll('.typing-line');

    lines.forEach(function(line, index) {
        setTimeout(function() {
            line.style.display = 'inline-block'; // Ensure line is visible before animation
            line.classList.add('typing');
        }, index * 1000); // Adjust delay between lines here (5000ms = 5s)
    });
}

// Start typing animation when the document is ready
document.addEventListener('DOMContentLoaded', startTypingAnimation);


</script>



            <p class="hero-text">
                Educating tomorrow's leaders with autonomous innovation.
            </p>
            <a href="#" class="btn has-before">
                <span class="span">Find courses</span>
                <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
        </div>
        <figure class="hero-banner">
            <div class="img-holder one" style="--width: 270; --height: 300;">
                <img src="./assets/landing_images/hero-banner-1.jpg" width="270" height="300" alt="hero banner" class="img-cover">
            </div>
            <div class="img-holder two" style="--width: 240; --height: 370;">
                <img src="./assets/landing_images/hero-banner-2.jpg" width="240" height="370" alt="hero banner" class="img-cover">
            </div>
            <img src="./assets/landing_images/hero-shape-2.png" width="622" height="551" alt="" class="shape hero-shape-2">
        </figure>
    </div>
</section>






    </article>
  </main>







  <!-- 
    - #BACK TO TOP
  -->

  <a href="#top" class="back-top-btn" aria-label="back top top" data-back-top-btn>
    <ion-icon name="chevron-up" aria-hidden="true"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
<script>
  'use strict';



/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navbar = document.querySelector("[data-navbar]");
const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const navLinks = document.querySelectorAll("[data-nav-link]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
}

addEventOnElem(navTogglers, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  overlay.classList.remove("active");
}

addEventOnElem(navLinks, "click", closeNavbar);



/**
 * header active when scroll down to 100px
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

const activeElem = function () {
  if (window.scrollY > 100) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", activeElem);
</script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>