<?php require_once dirname(__DIR__, 2) . '/php/version.php';
$version = version(__DIR__, ['tab-label.js.php', 'style.css.php']); ?>
<!doctype html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>&lt;tab-label&gt;</title>
    
    <style id="tab-label-style" data-method="manual">
      <?php include 'style.css.php'; ?>
    </style>

    <style>
      /*<?php ob_start();?>*/
      html[data-theme="light"] {
        color-scheme: light;
        --bg-color: rgb(224, 224, 224);
        --text-color: black;
      }

      html[data-theme="dark"] {
        color-scheme: dark;
        --bg-color: rgb(34, 34, 34);
        --text-color: white;
      }
      /*<?php $body = ob_get_clean();
      require_once $_SERVER['DOCUMENT_ROOT'] . '/_common/components/theme-selector/build-css.php';
      echo buildThemesStylesheet($body); ?>*/

      /*<?php ob_start();?>*/
      :root[data-theme="light"] [role="tablist"] {
        --hue: 231;
        --on-bg-color: hsl(var(--hue), 40%, 50%);
        --hover-bg-color: hsl(var(--hue), 40%, 50%, .3);
        --active-bg-color: hsl(var(--hue), 40%, 50%, .4);
        --off-text-color: black;
        --on-text-color: white;
      }

      :root[data-theme="dark"] [role="tablist"] {
        --hue: 217;
        --on-bg-color: hsl(var(--hue), 89%, 75%);
        --hover-bg-color: hsl(var(--hue), 89%, 75%, .3);
        --active-bg-color: hsl(var(--hue), 89%, 75%, .4);
        --off-text-color: white;
        --on-text-color: rgb(48, 48, 48);
      }
      /*<?php $body = ob_get_clean();
      require_once $_SERVER['DOCUMENT_ROOT'] . '/_common/components/theme-selector/build-css.php';
      echo buildThemesStylesheet($body); ?>*/

      html {
        background: var(--bg-color);
        height: 100%;
        width: 100%;
      }

      body {
        background: var(--bg-color);
        display: flex;
        flex-direction: column;
        gap: .6rem;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen-Sans, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
        color: var(--text-color);
        padding: 1rem;
      }

      hr {
        width: 100%;
        height: 1.2rem;
        border: 0;
      }

      /* Prevent flash of unstyled tabs */
      /*fieldset { border: none; }
      tab-label:not([label]) { opacity: 0; }*/
    </style>
  </head>

  <body>
    <fieldset role="tablist" data-group="tabs-group-1-name">
      <legend data-string="tabs-group-name-label"></legend>

      <tab-label controls="controlled-element-11-id" label="Tab 1.1" active="true"></tab-label>
      <tab-label controls="controlled-element-12-id" label="Tab 1.2"></tab-label>
      <tab-label controls="controlled-element-13-id" label="Tab 1.3"></tab-label>
    </fieldset>

    <div id="controlled-element-11-id" hidden>
      <p>As you can see in the HTML code, the tab title can either be placed in the label attribute, or directly between the tab-label tags.
      <p>This row of tab uses the first method.
    </div>
    <div id="controlled-element-12-id" hidden>Content 1.2</div>
    <div id="controlled-element-13-id" hidden>Content 1.3</div>
    

    <hr>

    <fieldset role="tablist" data-group="tabs-group-2-name" style="--hue: 100">
      <legend data-string="tabs-group-name-label"></legend>

      <tab-label controls="controlled-element-21-id" active="true">Tab 2.1</tab-label>
      <tab-label controls="controlled-element-22-id" >Tab 2.2</tab-label>
      <tab-label controls="controlled-element-23-id" >Tab 2.3</tab-label>
    </fieldset>

    <div id="controlled-element-21-id" hidden>
      <p>As you can see in the HTML code, the tab title can either be placed in the label attribute, or directly between the tab-label tags.
      <p>This row of tab uses the last method, which causes a quick flash of unstyled text. Use <code>tab-label:not([label]) { opacity: 0; }</code> in your CSS to prevent that.
    </div>
    <div id="controlled-element-22-id" hidden>Content 2.2</div>
    <div id="controlled-element-23-id" hidden>Content 2.3</div>

    <hr>

    <div class="tab-group" role="tablist" style="--hue: 0">
      <tab-label group="no-fieldset" controls="controlled-element-31-id" label="Tab 3.1" active="true"></tab-label>
      <tab-label group="no-fieldset" controls="controlled-element-32-id" label="Tab 3.2"></tab-label>
      <tab-label group="no-fieldset" controls="controlled-element-33-id" label="Tab 3.3"></tab-label>
    </div>

    <div id="controlled-element-31-id" hidden>Content 3.1</div>
    <div id="controlled-element-32-id" hidden>Content 3.2</div>
    <div id="controlled-element-33-id" hidden>Content 3.3</div>

    <script type="module">
      import '/_common/components/tab-label/tab-label--<?=$version?>.js.php';
    </script>
  </body>

</html>