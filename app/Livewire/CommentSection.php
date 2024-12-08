<?php

namespace App\Http\Livewire; // Namespace Livewire harus berada di folder "Http\Livewire"

use Livewire\Component;
use App\Models\Comment; // Pastikan model Comment diimport
use Illuminate\Support\Facades\Auth; // Jika menggunakan helper Auth

class CommentSection extends Component
{
    public $postId, $comment;
    public $comments = []; // Inisialisasi sebagai array kosong

    public function mount($postId)
    {
        $this->postId = $postId;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = Comment::where('post_id', $this->postId)
            ->latest() // Untuk menampilkan komentar terbaru di atas
            ->get();
    }

    public function addComment()
    {
        $this->validate(['comment' => 'required|min:5']);

        Comment::create([
            'post_id' => $this->postId,
            'content' => $this->comment,
            'user_id' => Auth::id(), // Pastikan user sudah login
        ]);

        $this->comment = ''; // Reset input
        $this->loadComments(); // Muat ulang komentar
    }

    public function render()
    {
        return view('livewire.comment-section');
    }
}
