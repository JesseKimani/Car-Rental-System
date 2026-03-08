<template>
  <div class="page">
    <!-- NAV -->
    <header :class="{ scrolled: scrolled }">
      <a href="#" class="logo">
        <div class="logo-mark">S</div>
        <span>Safaris</span>
      </a>
      <nav>
        <a href="/adminlogin" class="nav-btn outline">Admin Portal</a>
        <a href="/clientlogin" class="nav-btn outline">Client Portal</a>
        <a href="/receivedfeedback" class="nav-btn solid">Reviews</a>
      </nav>
      <button class="hamburger" @click="menuOpen = !menuOpen" aria-label="Menu">
        <span></span><span></span><span></span>
      </button>
    </header>

    <!-- MOBILE MENU -->
    <div class="mobile-menu" :class="{ open: menuOpen }">
      <a href="/adminlogin" @click="menuOpen = false">Admin Portal</a>
      <a href="/clientlogin" @click="menuOpen = false">Client Portal</a>
      <a href="/receivedfeedback" @click="menuOpen = false">Reviews</a>
    </div>

    <!-- HERO -->
    <section class="hero">
      <div class="hero-bg">
        <div class="grid-overlay"></div>
        <div class="glow glow-1"></div>
        <div class="glow glow-2"></div>
      </div>

      <div class="hero-content">
        <div class="badge">
          <span class="pulse-dot"></span>
          Available 24/7 across Kenya
        </div>

        <h1>
          Drive Your<br>
          <em>Adventure</em><br>
          <span class="outline-text">Forward.</span>
        </h1>

        <p>Premium car hire for safaris, city drives, and everything between. Handpicked fleet. Unmatched service.</p>

        <div class="cta-row">
          <a href="/clientlogin" class="cta-primary">Book a Car <span class="arrow">→</span></a>
          <a href="/receivedfeedback" class="cta-ghost">See Reviews</a>
        </div>

        <div class="stats">
          <div class="stat">
            <strong>500+</strong>
            <span>Happy Clients</span>
          </div>
          <div class="divider"></div>
          <div class="stat">
            <strong>50+</strong>
            <span>Vehicles</span>
          </div>
          <div class="divider"></div>
          <div class="stat">
            <strong>10+</strong>
            <span>Years Experience</span>
          </div>
        </div>
      </div>

      <div class="hero-visual">
        <div class="car-card">
          <div class="car-card-inner">
            <img src="/public/images/jeep.png" alt="" class="car-img" />
            <!-- <img src="/images/jeep.png" alt="Safari vehicle" class="car-img" /> -->
            <div class="car-info">
              <div class="car-info-top">
                <span class="car-tag">Featured</span>
                <span class="car-price">From KSh 8,000/day</span>
              </div>
              <h3>4x4 Safari Cruiser</h3>
              <div class="car-features">
                <span>🛣 Off-road</span>
                <span>❄️ A/C</span>
                <span>👥 7 Seats</span>
              </div>
            </div>
          </div>
        </div>

        <div class="floating-chip chip-1">
          <span>⭐</span> 4.9 Rating
        </div>
        <div class="floating-chip chip-2">
          <span class="green-dot"></span> Available Now
        </div>
      </div>

      <div class="scroll-hint">
        <div class="scroll-line"></div>
        <span>Scroll</span>
      </div>
    </section>

    <!-- FEATURES STRIP -->
    <section class="features">
      <div class="feature" v-for="f in features" :key="f.title">
        <div class="feature-icon">{{ f.icon }}</div>
        <div>
          <h4>{{ f.title }}</h4>
          <p>{{ f.desc }}</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const scrolled = ref(false);
const menuOpen = ref(false);

const features = [
  { icon: '🚗', title: 'Wide Fleet', desc: 'Sedans, SUVs, 4x4s and minibuses' },
  { icon: '📍', title: 'Nationwide', desc: 'Pick-up anywhere across Kenya' },
  { icon: '🔒', title: 'Fully Insured', desc: 'Comprehensive cover on every trip' },
  { icon: '🕐', title: '24/7 Support', desc: 'We\'re always on call for you' },
];

