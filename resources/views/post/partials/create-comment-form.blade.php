<form method="post" action="{{ route('comment.store') }}" class="flex items-center gap-2">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post_id }}">
    <input type="text" name="message" placeholder="Add a comment..."
        class="flex-grow px-4 py-2 border rounded-lg text-sm text-gray-700 focus:outline-none focus:ring focus:border-blue-300" />
    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg text-sm hover:bg-blue-600 transition">
        Post
    </button>
</form>