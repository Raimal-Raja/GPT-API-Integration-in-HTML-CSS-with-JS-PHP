const chatForm = document.getElementById("chat-form");
const chatInput = document.getElementById("chat-input");
const chatOutput = document.getElementById("chat-output");

function appendMessage(className, text) {
    const paragraph = document.createElement("p");
    paragraph.className = className;
    paragraph.textContent = text;
    chatOutput.appendChild(paragraph);
    chatOutput.scrollTop = chatOutput.scrollHeight;
}

chatForm.addEventListener("submit", async (event) => {
    event.preventDefault();
    const message = chatInput.value.trim();
    if (!message) return;
    appendMessage("user-message", message);
    chatInput.value = "";
    try {
        const response = await fetch("gptchat.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ message }),
        });
        const data = await response.json();
        if (!response.ok) throw new Error(data.error || "Chat request failed");
        const text = data.choices?.[0]?.text;
        if (typeof text !== "string") throw new Error("Unexpected chat response");
        appendMessage("bot-message", text);
    } catch (error) {
        appendMessage("bot-message", error.message || "Unable to connect to the chat service");
    }
});
