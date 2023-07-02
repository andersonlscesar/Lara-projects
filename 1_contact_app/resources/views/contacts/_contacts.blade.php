@forelse($contacts as $key => $contact)

<tr>
    <th scope="row">{{ $key + 1 }}</th>
    <td>{{ $contact->first_name }}</td>
    <td>{{ $contact->last_name }}</td>
    <td>{{ $contact->email }}</td>
    <td>{{ $contact->company->name }}</td>
    <td>
        <a href="show.html" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
        <a href="form.html" class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i class="fa fa-edit"></i></a>
        <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
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