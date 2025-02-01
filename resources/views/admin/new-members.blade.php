<x-admin-layout>
    <!-- <div class="new-members-title"><h2>New Members</h2></div> -->
    <div class="new-members-table">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($newMembers as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->email }}</td>
                        <td><span style="color: red;">{{ $member->status }}</span></td>
                        <td>
                            <form method="POST" action="{{ route('admin.approve-member', $member->id) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">No new members awaiting approval.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
</x-admin-layout>