@extends('layouts.app')

@section('title', __('Badges'))

@section('content')




  <div class="d-flex gap-2 py-3">
    <span class="badge text-bg-primary rounded-pill">Primary</span>
    <span class="badge text-bg-secondary rounded-pill">Secondary</span>
    <span class="badge text-bg-success rounded-pill">Success</span>
    <span class="badge text-bg-danger rounded-pill">Danger</span>
    <span class="badge text-bg-warning rounded-pill">Warning</span>
    <span class="badge text-bg-info rounded-pill">Info</span>
    <span class="badge text-bg-light rounded-pill">Light</span>
    <span class="badge text-bg-dark rounded-pill">Dark</span>
  </div>



  <div class="d-flex gap-2 py-3">
    <span class="badge bg-primary-subtle text-primary-emphasis rounded-pill">Primary</span>
    <span class="badge bg-secondary-subtle text-secondary-emphasis rounded-pill">Secondary</span>
    <span class="badge bg-success-subtle text-success-emphasis rounded-pill">Success</span>
    <span class="badge bg-danger-subtle text-danger-emphasis rounded-pill">Danger</span>
    <span class="badge bg-warning-subtle text-warning-emphasis rounded-pill">Warning</span>
    <span class="badge bg-info-subtle text-info-emphasis rounded-pill">Info</span>
    <span class="badge bg-light-subtle text-light-emphasis rounded-pill">Light</span>
    <span class="badge bg-dark-subtle text-dark-emphasis rounded-pill">Dark</span>
  </div>



  <div class="d-flex gap-2 py-3">
    <span class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis rounded-pill">Primary</span>
    <span class="badge bg-secondary-subtle border border-secondary-subtle text-secondary-emphasis rounded-pill">Secondary</span>
    <span class="badge bg-success-subtle border border-success-subtle text-success-emphasis rounded-pill">Success</span>
    <span class="badge bg-danger-subtle border border-danger-subtle text-danger-emphasis rounded-pill">Danger</span>
    <span class="badge bg-warning-subtle border border-warning-subtle text-warning-emphasis rounded-pill">Warning</span>
    <span class="badge bg-info-subtle border border-info-subtle text-info-emphasis rounded-pill">Info</span>
    <span class="badge bg-light-subtle border border-light-subtle text-light-emphasis rounded-pill">Light</span>
    <span class="badge bg-dark-subtle border border-dark-subtle text-dark-emphasis rounded-pill">Dark</span>
  </div>



  <div class="d-flex gap-2 py-3">
    <span class="badge d-flex align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Primary
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-secondary-subtle border border-secondary-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Secondary
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Success
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Danger
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Warning
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-info-emphasis bg-info-subtle border border-info-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Info
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-dark-emphasis bg-light-subtle border border-dark-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Light
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-dark-emphasis bg-dark-subtle border border-dark-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">Dark
    </span>
  </div>

  <div class="d-flex gap-2 py-3">
    <span class="badge d-flex p-2 align-items-center text-bg-primary rounded-pill">
      <span class="px-1">Primary</span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex p-2 align-items-center text-primary-emphasis bg-primary-subtle rounded-pill">
      <span class="px-1">Primary</span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex p-2 align-items-center text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
      <span class="px-1">Primary</span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
  </div>



  <div class="d-flex gap-2 py-3">
    <span class="badge d-flex align-items-center p-1 pe-2 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Primary
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-secondary-emphasis bg-secondary-subtle border border-secondary-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Secondary
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Success
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Danger
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Warning
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-info-emphasis bg-info-subtle border border-info-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Info
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-light-emphasis bg-light-subtle border border-dark-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Light
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
    <span class="badge d-flex align-items-center p-1 pe-2 text-dark-emphasis bg-dark-subtle border border-dark-subtle rounded-pill">
      <img class="rounded-circle me-1" width="24" height="24" src="https://github.com/mdo.png" alt="">
      Dark
      <span class="vr mx-2"></span>
      <a href="#"><span class="mdi mdi-close-circle text-lg"></span></a>
    </span>
  </div>

  <style>

.badge > a {
  color: inherit;
}

.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }

  </style>

<script>
    /*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2024 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    if (theme === 'auto') {
      document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')

    if (!themeSwitcher) {
      return
    }

    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active use')
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
    const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          setStoredTheme(theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })
  })
})()
</script>
@endsection
