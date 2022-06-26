<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>&lt;artsy-css&gt;</title>
  
  <!-- ▼ Fichiers cache-busted grâce à PHP -->
  <!--<?php ob_start();?>-->

  <script defer src="../../polyfills/adoptedStyleSheets.min.js"></script>
  <script type="esms-options">{ "polyfillEnable": ["css-modules", "json-modules"] }</script>
  <script defer src="../../polyfills/es-module-shims.js"></script>

  <script type="importmap">
  {
    "imports": {
      "artsy-css": "/_common/components/artsy-css/artsy-css.js",
      "artsy-css-styles": "/_common/components/artsy-css/styles.css",
      "artsy-css-template": "/_common/components/artsy-css/template.js"
    }
  }
  </script>

  <!--<?php $imports = ob_get_clean();
  require_once $_SERVER['DOCUMENT_ROOT'] . '/_common/php/versionize-files.php';
  echo versionizeFiles($imports, __DIR__); ?>-->

  <script type="module">
    import 'artsy-css';

    const container = document.querySelector('artsy-css');

    // Listen to options changes

    // Type of effect
    const select = document.getElementById('effect-selection');
    select.value = container.getAttribute('type'); // initial value
    select.addEventListener('click', event => event.stopPropagation());
    select.addEventListener('input', () => {
      container.setAttribute('previous-type', container.getAttribute('type'));
      container.setAttribute('type', select.value);
    });

    // Order of cell updates
    /*const inputOrdre = document.querySelector('input#ordre');
    inputOrdre.addEventListener('change', () => {
      if (inputOrdre.checked) container.setAttribute('order', 'random');=
      else container.setAttribute('order', 'normal');
    });*/

    // Scarcity of cells
    const scarcityInput = document.querySelector('input#scarcity');
    scarcityInput.addEventListener('change', () => {
      container.setAttribute('scarcity', scarcityInput.value);
    });

    // Apply filter over the element
    const inputFiltre = document.querySelector('input#filter');
    inputFiltre.addEventListener('click', event => event.stopPropagation());
    inputFiltre.addEventListener('change', () => {
      if (inputFiltre.checked) container.setAttribute('filter', '');
      else container.removeAttribute('filter');
    });
    
    /*let previousTarget = null;
    let previousAnim = 0;
    conteneur.addEventListener('mousemove', event => {
      if (event.target == previousTarget || previousAnim >= Date.now() + 100) return;
      previousTarget = event.target;
      previousAnim = Date.now();
      requestAnimationFrame(() => container.editCell(event.target));
    });*/
  </script>
</head>

<style>
  html {
    width: 100vw;
    width: 100lvw;
    height: 100vh;
    height: 100lvh;
    color-scheme: dark light;
  }

  body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr;
    place-items: center;
    background-color: #190D19;
    overflow: hidden;
    color: white;
  }

  artsy-css {
    grid-row: 1 / -1;
    grid-column: 1 / -1;
  }

  .options {
    grid-row: 1;
    grid-column: 1;
    place-self: start;
    z-index: 2;
    background-color: rgb(0, 0, 0, .3);
    padding: 10px;
    border-radius: 0 0 20px 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  .options > p {
    margin: 0;
  }
</style>

<artsy-css type="diamond"></artsy-css>

<div class="options">
  <p>Click anywhere to randomize the cells.</p>

  <p>
    <label for="effect-selection">Type:</label>
    <select id="effect-selection">
      <option value="diamond">Diamonds</option>
      <option value="square">Squares</option>
      <option value="labyrinth">Labyrinth</option>
      <option value="border">Borders</option>
    </select>
  </p>

  <!--
  <p>
    <input type="checkbox" id="ordre"><label for="ordre">Random order</label>
  </p>
  </div>-->

  <p>
    <label for="scarcity">Scarcity:</label><input type="number" id="scarcity" min="1" max="100" step="1" value="1">
  </p>

  <p>
    <input type="checkbox" id="filter"><label for="filter">Weird filter</label>
  </p>
</div>