@extends('layouts.app')

@section('title')
Coins | Soltify
@endsection

@section('content')

<header>
    <div class="search-wrapper">
    </div>
    <div class="social-icons">
        <div></div>
    </div>
</header>
<main>
    <h2 class="dash-title">Admin Dashboard</h2>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Available Coin</h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Crypto</th>
                                <th>Image</th>
                                <th>Stands</th>
                                <th>Endpoint</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($coins->count() == 0)
                            <tr>
                                <td colspan="6">No coins found</td>
                            </tr>
                            @endif
                            @foreach ($coins as $coin)
                            <tr>
                                <td>{{ $coin['id'] }}</td>
                                <td>{{ $coin['name'] }}</td>
                                <td><img src="{{ asset('storage/' . $coin['image']) }}" alt="{{ $coin['name'] }}" width="50"></td>
                                <td>{{ $coin['stands'] }}</td>
                                <td>{{ $coin['api_endpoint'] }}</td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-primary btn-print" data-print="coins">Print Coin</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
    </section>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>All Users</h3>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users->count() == 0)
                            <tr>
                                <td colspan="5">No users found</td>
                            </tr>
                            @endif
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ $user['role'] == 1 ? 'Admin' : 'User' }}</td>
                                <td>
                                    <a href="user/{{ $user['id'] }}/edit" class="btn btn-primary">Edit</a>
                                    <a href="user/{{ $user['id'] }}/delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-primary btn-print" data-print="users">Print Users</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
    </section>
</main>
@endsection
@section('extra')
<div class="modal" id="edit-coin-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" id="hide-edit-coin-modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-container" id="addWalletForm">
                    <div class="form-group">
                        <label for="walletAddress">Wallet Address</label>
                        <input type="text" id="walletAddress" name="walletAddress" class="form-control" placeholder="Enter Wallet Address">
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Add Wallet</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
<script src="/js/wallet-address-validator.min.js"></script>
<script src="/js/modal-manager.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.5/dist/sweetalert2.min.js"></script>
<script>
    const modalManager = new ModalManager();
    const coinModal = new Modal('edit-coin-modal');

    document.getElementById("hide-edit-coin-modal").onclick = () => {
        modalManager.close(coinModal);
    }

    let showEditCoin = (id) => {
        let coin = <?= json_encode($coins) ?>.find(coin => coin.id === id);
        // document.getElementById('coinName').value = coin.name;
        // document.getElementById('coinStands').value = coin.stands;
        // document.getElementById('coinEndpoint').value = coin.api_endpoint;
        modalManager.open(coinModal);
    }

    document.querySelectorAll('.btn-print').forEach(btn => {
        btn.onclick = () => {
            let table = btn.getAttribute('data-print');
            window.open('cetak/' + table, '_blank');
        }
    });
</script>
@endsection