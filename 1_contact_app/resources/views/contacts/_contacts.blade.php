@forelse($contacts as $key => $contact)

<tr>
    <th scope="row">{{ $key + 1 }}</th>
    <td>{{ $contact->first_name }}</td>
    <td>{{ $contact->last_name }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->company->name }}</td>
    <td>
        <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline">
            @csrf 
            @method("DELETE")
            <button type="submit" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" ><i class="fa fa-times"></i></button>
        </form>
    </td>
</tr>

@empty 

<tr>
    <td>
        <div class="alert alert-danger">
            No contacts found
        </div>
    </td>
</tr>

@endforelse