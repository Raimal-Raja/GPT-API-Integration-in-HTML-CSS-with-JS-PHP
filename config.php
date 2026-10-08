<?php
// Configure these in the server environment, never in browser JavaScript.
define('OPENAI_API_KEY', getenv('OPENAI_API_KEY') ?: '');
define('MODEL', getenv('OPENAI_MODEL') ?: '');
define('MAX_TOKENS', 1000);
