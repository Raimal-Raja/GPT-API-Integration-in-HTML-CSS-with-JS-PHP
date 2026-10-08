# GPT-API-Integration-in-HTML-CSS-with-JS-PHP

Browser chat interface with HTML, CSS, JavaScript, and a PHP proxy for OpenAI Chat Completions.

## Repository guide

### Contents

- [LICENSE](LICENSE)
- [README.md](README.md)
- [chatgpt.png](chatgpt.png)
- [config.php](config.php)
- [gptchat.php](gptchat.php)
- [index.html](index.html)
- [screenshot.png](screenshot.png)
- [script.js](script.js)
- [style.css](style.css)
- [tips](tips)

### Getting started

```bash
git clone https://github.com/Raimal-Raja/GPT-API-Integration-in-HTML-CSS-with-JS-PHP.git
cd GPT-API-Integration-in-HTML-CSS-with-JS-PHP
```

Use a local PHP installation with the cURL extension. Set OPENAI_API_KEY and OPENAI_MODEL in the server environment; choose a Chat Completions model available to your account.

```bash
php -S 127.0.0.1:8000
```

### Configuration and limitations

The backend uses the Chat Completions endpoint, checks requests and upstream errors, and preserves the frontend response contract. Message text is rendered with textContent. Live API calls were not run; they require account access, configuration, and API usage charges. See the [official API schema](https://developers.openai.com/api/reference/resources/chat/subresources/completions/methods/create).

### Validation

Reviewed on 2026-10-08. PHP syntax checks and method/missing-input guards passed in a PHP WebAssembly runtime. Frontend literal-text rendering and network-error checks passed with Node; run `node tests/frontend.test.cjs`. Live API calls were not exercised.

### Contributions

Describe the issue, reproduction steps, environment, and expected behavior when proposing a change. Keep generated environments, credentials, and unnecessary build artifacts out of new commits.

### License

See [LICENSE](LICENSE) for the repository’s licensing terms.
