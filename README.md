# GPT-API-Integration-in-HTML-CSS-with-JS-PHP

Browser chat interface with HTML, CSS, JavaScript, and a PHP proxy for a legacy OpenAI completion API.

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

Use a local PHP installation with the cURL extension. The backend needs an API migration before a live chat workflow can be considered working.

```bash
php -S 127.0.0.1:8000
```

### Configuration and limitations

The PHP proxy still targets a legacy completion endpoint/model. Live API operation requires migration and a valid API key; PHP is unavailable in the review environment.

### Validation

Reviewed on 2026-10-08. JavaScript source files passed node --check. Browser interaction and production builds were not verified.

### Contributions

Describe the issue, reproduction steps, environment, and expected behavior when proposing a change. Keep generated environments, credentials, and unnecessary build artifacts out of new commits.

### License

See [LICENSE](LICENSE) for the repository’s licensing terms.
