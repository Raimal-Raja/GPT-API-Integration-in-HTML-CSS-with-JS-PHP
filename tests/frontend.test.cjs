const assert = require('node:assert/strict');
const fs = require('node:fs');
const vm = require('node:vm');
let submit;
const rendered = [];
const input = { value: '<img src=x onerror=alert(1)>' };
const output = { appendChild: node => rendered.push(node.textContent), scrollHeight: 0 };
const form = { addEventListener: (_name, handler) => { submit = handler; } };
const document = {
    getElementById: id => ({ 'chat-form': form, 'chat-input': input, 'chat-output': output })[id],
    createElement: () => ({}),
};
const context = vm.createContext({ document, fetch: async () => ({
    ok: true, json: async () => ({ choices: [{ text: '<b>Literal reply</b>' }] }),
}) });
vm.runInContext(fs.readFileSync('script.js', 'utf8'), context);
(async () => {
    await submit({ preventDefault() {} });
    assert.deepEqual(rendered, ['<img src=x onerror=alert(1)>', '<b>Literal reply</b>']);
    input.value = 'second message';
    context.fetch = async () => { throw new Error('Service unavailable'); };
    await submit({ preventDefault() {} });
    assert.equal(rendered.at(-1), 'Service unavailable');
    console.log('Frontend literal-text and network-error checks passed');
})().catch(error => { console.error(error); process.exitCode = 1; });
