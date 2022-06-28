/* Use with this import map:
<script type="importmap">
{
  "imports": {
    "cookie-consent-prompt": "/_common/components/cookie-consent-prompt/cookie-consent-prompt.js",
    "cookie-consent-prompt-styles": "/_common/components/cookie-consent-prompt/styles.css",
    "cookie-consent-prompt-strings": "/_common/components/cookie-consent-prompt/strings.json",
    "cookie-consent-prompt-template": "/_common/components/cookie-consent-prompt/template.js"
  }
}
</script>
*/

//import strings from 'theme-selector-strings' assert { type: 'json' };
import sheet from 'cookie-consent-prompt-styles' assert { type: 'css' };
import template from 'cookie-consent-prompt-template';



export class CookieConsentPrompt extends HTMLElement {
  constructor() {
    super();
  }


  connectedCallback() {
    // Add HTML and CSS to the element
    if (!document.adoptedStyleSheets.includes(sheet))
      document.adoptedStyleSheets = [...document.adoptedStyleSheets, sheet];
    if (!this.innerHTML)
      this.appendChild(template.content.cloneNode(true));

    // Populate cookie info message
    const info = this.querySelector('.cookie-consent-prompt-info');
    info.innerHTML = info.innerHTML.replace('{{name}}', this.getAttribute('cookie'));
    info.innerHTML = info.innerHTML.replace('{{content}}', this.getAttribute('value'));

    // Listen to button clicks
    const buttonYes = this.querySelector('.cookie-consent-prompt-button-yes');
    const buttonNo = this.querySelector('.cookie-consent-prompt-button-no');
    const consentEvent = bool => window.dispatchEvent(
      new CustomEvent('cookieconsent', {
        detail: {
          name: this.getAttribute('cookie'),
          consent: bool
        }
      })
    );
    buttonYes.addEventListener('click', () => {
      consentEvent(true);
    });
    buttonNo.addEventListener('click', () => {
      consentEvent(false);
    });
  }
}

if (!customElements.get('cookie-consent-prompt')) customElements.define('cookie-consent-prompt', CookieConsentPrompt);