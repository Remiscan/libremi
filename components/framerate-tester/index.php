<title>Frame rate test</title>
<meta name="viewport" content="width=device-width">

<!-- ▼ Fichiers cache-busted grâce à PHP -->
<!--<?php versionizeStart(); ?>-->

<script defer src="../../polyfills/adoptedStyleSheets.min.js"></script>
<script>window.esmsInitOptions = { polyfillEnable: ['css-modules'] }</script>
<script defer src="../../polyfills/es-module-shims.js"></script>

<script type="importmap">
{
  "imports": {
    "framerate-tester": "/_common/components/framerate-tester/framerate-tester.js"
  }
}
</script>

<link rel="modulepreload" href="/_common/components/framerate-tester/framerate-tester.js">
<!-- CSS modules not supported in modulepreload yet 😢 -->

<!--<?php versionizeEnd(__DIR__); ?>-->

<style>
  body {
    margin: 0;
    padding: 10px;
    background-color: #DDD;
    color: #222;
  }

  @media (prefers-color-scheme: dark) {
    body {
      background-color: #222;
      color: #DDD;
    }
  }
</style>

<script type="module">
  import { FramerateTester } from 'framerate-tester';
</script>

<framerate-tester></framerate-tester>