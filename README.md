# GPT-API-Integration-in-HTML-CSS-with-JS-PHP

Browser chat interface with HTML, CSS, JavaScript, and a PHP proxy for OpenAI Chat Completions.

## Setup and repository reference

### Project structure

- [LICENSE](LICENSE)
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

Audit: 2026-10-08. Repository structure, setup instructions and description were reviewed. 1 JavaScript files passed node --check; JSX/TypeScript production builds were not run. Syntax checks do not establish full runtime correctness. External APIs, live scraping, GUI interaction, notebook training and production deployment were not comprehensively exercised.

### Repository description

The short GitHub description is provided in [REPOSITORY_DESCRIPTION.md](REPOSITORY_DESCRIPTION.md).

### Contributions

Describe the issue, reproduction steps, environment, and expected behavior when proposing a change. Keep generated environments, credentials, and unnecessary build artifacts out of new commits.

### License

See [LICENSE](LICENSE) for the repository’s licensing terms.
