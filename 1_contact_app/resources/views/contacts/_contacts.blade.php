@forelse($contacts as $key => $contact)

<tr>
    <th scope="row">{{ $contacts->firstItem() + $key }}</th>
    <td>{{ $contact->first_name }}</td>
    <td>{{ $contact->last_name }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->company->name }}</td>

    @if(request()->query('trash'))
        <td>
            <form action="{{ route('contacts.restore', $contact->id) }}" method="POST" style="display: inline">
                @csrf 
                @method("DELETE")
                <button type="submit" class="btn btn-sm btn-circle btn-outline-info" title="Restore"><i class="fa fa-refresh"></i></button>
            </form>
      
            <form action="{{ route('contacts.force-delete', $contact->id) }}" method="POST" style="display: inline">
                @csrf 
                @method("DELETE")
                <button type="submit" class="btn btn-sm btn-circle btn-outline-danger" title="Delete permanently" ><i class="fa fa-times"></i></button>
            </form>
        </td>
    @else
        <td>
            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
            <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline">
                @csrf 
                @method("DELETE")
                <button type="submit" class="btn btn-sm btn-circle btn-outline-danger" title="Move to trash" ><i class="fa fa-trash"></i></button>
            </form>
        </td>
    @endif
</tr>

@empty 

<tr>
    <td colspan="6">
        <div class="alert alert-danger">
            No contacts found
        </div>
    </td>
</tr>

@endforelse