    <div style="padding: 15px; background-color: #fff; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        <div class="main-chat-list" id="ChatList" style="max-height: 400px; overflow-y: auto;">
            @foreach($conversations as $conversation)
                <div class="media new" wire:click="chatUserSelected({{ $conversation }},'{{ $this->getUsers($conversation,$name='id') }}')"
                    style="display: flex; align-items: center; padding: 10px; background-color: #f9f9f9; margin-bottom: 10px; border-radius: 10px; cursor: pointer;">
                    <div class="media-body" style="flex: 1;">
                        <div class="media-contact-name" style="font-size: 16px; font-weight: bold;">
                            <span>{{$this->getUsers($conversation,$name='name')}}</span>
                            <span style="font-size: 12px; color: #888;">{{$conversation->messages->last()->created_at->shortAbsoluteDiffForHumans()}}</span>
                        </div>
                        <p style="font-size: 14px; color: #555;">{{$conversation->messages->last()->body}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