function onScroll() {
  scrolled.value = window.scrollY > 20;
}

onMounted(() => window.addEventListener('scroll', onScroll));
onUnmounted(() => window.removeEventListener('scroll', onScroll));
</script>

<style>


:root {
  --amber: #F5A623;
  --amber-dim: rgba(245,166,35,0.15);
  --dark: #0B0C0F;
  --dark-2: #13151A;
  --dark-3: #1C1F27;
  --border: rgba(255,255,255,0.07);
  --text: #E8E9EC;
  --muted: #6B7280;
  --font-display: 'Syne', sans-serif;
  --font-body: 'DM Sans', sans-serif;
}

.page {
  background: var(--dark);
  color: var(--text);
  font-family: var(--font-body);
  min-height: 100vh;
  overflow-x: hidden;
}

/* ── HEADER ── */
header {
  position: fixed;
  top: 0; left: 0; right: 0;
  z-index: 100;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px 60px;
  transition: all 0.3s ease;
}
header.scrolled {
  background: rgba(11,12,15,0.85);
  backdrop-filter: blur(16px);
  border-bottom: 1px solid var(--border);
  padding: 14px 60px;
}

.logo {
  display: flex; align-items: center; gap: 10px;
  text-decoration: none; color: var(--text);
  font-family: var(--font-display);
  font-weight: 700; font-size: 1.1rem;
}
.logo-mark {
  width: 34px; height: 34px;
  background: var(--amber);
  color: var(--dark);
  border-radius: 8px;
  display: grid; place-items: center;
  font-weight: 800; font-size: 1rem;
}

nav { display: flex; gap: 10px; align-items: center; }

.nav-btn {
  padding: 8px 18px;
  border-radius: 8px;
  font-family: var(--font-body);
  font-size: 0.875rem;
  font-weight: 400;
  text-decoration: none;
  transition: all 0.2s;
  cursor: pointer;
}
.nav-btn.outline {
  color: var(--muted);
  border: 1px solid transparent;
  background: none;
}
.nav-btn.outline:hover {
  color: var(--text);
  border-color: var(--border);
  background: var(--dark-3);
}
.nav-btn.solid {
  background: var(--amber);
  color: var(--dark);
  font-weight: 600;
}
.nav-btn.solid:hover { opacity: 0.88; }

.hamburger {
  display: none;
  flex-direction: column; gap: 5px;
  background: none; border: none; cursor: pointer; padding: 4px;
}
.hamburger span {
  display: block; width: 22px; height: 2px;
  background: var(--text); border-radius: 2px;
  transition: 0.3s;
}

/* ── MOBILE MENU ── */
.mobile-menu {
  display: none;
  position: fixed;
  top: 64px; left: 0; right: 0;
  background: var(--dark-2);
  border-bottom: 1px solid var(--border);
  flex-direction: column;
  padding: 16px 24px;
  gap: 4px;
  z-index: 99;
  transform: translateY(-10px);
  opacity: 0;
  transition: all 0.25s ease;
}
.mobile-menu.open {
  opacity: 1; transform: translateY(0);
}
.mobile-menu a {
  padding: 12px 16px;
  border-radius: 8px;
  color: var(--text);
  text-decoration: none;
  font-size: 0.95rem;
}
.mobile-menu a:hover { background: var(--dark-3); }

/* ── HERO ── */
.hero {
  min-height: 100vh;
  display: grid;
  grid-template-columns: 1fr 1fr;
  align-items: center;
  padding: 120px 60px 80px;
  position: relative;
  gap: 40px;
  overflow: hidden;
}

.hero-bg {
  position: absolute;
  inset: 0; z-index: 0;
  pointer-events: none;
}
/* .grid-overlay {
  position: absolute; inset: 0;
  background-image:
    linear-gradient(var(--border) 1px, transparent 1px),
    linear-gradient(90deg, var(--border) 1px, transparent 1px);
  background-size: 60px 60px;
  mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black, transparent);
} */
.glow {
  position: absolute;
  border-radius: 50%;
  filter: blur(120px);
  opacity: 0.18;
}
.glow-1 {
  width: 600px; height: 600px;
  background: var(--amber);
  top: -100px; right: -100px;
}
.glow-2 {
  width: 400px; height: 400px;
  background: #e05a2b;
  bottom: -80px; left: 100px;
}

