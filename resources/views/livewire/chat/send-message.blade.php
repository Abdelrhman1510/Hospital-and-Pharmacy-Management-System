<div style="padding: 20px; background-color: #fff; border-top: 1px solid #ddd;">
    @if($selected_conversation)
        <form wire:submit.prevent="sendMessage" style="display: flex; align-items: center;" id="messageForm">
            <input 
                class="form-control" 
                wire:model.live="body" 
                placeholder="Write Your Message" 
                type="text"
                id="messageInput"
                style="flex: 1; padding: 10px; font-size: 16px; border-radius: 20px; border: 1px solid #ccc; margin-right: 10px;"
            >
            <button 
                class="main-msg-send" 
                type="submit"
                style="background-color: #007bff; color: white; padding: 10px 15px; border-radius: 50%; border: none;"
                onclick="clearInput()"
            >
                <i class="far fa-paper-plane" style="font-size: 18px;"></i>
            </button>
        </form>
    @endif
</div>

<script>
    // Clear the input field after submitting the form
    function clearInput() {
        // Delay the input clearing to allow the form submission to happen first
        setTimeout(() => {
            document.getElementById('messageInput').value = ''; // Clear the input field
        }, 100); // Delay for 100 milliseconds
    }
</script>
