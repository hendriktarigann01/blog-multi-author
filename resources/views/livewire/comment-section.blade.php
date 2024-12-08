<div>
    <form wire:submit.prevent="addComment">
        <input type="text" wire:model="comment" placeholder="Tambahkan komentar..." />
        <button type="submit">Kirim</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>{{ $comment->content }} - <small>{{ $comment->user->name }}</small></li>
        @endforeach
    </ul>
</div>
