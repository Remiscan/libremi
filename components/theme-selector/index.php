<?php
$theme = isset($_COOKIE['theme']) ? ($_COOKIE['theme'] == 'light' ? 'light' : ($_COOKIE['theme'] == 'dark' ? 'dark' : 'auto')) : 'auto';
?>

<!doctype html>
<html data-theme="<?=$theme?>">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>&lt;theme-selector&gt;</title>

    <!-- ▼ Fichiers cache-busted grâce à PHP -->
    <!--<?php ob_start();?>-->

    <!-- Import map -->
    <script defer src="/_common/polyfills/adoptedStyleSheets.min.js"></script>
    <script>window.esmsInitOptions = { polyfillEnable: ['css-modules', 'json-modules'] }</script>
    <script defer src="/_common/polyfills/es-module-shims.js"></script>
    
    <script type="importmap">
    {
      "imports": {
        "theme-selector": "/_common/components/theme-selector/theme-selector.js",
        "trap-focus": "/_common/js/trap-focus.js",
        "theme-selector-styles": "/_common/components/theme-selector/styles.css.php",
        "theme-selector-strings": "/_common/components/theme-selector/strings.json",
        "theme-selector-template": "/_common/components/theme-selector/template.js"
      }
    }
    </script>

    <!--<?php $imports = ob_get_clean();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/_common/php/versionize-files.php';
    echo versionizeFiles($imports, __DIR__); ?>-->

    <style>
      /*<?php ob_start();?>*/
      html[data-theme="light"] {
        color-scheme: light;
        --bg-color: #eee;
        --sunmoon-color: black;
        --sunray-color: hsl(40, 100%, 10%);
      }

      html[data-theme="dark"] {
        color-scheme: dark;
        --bg-color: #111;
        --sunmoon-color: white;
        --sunray-color: lemonchiffon;
      }
      /*<?php $body = ob_get_clean();
      require_once $_SERVER['DOCUMENT_ROOT'] . '/_common/components/theme-selector/build-css.php';
      echo buildThemesStylesheet($body); ?>*/

      html, body {
        height: 100%;
      }

      body {
        background: var(--bg-color);
        display: grid;
        color: var(--sunmoon-color);
        position: relative;
        gap: .5rem;
        place-items: center;
        font-family: system-ui;
      }

      body > * {
        grid-row: 1;
      }

      theme-selector {
        width: 5rem;
        transform: translateY(calc(-0.5 * (44px * 3 + 10px * 2 + 1.4rem)));
      }

      theme-selector .selector-title {
        font-size: 1.4rem;
        border-bottom: 1px solid;
        padding-bottom: 10px;
      }

      theme-selector > .selector {
        font-size: 1.2rem;
        border: 1px solid currentColor;
        padding: 5px 10px;
        border-radius: 10px;
        width: max-content;
        transform: translateY(-.2rem);
        transition: opacity .2s ease,
                    transform .2s ease;
      }

      theme-selector[open="true"] > .selector {
        transform: translateY(0);
      }

      theme-selector > .selector > input {
        width: 1.5em;
        margin-right: 10px;
      }

      theme-selector > .selector > input + label {
        height: 44px;
        line-height: 44px;
      }
    </style>
  </head>

  <body>
    <theme-selector position="bottom"></theme-selector>

    <script type="module">
      import 'theme-selector';

      // Detects theme changes
      window.addEventListener('themechange', event => {
        const html = document.documentElement;
        html.dataset.theme = event.detail.theme;
      });
    </script>
  </body>

</html>