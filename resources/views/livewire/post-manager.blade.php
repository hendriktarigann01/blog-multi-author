<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
</div>
<form wire:submit.prevent="createPost">
    <input type="text" wire:model="title" placeholder="Judul Artikel" />
    <textarea wire:model="content" placeholder="Konten Artikel"></textarea>
    <button type="submit">Simpan</button>
</form>