.hero-content {
  position: relative; z-index: 1;
  display: flex; flex-direction: column;
  gap: 28px;
  animation: fadeUp 0.8s ease both;
}

.badge {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--amber-dim);
  border: 1px solid rgba(245,166,35,0.3);
  color: var(--amber);
  padding: 6px 14px;
  border-radius: 100px;
  font-size: 0.8rem;
  width: fit-content;
}
.pulse-dot {
  width: 7px; height: 7px;
  background: var(--amber);
  border-radius: 50%;
  animation: pulse 2s ease infinite;
}

h1 {
  font-family: var(--font-display);
  font-size: clamp(2.8rem, 5vw, 4.5rem);
  font-weight: 800;
  line-height: 1.05;
  letter-spacing: -1px;
}
h1 em {
  font-style: normal;
  color: var(--amber);
}
h1 .outline-text {
  -webkit-text-stroke: 2px rgba(255,255,255,0.25);
  color: transparent;
}

.hero-content p {
  color: var(--muted);
  font-size: 1.05rem;
  line-height: 1.7;
  max-width: 420px;
  font-weight: 300;
}

.cta-row {
  display: flex; align-items: center; gap: 16px;
  flex-wrap: wrap;
}
.cta-primary {
  display: inline-flex; align-items: center; gap: 8px;
  background: var(--amber);
  color: var(--dark);
  padding: 14px 28px;
  border-radius: 10px;
  font-weight: 700;
  font-family: var(--font-display);
  font-size: 0.95rem;
  text-decoration: none;
  transition: all 0.2s;
  letter-spacing: 0.3px;
}
.cta-primary:hover { opacity: 0.88; transform: translateY(-1px); }
.cta-primary .arrow { font-size: 1.1rem; transition: transform 0.2s; }
.cta-primary:hover .arrow { transform: translateX(4px); }

.cta-ghost {
  color: var(--muted);
  text-decoration: none;
  font-size: 0.9rem;
  padding: 14px 4px;
  border-bottom: 1px solid var(--border);
  transition: color 0.2s, border-color 0.2s;
}
.cta-ghost:hover { color: var(--text); border-color: var(--text); }

.stats {
  display: flex; align-items: center; gap: 24px;
  padding-top: 8px;
}
.stat { display: flex; flex-direction: column; gap: 2px; }
.stat strong {
  font-family: var(--font-display);
  font-size: 1.5rem; font-weight: 700;
  color: var(--text);
}
.stat span { font-size: 0.75rem; color: var(--muted); }
.divider { width: 1px; height: 36px; background: var(--border); }

/* ── HERO VISUAL ── */
.hero-visual {
  position: relative; z-index: 1;
  display: flex; justify-content: center;
  animation: fadeUp 0.8s 0.2s ease both;
}

.car-card {
  background: var(--dark-2);
  border: 1px solid var(--border);
  border-radius: 20px;
  overflow: hidden;
  width: 100%;
  max-width: 420px;
  box-shadow: 0 40px 80px rgba(0,0,0,0.5);
  transition: transform 0.4s ease;
}
.car-card:hover { transform: translateY(-6px); }

.car-card-inner { padding: 0; }

.car-img {
  width: 100%;
  height: 220px;
  object-fit: cover;
  display: block;
  background: var(--dark-3);
}

.car-info { padding: 20px 24px 24px; }
.car-info-top {
  display: flex; justify-content: space-between; align-items: center;
  margin-bottom: 10px;
}
.car-tag {
  background: var(--amber-dim);
  color: var(--amber);
  font-size: 0.72rem; font-weight: 600;
  padding: 3px 10px; border-radius: 100px;
  text-transform: uppercase; letter-spacing: 0.5px;
}
.car-price { font-size: 0.8rem; color: var(--muted); }

