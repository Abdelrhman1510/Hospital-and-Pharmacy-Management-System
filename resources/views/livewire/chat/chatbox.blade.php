<div>
    @if ($selected_conversation)
        <div class="main-content-body main-content-body-chat">
            <!-- Chat Header -->
            <div class="main-chat-header">
                <div class="main-chat-msg-name">
                    <h6>{{ $receviverUser->name }}</h6>
                </div>
            </div>

            <!-- Chat Body -->
            <div id="ChatBody"
                class="main-chat-body"
                style="padding: 20px; background-color: #f8f9fa; overflow-y: auto; height: 400px; border: 1px solid #ddd;">
                <div class="content-inner" style="display: flex; flex-direction: column; gap: 10px;">
                    @foreach ($messages as $message)
                        <div class="media"
                            style="display: flex; flex-direction: column; align-items: {{ $auth_email == $message->sender_email ? 'flex-end' : 'flex-start' }};">
                            <!-- Message Bubble -->
                            <div class="media-body"
                                style="max-width: 60%; background-color: {{ $auth_email == $message->sender_email ? '#dcf8c6' : '#ffffff' }}; padding: 10px 15px; border-radius: 15px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); word-wrap: break-word;">
                                {{ $message->body }}
                            </div>
                            <!-- Timestamp -->
                            <div style="font-size: 12px; color: #999; margin-top: 5px;">
                                {{ $message->created_at->format('h:i A') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>

<!-- JavaScript Section -->
@section('js')
    <script>
       function scrollToBottom() {
    const chatBody = document.getElementById('ChatBody');
    if (chatBody) {
        chatBody.scrollTop = chatBody.scrollHeight;
    }
}

// Scroll to the bottom after Livewire has loaded and messages are updated
document.addEventListener('livewire:load', () => {
    setTimeout(scrollToBottom, 50); // Small delay to ensure DOM updates before scrolling
});

Livewire.hook('message.processed', () => {
    setTimeout(scrollToBottom, 50); // Small delay to ensure DOM updates before scrolling
});

// Listen for new message events from Livewire and scroll
Livewire.on('newMessageReceived', () => {
    setTimeout(scrollToBottom, 50); // Small delay to ensure DOM updates before scrolling
});
    </script>
@endsection
