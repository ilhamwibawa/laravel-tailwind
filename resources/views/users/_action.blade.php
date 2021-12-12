@can('edit_users')
    <x-forms.button type="link" href="{{ route('users.edit', $id) }}" label="Edit" class="bg-blue-500 hover:bg-blue-600 py-1 px-2" />
@endcan
@can('delete_users')
    <form class="inline-block" action="{{ route('users.destroy', $id)}}" method="POST">
        @csrf
        @method('delete')
        <x-forms.button type="submit" label="Delete" class="bg-red-500 hover:bg-red-600" onclick="return confirm('Are you sure want to delete this user?')" />
    </form>
@endcan