.car-info h3 {
  font-family: var(--font-display);
  font-size: 1.15rem; font-weight: 700;
  margin-bottom: 12px;
}
.car-features {
  display: flex; gap: 10px; flex-wrap: wrap;
}
.car-features span {
  background: var(--dark-3);
  border: 1px solid var(--border);
  padding: 4px 12px;
  border-radius: 6px;
  font-size: 0.78rem; color: var(--muted);
}

.floating-chip {
  position: absolute;
  background: var(--dark-2);
  border: 1px solid var(--border);
  padding: 8px 14px;
  border-radius: 100px;
  font-size: 0.78rem;
  display: flex; align-items: center; gap: 6px;
  backdrop-filter: blur(8px);
  box-shadow: 0 8px 24px rgba(0,0,0,0.3);
  white-space: nowrap;
}
.chip-1 { top: -14px; left: -20px; animation: float 3s ease-in-out infinite; }
.chip-2 { bottom: 30px; right: -20px; animation: float 3s 1.5s ease-in-out infinite; }
.green-dot {
  width: 7px; height: 7px;
  background: #4ade80;
  border-radius: 50%;
  animation: pulse 2s ease infinite;
}

/* ── SCROLL HINT ── */
.scroll-hint {
  position: absolute;
  bottom: 30px; left: 60px;
  display: flex; align-items: center; gap: 10px;
  color: var(--muted); font-size: 0.75rem;
  z-index: 1;
}
.scroll-line {
  width: 40px; height: 1px;
  background: var(--muted);
  position: relative; overflow: hidden;
}
.scroll-line::after {
  content: '';
  position: absolute; inset: 0;
  background: var(--amber);
  transform: translateX(-100%);
  animation: slide 2s ease-in-out infinite;
}

/* ── FEATURES ── */
.features {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  border-top: 1px solid var(--border);
  border-bottom: 1px solid var(--border);
}
.feature {
  display: flex; align-items: center; gap: 16px;
  padding: 32px 40px;
  border-right: 1px solid var(--border);
  transition: background 0.2s;
}
.feature:last-child { border-right: none; }
.feature:hover { background: var(--dark-2); }
.feature-icon { font-size: 1.6rem; flex-shrink: 0; }
.feature h4 {
  font-family: var(--font-display);
  font-size: 0.9rem; font-weight: 700;
  margin-bottom: 3px;
}
.feature p { font-size: 0.78rem; color: var(--muted); line-height: 1.5; }

/* ── ANIMATIONS ── */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(24px); }
  to   { opacity: 1; transform: translateY(0); }
}
@keyframes pulse {
  0%, 100% { opacity: 1; transform: scale(1); }
  50%       { opacity: 0.5; transform: scale(1.3); }
}
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50%       { transform: translateY(-8px); }
}
@keyframes slide {
  0%   { transform: translateX(-100%); }
  50%  { transform: translateX(0); }
  100% { transform: translateX(100%); }
}

/* ── RESPONSIVE ── */
@media (max-width: 900px) {
  header { padding: 16px 24px; }
  header.scrolled { padding: 12px 24px; }
  nav { display: none; }
  .hamburger { display: flex; }
  .mobile-menu { display: flex; }

  .hero {
    grid-template-columns: 1fr;
    padding: 100px 24px 60px;
    text-align: center;
  }
  .badge { margin: 0 auto; }
  .hero-content p { margin: 0 auto; }
  .cta-row { justify-content: center; }
  .stats { justify-content: center; }
  .hero-visual { max-width: 380px; margin: 0 auto; }
  .chip-1, .chip-2 { display: none; }
  .scroll-hint { display: none; }

  .features {
    grid-template-columns: 1fr 1fr;
  }
  .feature { border-right: none; border-bottom: 1px solid var(--border); }
  .feature:nth-child(odd) { border-right: 1px solid var(--border); }
}

@media (max-width: 500px) {
  .features { grid-template-columns: 1fr; }
  .feature:nth-child(odd) { border-right: none; }
}
</style>