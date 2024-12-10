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

    <h2 class="dash-title">Coin</h2>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
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
                            @foreach($coins as $coin)
                            <tr>
                                <td>{{ $coin->id }}</td>
                                <td>{{ $coin->name }}</td>
                                <td><img src="{{ asset('storage/'.$coin->image) }}" alt="{{ $coin->name }}" width="50"></td>
                                <td>{{ $coin->stands }}</td>
                                <td>{{ $coin->endpoint }}</td>
                                <td>
                                    <a href="coin/{{ $coin->id }}/edit" class="btn btn-primary">Edit</a>
                                    <a href="coin/{{ $coin->id }}/delete" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>Add Coin</h3>
                <form class="form-container" method="post" action="{{ route('coins.post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Crypto</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Crypto Name">
                    </div>
                    <div class="form-group">
                        <label for="stands">Stands</label>
                        <input type="text" id="stands" name="stands" class="form-control" placeholder="Enter Stands">
                    </div>
                    <div class="form-group">
                        <label for="endpoint">Endpoint</label>
                        <input type="text" id="endpoint" name="api_endpoint" class="form-control" placeholder="Enter Endpoint">
                    </div>
                    <div class="form-group">
                        <label for="icon">Image</label>
                        <input type="file" id="icon" name="image" class="form-control">
                        <small>Allowed file types: jpg, jpeg, png, svg, gif, webp</small>
                    </div>
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-primary">Add Coin</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection