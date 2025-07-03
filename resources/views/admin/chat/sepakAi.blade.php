<x-panel>
    <div class="max-w-5xl mx-auto p-6 bg-white shadow rounded-lg h-[80vh] flex flex-col">
        <div id="chat-box" class="flex-1 overflow-y-auto border rounded p-4 space-y-4">
            <!-- Chat messages will be inserted here -->
        </div>

        <form id="chat-form" class="mt-4 flex gap-2">
            @csrf
            <input type="text" id="message" placeholder="Type your message..."
                class="flex-1 px-4 py-2 border rounded focus:outline-none focus:ring" autocomplete="off">
            <button type="submit"
                class="bg-[#176b98] text-[#FEBE35] px-4 py-2 rounded hover:bg-[#5e0f17] transition">Send</button>
        </form>
    </div>

    <script>
        const chatBox = document.getElementById('chat-box');
        const form = document.getElementById('chat-form');
        const input = document.getElementById('message');

        function scrollToBottom() {
            chatBox.scrollTop = chatBox.scrollHeight;
        }

        function appendMessage(sender, message, isLoading = false) {
            const p = document.createElement('p');
            p.innerHTML =
                `<strong>${sender}:</strong> <span class="${isLoading ? 'animate-pulse text-gray-400' : ''}">${message}</span>`;
            chatBox.appendChild(p);
            scrollToBottom();
            return p;
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const message = input.value.trim();
            if (!message) return;

            // Show user's message
            appendMessage('You', message);
            input.value = '';

            // Show loader
            const botMsg = appendMessage('ChatGPT', 'Typing...', true);

            try {
                const res = await fetch("{{ route('admin.ai') }}", {
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        message
                    })
                });

                const data = await res.json();
                console.log('OpenAI Response:', data); // 👈 Show full response

                botMsg.classList.remove('animate-pulse', 'text-gray-400');

                if (data.reply) {
                    typeEffect(botMsg.querySelector('span'), data.reply);
                } else if (data.error) {
                    botMsg.innerHTML = `<strong>Error:</strong> ${JSON.stringify(data.error)}`;
                } else {
                    botMsg.innerHTML = `<strong>Error:</strong> Unexpected response`;
                }

            } catch (err) {
                botMsg.innerHTML = `<strong>Error:</strong> ${err.message}`;
            }
        });

        function typeEffect(element, text, i = 0) {
            if (i < text.length) {
                element.innerHTML = text.substring(0, i + 1);
                setTimeout(() => typeEffect(element, text, i + 1), 20);
            }
        }
    </script>
</x-panel>
